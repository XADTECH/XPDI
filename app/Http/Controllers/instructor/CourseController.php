<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseGoal;
use App\Models\SubCategory;
use App\Models\User;
use App\Services\instructor\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    // public function index(Request $request)
    // {
    //     $instructor_id = Auth::user()->id;
    //     $search = $request->input('search');

    //     $query = Course::where('instructor_id', $instructor_id)
    //         ->with('category', 'subCategory')
    //         ->latest();

    //     if ($search) {
    //         $query->where('course_name', 'like', '%' . $search . '%');
    //     }

    //     $all_courses = $query->paginate(10);

    //     if ($request->ajax()) {
    //         return view('backend.instructor.course.partials.course_table', compact('all_courses'))->render();
    //     }

    //     return view('backend.instructor.course.index', compact('all_courses', 'search'));
    // }

    public function index(Request $request)
    {
        $instructor_id = Auth::user()->id;
        $search = $request->input('search');

        $query = Course::where('instructor_id', $instructor_id)
            ->with('category', 'subCategory')
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
            return view('backend.instructor.course.partials.course_table', compact('all_courses'))->render();
        }

        return view('backend.instructor.course.index', compact('all_courses', 'search'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_categories = Category::all();

        return view('backend.instructor.course.create', compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->all();


        $course = $this->courseService->createCourse($validatedData, $request->file('course_image'));

        //Manage Course Goal
        if (!empty($validatedData['course_goals'])) {
            $this->courseService->createCourseGoals($course->id, $validatedData['course_goals']);
        }

        return back()->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $all_categories = Category::all();
        $course = Course::with('subCategory')->find($id);
        $course_goals = CourseGoal::where('course_id', $id)->get();
        return view('backend.instructor.course.edit', compact('all_categories', 'course', 'course_goals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update2(Request $request)
    {


        $validatedData = $request->all();


        $course = $this->courseService->updateCourse($validatedData, $request->file('image'), $request->file('video'), $request->id);

        //Manage Course Goal

        if (!empty($validatedData['course_goals'])) {
            $this->courseService->updateCourseGoals($course->id, $validatedData['course_goals']);
        }

        return back()->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);

        // Delete associated image if exists
        // Delete the image file if it exists
        if ($course->image) {
            $imagePath = public_path(parse_url($course->course_image, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $course->delete();

        return redirect()->route('instructor.course.index')->with('success', 'Course deleted successfully.');
    }
}
