<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    use FileUploadTrait; // Use the FileUploadTrait

    public function index()
    {
        $slider = Slider::all();
        return view('backend.admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {

        $validated_data = $request->validated();

        // Check if the image file exists
        if ($request->hasFile('image')) {
            $validated_data['image'] = $this->uploadFile($request->file('image'), 'slider');
        }

        Slider::create($validated_data);

        return redirect()->back()->with('success', 'New slider created');
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
        $slider = Slider::find($id);
        return view('backend.admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $validated_data = $request->validated();

        // Find the slider record
        $slider = Slider::find($id);

        // Check if the image file exists in the request
        if ($request->hasFile('image')) {
            // Unlink the previous image if it exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            // Upload the new image
            $validated_data['image'] = $this->uploadFile($request->file('image'), 'slider');
        }

        // Update the slider record
        $slider->update($validated_data);

        return redirect()->back()->with('success', 'Slider updated successfully');
    }


    public function destroy(string $id)
    {
        Slider::findOrFail($id)->delete();

        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }
}
