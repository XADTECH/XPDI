<?php

namespace App\Http\Controllers\instructor;

use App\Events\InstructorMessageSent;
use App\Events\MessageSent;
use App\Events\PrivateMessageSent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Conversation;
use App\Models\InstructorMessage;
use App\Models\User;
use App\Models\StudentCourse;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorChatController extends Controller
{
    public function index()
    {

        // get subscribed students list for teacher
        $studentIds = StudentCourse::whereHas('course', function ($query) {
            $query->where('instructor_id', Auth::id());
        })->pluck('student_id')->unique();
        $students = User::whereIn('id', $studentIds)->get();
        // dd(json_decode($students));

        $instructor_id = Auth::user()->id;
        $unique_students = Order::where('instructor_id', $instructor_id)->select('user_id')->distinct()->with('user')->get();
        return view('backend.instructor.chat.index', compact('unique_students'));
    }

    // public function searchStudents(Request $request)
    // {
    //     $keyword = $request->input('q');

    //     $studentIds = StudentCourse::whereHas('course', function ($query) {
    //         $query->where('instructor_id', Auth::id());
    //     })->pluck('student_id')->unique();

    //     $students = User::whereIn('id', $studentIds)
    //         ->when($keyword, function ($query) use ($keyword) {
    //             $query->where('name', 'like', "%$keyword%");
    //         })
    //         ->get();

    //     return response()->json($students);
    // }

    // public function searchStudents(Request $request)
    // {
    //     $keyword = $request->input('q');

    //     $studentIds = StudentCourse::whereHas('course', function ($query) {
    //         $query->where('instructor_id', Auth::id());
    //     })->pluck('student_id')->unique();

    //     $students = User::whereIn('id', $studentIds)
    //         ->when($keyword, function ($query) use ($keyword) {
    //             $query->where('name', 'like', "%$keyword%");
    //         })
    //         ->get()
    //         ->unique('id')   // <<< ensure uniqueness
    //         ->values();      // <<< reindex keys

    //     return response()->json($students);
    // }

    public function searchStudents(Request $request)
    {
        $instructorId = Auth::id();
        $keyword = $request->input('q');

        $studentIds = StudentCourse::whereHas('course', function ($query) use ($instructorId) {
            $query->where('instructor_id', $instructorId);
        })->pluck('student_id')->unique();

        $students = User::whereIn('id', $studentIds)
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%");
            })
            ->get()
            ->unique('id')
            ->values();

        $response = $students->map(function ($student) use ($instructorId) {
            // Find last message between instructor and student
            $lastMessage = \App\Models\Chat::where(function ($query) use ($student, $instructorId) {
                $query->where('sender_id', $student->id)
                    ->where('receiver_id', $instructorId);
            })
                ->orWhere(function ($query) use ($student, $instructorId) {
                    $query->where('sender_id', $instructorId)
                        ->where('receiver_id', $student->id);
                })
                ->orderBy('created_at', 'desc')
                ->first();

            // Count unread messages sent **from student to instructor**
            $unreadCount = \App\Models\Chat::where('sender_id', $student->id)
                ->where('receiver_id', $instructorId)
                ->where('is_read', false)
                ->count();

            return [
                'id' => $student->id,
                'name' => $student->name,
                'photo' => $student->photo,
                'last_message' => $lastMessage ? $lastMessage->message : 'No messages yet',
                'last_message_time' => $lastMessage ? $lastMessage->created_at->toDateTimeString() : null,
                'unread_count' => $unreadCount,
            ];
        });

        return response()->json($response);
    }




    public function userMessage(Request $request)
    {
        $user_id = $request->user_id;
        $instructor_id = Auth::user()->id;

        $messages = Message::where('user_id', $user_id)->where('instructor_id', $instructor_id)->with('user', 'instructor_message', 'instructor_message.instructor')->get();

        return ($messages);
        return response()->json($messages);
    }

    public function getConversation($studentId)
    {
        $instructorId = Auth::id();

        $conversation = Conversation::where('student_id', $studentId)
            ->where('instructor_id', $instructorId)
            ->first();

        if (!$conversation) {
            return response()->json(['messages' => []]);
        }

        $messages = Chat::where('conversation_id', $conversation->id)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json(['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'student_id' => 'required|exists:users,id', // Ensure instructor_id is valid
        ]);

        $instructor_id = Auth::user()->id;

        $conversation = Conversation::where(['instructor_id' => $instructor_id, 'student_id' => $request->student_id])->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'student_id' => $request->student_id,
                'instructor_id' => $instructor_id,
            ]);
        }

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('chat_files', 'public');
            $fileUrl = Storage::url($path);
        } else {
            $fileUrl = '';
        }

        $data = Chat::create([
            'sender_id' => $instructor_id,
            'receiver_id' => $request->student_id,
            'message' => $request->message,
            'file_path' => $fileUrl,
            'conversation_id' => $conversation->id,
        ]);

        // sender data
        $message = [
            'sender_id' => $data->sender_id,
            'message' => $data->message,
            'created_at' => $data->created_at,
            'avatar' => $data->sender->photo,
            'file_path' => $fileUrl,
            'sender' => 'instructor',
        ];

        broadcast(new PrivateMessageSent($message, $request->student_id))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'data' => $message
        ]);
    }
}
