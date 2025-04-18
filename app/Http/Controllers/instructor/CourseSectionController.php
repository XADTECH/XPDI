<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        $validateData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'section_title' => 'required|string|max:255',
        ]);

        // Store the data in the database
        CourseSection::create($validateData);


        return redirect()->back()->with('success', 'New section added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        // $all_course_section = CourseSection::where('course_id', $id)->get();
        // $all_lecture = CourseLecture::where('course_id', $id)->get();

        $course_wise_lecture = CourseSection::with('lecture')->where('course_id', $id)->get();


        return view('backend.instructor.course-section.index', compact('course',  'course_wise_lecture'));
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
        $section = CourseSection::with('lecture')->findOrFail($id);


        // Loop through all associated lectures
        foreach ($section->lecture as $lecture) {
            if ($lecture->video) {
                $videoPath = public_path(parse_url($lecture->video, PHP_URL_PATH)); // Extract full file path
                if (file_exists($videoPath)) {
                    unlink($videoPath); // Delete the video file
                }
            }
        }

        $section->delete();

        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}
