<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ChatController extends Controller
{
    public function userMessage()
    {
        // স্যাম্পল মেসেজ অ্যারে (আপনি প্রয়োজনে আসল ডেটা ব্যবহার করতে পারেন)
        $messages = Message::with('user', 'instructor_message', 'instructor_message.instructor')->get();
        $user_id = Auth::user()->id;

        $purchase_course_instructor = Order::where('user_id', $user_id)->with('instructor')->get();

        $uniqueInstructors = $purchase_course_instructor->unique('instructor_id')->values();



        return view('backend.user.message.index', compact('messages', 'uniqueInstructors'));
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
            'instructor_id' => 'required|exists:users,id', // Ensure instructor_id is valid
        ]);

        $data = Message::create([
            'user_id' => auth()->id(),
            'instructor_id' => $request->instructor_id,
            'message' => $request->message,
        ]);

        $message = [
            'user_id' => $data->user_id,
            'message' => $data->message,
            'created_at' => $data->created_at,
            'avatar' => $data->user->photo,

            'sender' => 'user',
        ];

        broadcast(new MessageSent($message))->toOthers();

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
