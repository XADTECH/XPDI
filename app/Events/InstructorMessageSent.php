<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class InstructorMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->message->user_id,
            'message' => $this->message->message,
            'sender_type' => $this->message->user->role,
            'time' => Carbon::parse($this->message->created_at)->setTimezone('Asia/Dhaka')->diffForHumans(),
            'instructor_avatar' => $this->message->instructor->photo
                ? $this->message->instructor->photo
                : '', // Default image jodi kono avatar na thake

            'user_avatar' => $this->message->user->photo
                ? $this->message->user->photo
                : '', // Default image jodi kono avatar na thake
        ];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }


}
