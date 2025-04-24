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

class MessageSent implements ShouldBroadcast
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
            'user_id' => $this->message['user_id'],
            'message' => $this->message['message'],
            'time' => Carbon::parse($this->message['created_at'])
                ->setTimezone('Asia/Dhaka')
                ->diffForHumans(),
            'avatar' => $this->message['avatar'] ?? '', // Default image যদি avatar না থাকে

            'sender' => $this->message['sender'], // Identify কে পাঠিয়েছে
        ];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
