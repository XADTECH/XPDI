<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Replay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructor_id = Auth::user()->id;
        $all_question = Question::where('instructor_id',$instructor_id)->with('course', 'user')->latest()->get();
        return view('backend.instructor.question.index', compact('all_question'));
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
        //return $request->all();
        Replay::create($request->all());
        return redirect()->back()->with('success', 'Your answer is submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::where('id', $id)->with('user', 'instructor')->first();

        $replay = Replay::where('question_id', $id)->get();
       // return $question;
        return view('backend.instructor.question.show', compact('question', 'replay'));
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
