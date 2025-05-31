<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Helper methods for role checking

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isInstructor()
    {
        return $this->role === 'instructor';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_login_at' => 'datetime', // Ensure this is cast to a Carbon instance
        ];
    }

    public function isOnline()
    {
        // Consider a user online if they logged in within the last 5 minutes
        return $this->last_login_at && $this->last_login_at->gt(Carbon::now()->subMinutes(5));
    }

    public function lastLoginDiff()
    {
        return $this->last_login_at ? $this->last_login_at->diffForHumans() : 'Never';
    }


    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id', 'id');
    }


    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Course::class, 'instructor_id', 'course_id', 'id', 'id');
    }

    public function students()
    {
        return $this->hasManyThrough(
            StudentCourse::class, // the pivot model
            Course::class,        // through the course
            'instructor_id',      // foreign key on Course
            'course_id',          // foreign key on StudentCourse
            'id',                 // local key on User (instructor)
            'id'                  // local key on Course
        );
    }
}
