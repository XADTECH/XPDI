<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blogcategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_blogcategory = Blogcategory::latest()->get();
        return view('backend.admin.blog-category.index', compact('all_blogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validateData =  $request->validate([
            'category_name' => 'required|string|max:255|unique:blogcategories,category_name',
            'category_slug' => 'nullable|string|max:255|unique:blogcategories,category_slug',
        ]);

        Blogcategory::create($validateData);

        return redirect()->back()->with('success', 'Blog category inserted');
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
        $blog_data = Blogcategory::find($id);
        return view('backend.admin.blog-category.edit', compact('blog_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData =  $request->validate([
            'category_name' => 'required|string|max:255|unique:blogcategories,category_name',
            'category_slug' => 'nullable|string|max:255|unique:blogcategories,category_slug',
        ]);

         // Find the specific category by ID
        $blogCategory = Blogcategory::findOrFail($id);

        // Update the category with validated data
        $blogCategory->update($validateData);

        return redirect()->back()->with('success', 'Blog category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Blogcategory::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.blog-category.index')->with('success', 'Blog Category deleted successfully.');
    }
}
