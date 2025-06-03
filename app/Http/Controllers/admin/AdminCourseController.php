<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $all_courses = Course::latest()->with('user', 'category')->get();
    //     return view('backend.admin.course.index', compact('all_courses'));
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Course::with('category', 'subCategory')
            ->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('course_name', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($q2) use ($search) {
                        $q2->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('subCategory', function ($q3) use ($search) {
                        $q3->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $all_courses = $query->paginate(10);

        if ($request->ajax()) {
            return view('backend.admin.course.partials.course_table', compact('all_courses'))->render();
        }

        return view('backend.admin.course.index', compact('all_courses', 'search'));
    }


    public function courseStatus(Request $request)
    {
        $course = Course::find($request->course_id);

        if ($course) {
            $course->status = $request->status;
            $course->save();

            return response()->json(['success' => true, 'message' => 'Course status updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Course not found!']);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::where('id', $id)->with('user', 'category', 'subCategory')->first();
        return view('backend.admin.course.view', compact('course'));
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

    public function approveEnrollment($id)
    {
        $order = Order::with('course', 'user')->find($id);

        $studentId = isset($order->user->id) ? $order->user->id : 0;
        $courseId = isset($order->course->id) ? $order->course->id : 0;

        $alreadyEnrolled = StudentCourse::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->exists();

        if (!$alreadyEnrolled) {
            StudentCourse::create([
                'student_id' => $studentId,
                'course_id' => $courseId,
            ]);
        }

        $order->update(['status' => 1]);

        return redirect()->back()->with('success', 'Enrollment approved successfully!');
    }
}
