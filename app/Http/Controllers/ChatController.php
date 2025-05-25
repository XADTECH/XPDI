<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Events\PrivateMessageSent;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Chat;
use App\Models\User;
use App\Models\Order;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class ChatController extends Controller
{

    public function sendEvent(Request $request)
    {

        $message = 'this is test message';
        $userId = 4;

        broadcast(new TestEvent($message, $userId));

        return response()->json(['status' => 'Message broadcasted']);
    }


    public function privateMessage(Request $request)
    {
        $receiverId = 4;
        $message = 'Hello, this is a private message!';
        broadcast(new PrivateMessageSent($message, $receiverId))->toOthers();

        return 'Private message sent!';
    }


    public function searchInstructors_old(Request $request)
    {
        $studentId = Auth::id();
        $keyword = $request->input('q');

        $instructors = StudentCourse::where('student_id', $studentId)
            ->whereHas('course.instructor', function ($query) use ($keyword) {
                if ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                }
            })
            ->with('course.instructor')
            ->get()
            ->pluck('course.instructor')
            ->unique('id')
            ->values();

        $response = $instructors->map(function ($instructor) use ($studentId) {
            // Find the last message between this student and instructor
            $lastMessage = Chat::where('sender_id', $instructor->id)
                ->orWhere('receiver_id', $instructor->id)
                ->orderBy('created_at', 'desc')
                ->first();

            // Count unread messages for this student
            $unreadCount = Chat::where('sender_id', $instructor->id)
                ->where('receiver_id', $studentId)
                ->where('is_read', false)
                ->count();

            return [
                'id' => $instructor->id,
                'name' => $instructor->name,
                'photo' => $instructor->photo,
                'last_message' => $lastMessage ? $lastMessage->message : 'No messages yet',
                'last_message_time' => $lastMessage ? $lastMessage->created_at->toDateTimeString() : null,
                'unread_count' => $unreadCount,
            ];
        });

        return response()->json($response);
    }

    public function searchInstructors(Request $request)
    {
        $studentId = Auth::id();
        $keyword = $request->input('q');

        $instructors = StudentCourse::where('student_id', $studentId)
            ->whereHas('course.instructor', function ($query) use ($keyword) {
                if ($keyword) {
                    $query->where('name', 'like', "%$keyword%");
                }
            })
            ->with('course.instructor')
            ->get()
            ->pluck('course.instructor')
            ->unique('id')
            ->values();

        $response = $instructors->map(function ($instructor) use ($studentId) {
            // Get the conversation between this student and instructor
            $conversation = Conversation::where('student_id', $studentId)
                ->where('instructor_id', $instructor->id)
                ->first();

            $lastMessage = null;
            $unreadCount = 0;

            if ($conversation) {
                // Get the last message only for this conversation
                $lastMessage = Chat::where('conversation_id', $conversation->id)
                    ->orderBy('created_at', 'desc')
                    ->first();

                // Count unread messages only for this conversation
                $unreadCount = Chat::where('conversation_id', $conversation->id)
                    ->where('receiver_id', $studentId)
                    ->where('is_read', false)
                    ->count();
            }

            return [
                'id' => $instructor->id,
                'name' => $instructor->name,
                'photo' => $instructor->photo,
                'last_message' => $lastMessage ? $lastMessage->message : 'No messages yet',
                'last_message_time' => $lastMessage ? $lastMessage->created_at->toIso8601String() : null,
                'unread_count' => $unreadCount,
            ];
        });

        return response()->json($response);
    }



    public function getConversation($instructorId)
    {
        $studentId = Auth::id();

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


    public function userMessage()
    {
        // স্যাম্পল মেসেজ অ্যারে (আপনি প্রয়োজনে আসল ডেটা ব্যবহার করতে পারেন)
        // $messages = Message::with('user', 'instructor_message', 'instructor_message.instructor')->get();
        // $user_id = Auth::user()->id;

        // $purchase_course_instructor = Order::where('user_id', $user_id)->with('instructor')->get();

        // $uniqueInstructors = $purchase_course_instructor->unique('instructor_id')->values();

        // get teachers list against subscribded students
        // $data = StudentCourse::where('student_id', Auth::id())->whereHas('course')->with('course.instructor')->get();

        // $instructors = StudentCourse::where('student_id', Auth::id())
        //     ->whereHas('course')
        //     ->with('course.instructor')
        //     ->get()
        //     ->pluck('course.instructor') // collect only the instructor objects
        //     ->unique('id')               // make them unique by instructor ID
        //     ->values();                  // reset collection keys (optional)


        // return view('backend.user.message.index', compact('messages', 'uniqueInstructors'));
        return view('backend.user.chat');
    }

    public function getInstructorMessages(Request $request)
    {
        $instructor_id = $request->instructor_id;
        $user_id = Auth::user()->id;

        $messages = Message::where('instructor_id', $instructor_id)->with('user', 'instructor_message', 'instructor_message.instructor')->where('user_id', $user_id)->get();

        return ($messages);
        return response()->json($messages);
    }



    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'instructor_id' => 'required|exists:users,id',
        ]);

        $studentId = Auth::id();

        $conversation = Conversation::firstOrCreate(
            ['student_id' => $studentId, 'instructor_id' => $request->instructor_id]
        );

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('chat_files', 'public');
            $fileUrl = Storage::url($path);
        } else {
            $fileUrl = '';
        }

        $data = Chat::create([
            'sender_id' => $studentId,
            'receiver_id' => $request->instructor_id,
            'message' => $request->message,
            'file_path' => $fileUrl,
            'conversation_id' => $conversation->id,
        ]);


        $message = [
            'sender_id' => $data->sender_id,
            'message' => $data->message,
            'created_at' => $data->created_at,
            'avatar' => $data->sender->photo,
            'file_path' => $fileUrl,
            'sender' => 'student',
        ];

        broadcast(new PrivateMessageSent($message, $request->instructor_id))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'data' => $message
        ]);
    }





    public function deleteMessages(Request $request)
    {
        $request->validate([
            'instructor_id' => 'required|exists:users,id',
        ]);

        $userId = auth()->id();

        // ইউজার আর ইন্সট্রাকটরের মেসেজ ডিলিট করো
        Message::where('user_id', $userId)
            ->where('instructor_id', $request->instructor_id)
            ->delete();

        return response()->json(['success' => true, 'message' => 'মেসেজ ডিলিট সফল হয়েছে।']);
    }




    public function sendPusher()
    {
        event(new MessageSent('hello world'));
    }
}
