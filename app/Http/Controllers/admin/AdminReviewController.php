<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_reviews = Review::with('course','user')->latest()->get();
        return view('backend.admin.review.index', compact('all_reviews'));
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
