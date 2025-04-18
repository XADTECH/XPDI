<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstructorMessage extends Model
{
    protected $guarded = [];

    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
