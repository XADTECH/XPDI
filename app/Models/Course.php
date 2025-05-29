<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function course_goal()
    {
        return $this->hasMany(CourseGoal::class, 'course_id', 'id');
    }

    public function course_section()
    {
        return $this->hasMany(CourseSection::class, 'course_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'course_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'course_id', 'id');
    }

    public function course_lecture()
    {
        return $this->hasMany(CourseLecture::class, 'course_id', 'id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'students_courses', 'course_id', 'student_id');
    }
}
