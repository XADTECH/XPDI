<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function instructor_message(){
        return $this->hasMany(InstructorMessage::class, 'user_message_id', 'id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }


}
