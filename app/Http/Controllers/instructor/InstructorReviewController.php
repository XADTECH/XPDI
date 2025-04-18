<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorReviewController extends Controller
{

    public function index()
    {
        $instructor_id = Auth::User()->id;
        $all_reviews = Review::where('instructor_id', $instructor_id)->with('course','user')->latest()->get();
        return view('backend.instructor.review.index', compact('all_reviews'));
    }

    public function updateStatus(Request $request)
    {
        $review = Review::find($request->review_id);
        if ($review) {
            $review->status = $request->status;
            $review->save();

            return response()->json(['success' => true, 'message' => 'Review updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Review not found!']);
    }

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
        //
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
