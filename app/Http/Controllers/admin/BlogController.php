<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blogcategory;
use App\Models\BlogPost;
use App\Services\admin\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }



    public function index()
    {
        $blog_post = BlogPost::latest()->get();
        return view('backend.admin.blog.index', compact('blog_post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_blogCategory = Blogcategory::orderBy('category_name', 'asc')->get();
        return view('backend.admin.blog.create', compact('all_blogCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $this->blogService->saveBlog($request->validated(), $request->file('post_image'));
        return redirect()->back()->with('success', 'Post Created successfully');
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
        $all_blogCategory = Blogcategory::orderBy('category_name', 'asc')->get();
        $blog = BlogPost::find($id);
        return view('backend.admin.blog.edit', compact('all_blogCategory', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id)
    {
        $this->blogService->updateBlog($request->validated(), $request->file('post_image'), $id);
        return redirect()->back()->with('success', 'Blog Updated successfully');
    }

    public function blogDetails($slug){
        $blog = BlogPost::where('post_slug', $slug)->first();
        $category = Blogcategory::orderBy('category_name', 'asc')->with('blogpost')->get();
        $all_blog = BlogPost::where('id','!=', $blog->id)->limit(3)->get();
        return view('frontend.pages.blog.index', compact('blog', 'category', 'all_blog'));

    }

    public function category($slug){

        $blog_data = Blogcategory::where('category_slug', $slug)->first();

        if ($blog_data) {
            $blog_posts = $blog_data->blogpost()->paginate(10); // এখানে 10 হলো প্রতি পেজে কতগুলো পোস্ট দেখাবেন।
            return view('frontend.pages.blog.category.index', compact('blog_data', 'blog_posts'));
        }

        return abort(404); // যদি ক্যাটাগরি না পাওয়া যায়, 404 পেজ দেখানো হবে।

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BlogPost::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
    }

    public function allBlog(){
        $all_blog = BlogPost::latest()->paginate(9);
        return view('frontend.pages.blog.all-blog.index', compact('all_blog'));
    }

    public function blogTag($tag)
    {
        // Filter blog posts where the tag matches any of the post_tags
        $filteredPosts = BlogPost::where('post_tags', 'like', "%{$tag}%")->paginate(10);
        return view('frontend.pages.blog.tag.index', compact('filteredPosts', 'tag'));
    }

}
