<?php

namespace App\Http\Controllers\instructor;

use App\Events\InstructorMessageSent;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\InstructorMessage;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorChatController extends Controller
{
    public function index(){
        $instructor_id = Auth::user()->id;
        $unique_students = Order::where('instructor_id', $instructor_id)->select('user_id')->distinct()->with('user')->get();
        return view('backend.instructor.chat.index', compact('unique_students'));
    }

    public function userMessage(Request $request){
        $user_id = $request->user_id;
        $instructor_id = Auth::user()->id;

        $messages = Message::where('user_id', $user_id)->where('instructor_id', $instructor_id)->with('user', 'instructor_message', 'instructor_message.instructor')->get();

        return ($messages);
        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'user_id' => 'required|exists:users,id', // Ensure instructor_id is valid
        ]);

        $instructor_id = Auth::user()->id;

        $user_last_message = Message::where('user_id', $request->user_id)->where('instructor_id', $instructor_id)->orderBy('created_at', 'desc')->first();

          // Check if the last message exists and get the ID or set it to null
         $user_message_id = $user_last_message ? $user_last_message->id : 1;



        $data = InstructorMessage::create([
            'instructor_id' => $instructor_id,
            'user_id' => $request->user_id,
            'message' => $request->message,
            'user_message_id' => $user_message_id,
        ]);

        $message = [
            'user_id' => $data->user_id,
            'message' => $data->message,
            'created_at' => $data->created_at,

            'avatar' => $data->instructor->photo,
            'sender' => 'instructor',
        ];



        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
            'data' => $message
        ]);
    }
}
