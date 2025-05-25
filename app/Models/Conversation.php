<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';

    protected $guarded = [];

    public function chats()
    {
        return $this->hasMany(Chat::class, 'conversation_id', 'id');
    }

    protected $cast = [
        'student_blcoked_instructor' => 'boolean',
        'instructor_blocked_studend' => 'boolean',
        'student_deleted_instructor' => 'boolean',
        'instructor_deleted_studend' => 'boolean',
    ];
}
