<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\InfoBox;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    public function index()
    {


        $course_category = Category::with('course', 'course.user', 'course.course_goal')->get();
        $categories = Category::all();
        $blogs = BlogPost::with('category')->get();
        $all_sliders = Slider::all();
        $all_info = InfoBox::all();

        $most_popular_courses = Order::select('course_id', 'course_title', DB::raw('COUNT(*) as total_orders'))
            ->groupBy('course_id', 'course_title') // Group by course_id and course_title
            ->orderBy('total_orders', 'desc') // Order by total_orders in descending order
            ->with('course', 'course.user')
            ->take(6) // Limit to 6 courses
            ->get();

        $all_reviews = Review::latest()->with('user', 'course')->where('status', '1')->get();

        $all_partner = Partner::all();


        return view('frontend.index', compact('course_category', 'categories', 'blogs', 'all_sliders', 'all_info', 'most_popular_courses', 'all_reviews', 'all_partner'));
    }

    public function view($slug)
    {

        $course = Course::where('course_name_slug', $slug)->with('category', 'subcategory', 'user')->first();
        $course_content = CourseSection::where('course_id', $course->id)->with('lecture')->get();

        $total_lecture = CourseLecture::where('course_id', $course->id)->count();
        $total_lecture_duration = CourseLecture::where('course_id', $course->id)->sum('video_duration');
        $all_category = Category::orderBy('name', 'asc')->get();

        $averageRating = Review::where('course_id', $course->id)
            ->where('status', 1)
            ->avg('rating');



        $unique_student =  Review::where('status', 1)->where('course_id', $course->id)->distinct()->pluck('user_id')->count();

        $count_ratings = Review::where('status', 1)->where('course_id', $course->id)->count();

        //Student bought

        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Fetch similar courses but exclude those already ordered by the student
        $similarCourses = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->whereDoesntHave('orders', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        //Student Feedback

        $ratings_data = Review::where('course_id', $course->id)->where('status', 1)->with('user')->get();

        // রেটিং অনুযায়ী সংখ্যা বের করুন
        $ratingsCount = $ratings_data->groupBy('rating')->map->count();

        // মোট রিভিউ সংখ্যা বের করুন
        $totalRatings = $ratings_data->count();

        $more_course_instructor = Course::where('instructor_id', $course->instructor_id)->where('id', '!=', $course->id)->with('user')->get();


        return view('frontend.pages.course-details.index', compact('course', 'course_content', 'total_lecture', 'all_category', 'averageRating', 'count_ratings', 'unique_student', 'total_lecture_duration', 'similarCourses', 'ratingsCount', 'unique_student', 'totalRatings', 'ratings_data', 'more_course_instructor'));
    }

    public function courseCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $course_data = Course::where('category_id', $category->id)->with('user')->paginate(10);
        return view('frontend.pages.category.index', compact('course_data', 'category'));
    }

    public function courseSubcategory($category, $subcategory)
    {

        $subcategory_data = SubCategory::where('slug', $subcategory)->first();
        $course_data = Course::where('subcategory_id', $subcategory_data->id)->with('user')->paginate(10);

        // Check if it's an AJAX request
        if (request()->ajax()) {

            $html = view('frontend.pages.subcategory.partial.main', compact('course_data'))->render();
            return response()->json(['status' => 'success', 'html' => $html]);
        }

        $category_name = $category;
        $subcategory_name = $subcategory;
        $subcategory_id = $subcategory_data->id;


        return view('frontend.pages.subcategory.index', compact('course_data', 'category_name', 'subcategory_name', 'subcategory_id'));
    }

    public function allCategory()
    {
        return view('frontend.pages.category.all-category');
    }

    public function instructor($name, $id)
    {

        $user = User::find($id);
        $user_course = Course::where('instructor_id', $user->id)->paginate(10);

        return view('frontend.pages.instructor.index', compact('user', 'user_course'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $courses = [];

        if ($query) {
            $courses = Course::where('course_title', 'LIKE', "%{$query}%")
                ->orWhere('course_name', 'LIKE', "%{$query}%")
                ->take(10) // Limit results to 10
                ->get(['id', 'course_title', 'course_name', 'course_image', 'course_name_slug']); // Select necessary fields
        }

        return response()->json($courses);
    }

    public function allCourses()
    {

        $all_courses = Course::with('user')->latest()->paginate(10);

        $total_course = Course::all()->count();

        return view('frontend.pages.all-courses.index', compact('all_courses', 'total_course'));
    }

    public function userSubscribe(Request $request)
    {

        // Validate the email field
        $validatedData = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already subscribed.',
        ]);
        Subscriber::create($validatedData);

        return redirect()->back()->with('success', 'Congratulations! you are our new subscribers');
    }

    public function courseAll()
    {
        $all_courses = Course::with('user')->latest()->paginate(10);

        $html = view('frontend.pages.all-courses.partials.course', compact('all_courses'))->render();

        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function pagination(Request $request)
    {

        // পেজ নাম্বার ফেচ করো, ডিফল্ট পেজ হবে ১
        $page = $request->get('page', 1);

        // পেজ অনুযায়ী ডাটা লোড
        $all_courses = Course::with('user')->latest()->paginate(1, ['*'], 'page', $page);

        // Partial ভিউ রেন্ডার করে HTML তৈরি
        $html = view('frontend.pages.all-courses.partials.course', compact('all_courses'))->render();

        // JSON রেসপন্স
        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }


    public function courseFilter(Request $request)
    {
        // Parse input
        $categories = array_filter(explode(',', $request->input('categories', ''))); // Categories
        $rating = $request->input('rating'); // Minimum rating
        $durations = array_filter(explode(',', $request->input('durations'))); // Comma-separated durations
        $levels = array_filter(explode(',', $request->input('levels', '')));
        $instructors = array_filter(explode(',', $request->input('instructor', ''))); // Instructors

        Log::info('Filter Input', $request->all());


        //return $request->all();

        // Start building the query
        $courses = Course::with('user', 'category', 'course_lecture', 'review');

        Log::info('Total courses without filter:', [$courses->count()]);

        // Apply category filter if categories are provided
        if (!empty($categories)) {
            $courses = $courses->whereHas('category', function ($query) use ($categories) {
                $query->whereIn('name', $categories);
            });
        }

        // Apply instructor filter if instructors are provided
        if (!empty($instructors)) {
            $courses = $courses->whereHas('user', function ($query) use ($instructors) {
                $query->whereIn('name', $instructors);
            });
        }

        // Apply duration filter
        if (!empty($durations)) {
            $courses = $courses->whereHas('course_lecture', function ($query) use ($durations) {
                $query->where(function ($q) use ($durations) {
                    foreach ($durations as $duration) {
                        $durationInMinutes = $duration * 60;
                        if ($duration == 2) {
                            $q->orWhere('video_duration', '>', 120)->where('video_duration', '<=', 300); // 2 to 5 hours
                        } elseif ($duration == 5) {
                            $q->orWhere('video_duration', '>', 300)->where('video_duration', '<=', 600); // 5 to 10 hours
                        } elseif ($duration == 10) {
                            $q->orWhere('video_duration', '>', 600)->where('video_duration', '<=', 960); // 10 to 16 hours
                        } elseif ($duration == 16) {
                            $q->orWhere('video_duration', '>', 960); // More than 16 hours
                        }
                    }
                });
            });
        }

        if (!empty($levels)) {
            $courses = $courses->whereIn('label', $levels);
        }

        if (!empty($rating)) {
            // Convert rating to an array if it's not already
            $ratingArray = is_array($rating) ? $rating : explode(',', $rating);

            $courses = $courses->whereHas('review', function ($query) use ($ratingArray) {
                $query->whereIn('rating', $ratingArray);
            });
        }


        // Paginate the filtered results
        $all_courses = $courses->paginate(10);  // Adjust pagination as necessary



        $html = view('frontend.pages.all-courses.partials.course', compact('all_courses'))->render();



        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }


    public function categoryCourseFilter(Request $request)
    {
        // Parse input
        $categories = array_filter(explode(',', $request->input('categories', ''))); // Categories
        $rating = $request->input('rating'); // Minimum rating
        $durations = array_filter(explode(',', $request->input('durations'))); // Comma-separated durations
        $levels = array_filter(explode(',', $request->input('levels', '')));
        $instructors = array_filter(explode(',', $request->input('instructor', ''))); // Instructors

        $subcategory = $request->input('subcategory');


        Log::info('Filter Input', $request->all());


        //return $request->all();

        // Start building the query
        $courses = Course::with('user', 'category', 'course_lecture', 'review')->where('subcategory_id', $subcategory);

        Log::info('Total courses without filter:', [$courses->count()]);

        // Apply category filter if categories are provided
        if (!empty($categories)) {
            $courses = $courses->whereHas('category', function ($query) use ($categories) {
                $query->whereIn('name', $categories);
            });
        }

        // Apply instructor filter if instructors are provided
        if (!empty($instructors)) {
            $courses = $courses->whereHas('user', function ($query) use ($instructors) {
                $query->whereIn('name', $instructors);
            });
        }

        // Apply duration filter
        if (!empty($durations)) {
            $courses = $courses->whereHas('course_lecture', function ($query) use ($durations) {
                $query->where(function ($q) use ($durations) {
                    foreach ($durations as $duration) {
                        $durationInMinutes = $duration * 60;
                        if ($duration == 2) {
                            $q->orWhere('video_duration', '>', 120)->where('video_duration', '<=', 300); // 2 to 5 hours
                        } elseif ($duration == 5) {
                            $q->orWhere('video_duration', '>', 300)->where('video_duration', '<=', 600); // 5 to 10 hours
                        } elseif ($duration == 10) {
                            $q->orWhere('video_duration', '>', 600)->where('video_duration', '<=', 960); // 10 to 16 hours
                        } elseif ($duration == 16) {
                            $q->orWhere('video_duration', '>', 960); // More than 16 hours
                        }
                    }
                });
            });
        }

        if (!empty($levels)) {
            $courses = $courses->whereIn('label', $levels);
        }

        if (!empty($rating)) {
            // Convert rating to an array if it's not already
            $ratingArray = is_array($rating) ? $rating : explode(',', $rating);

            $courses = $courses->whereHas('review', function ($query) use ($ratingArray) {
                $query->whereIn('rating', $ratingArray);
            });
        }


        // Paginate the filtered results
        $course_data = $courses->paginate(10);  // Adjust pagination as necessary



        $html = view('frontend.pages.subcategory.partial.main', compact('course_data'))->render();



        return response()->json([
            'status' => 'success',
            'html' => $html,
        ]);
    }


    public function allCourseGrid()
    {
        $all_courses = Course::with('user')->latest()->paginate(9);

        return view('frontend.pages.all-courses.grid.index', compact('all_courses'));
    }

    public function allCourseList()
    {
        $all_courses = Course::with('user')->latest()->paginate(9);

        return view('frontend.pages.all-courses.list.index', compact('all_courses'));
    }
}
