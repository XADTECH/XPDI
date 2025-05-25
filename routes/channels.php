<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
    // Authorize: only let the recipient listen
    return (int) $user->id === (int) $receiverId;
});
