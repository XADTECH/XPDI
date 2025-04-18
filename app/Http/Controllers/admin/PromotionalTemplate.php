<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionTemplateRequest;
use App\Models\PromotionalTemplate as ModelsPromotionalTemplate;
use Illuminate\Http\Request;

class PromotionalTemplate extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(PromotionTemplateRequest $request)
    {
        // Ensure there's only one row and update or create it
        ModelsPromotionalTemplate::updateOrCreate(
            ['id' => 1], // Condition to check if the row with ID 1 exists
            $request->validated() // Data to update or create
        );

        return redirect()->back()->with('success', 'Template Updated Successfully');
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
