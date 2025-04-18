<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Course;
use App\Models\Order;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FFMpeg\FFProbe;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $courses = Order::where('user_id', $user_id)->with('course', 'instructor')->paginate('4');
        return view('backend.user.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        // Create the question
        Question::create($request->validated());

        return redirect()->back()->with('success', 'Question request successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = Course::where('course_name_slug', $slug)->with('course_section', 'course_section.lecture', 'user')->first();

        // Calculate the total number of lectures
        $totalLectures = $course->course_section->flatMap(function ($section) {
            return $section->lecture;
        })->count();

        // Calculate the total video duration
        $total_duration = $course->course_section->flatMap(function ($section) {
            return $section->lecture;
        })->sum('video_duration');

        $all_question = Question::where('course_id', $course->id)->with('user', 'replay')->get();

        return view('backend.user.lession.index', compact('course', 'total_duration', 'totalLectures', 'all_question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
