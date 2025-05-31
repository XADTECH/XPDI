<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Models\EnrollmentRequest;
use App\Models\InfoBox;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Review;
use App\Models\StudentCourse;
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
        // $popular_courses = Course::with(['instructor', 'category', 'review'])->withCount('course_lecture')->limit(6)->get();

        // $popular_courses = Course::with(['instructor', 'category', 'review'])
        //     ->withCount(['students', 'course_lecture']) // add both counts
        //     ->orderByDesc('students_count') // sort by most enrolled
        //     ->limit(6)
        //     ->get();


        $popular_courses = Course::with(['instructor', 'category', 'review'])
            ->withCount(['students', 'course_lecture', 'review']) // count reviews
            ->withAvg('review', 'rating') // average rating
            ->orderByDesc('students_count')
            ->limit(6)
            ->get();


        return view('frontend.index', compact('popular_courses'));
    }

    public function view_old($slug)
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


        // return view('frontend.pages.course-details.index', compact('course', 'course_content', 'total_lecture', 'all_category', 'averageRating', 'count_ratings', 'unique_student', 'total_lecture_duration', 'similarCourses', 'ratingsCount', 'unique_student', 'totalRatings', 'ratings_data', 'more_course_instructor'));
        return view('frontend.course-detail');
    }

    public function requirementsGathering($slug)
    {
        $course = Course::with(['category', 'subCategory', 'instructor'])
            ->withCount('course_lecture')
            ->where('course_name_slug', $slug)
            ->firstOrFail();

        return view('frontend.requirement_gathering', compact('course'));
    }

    public function saveRequirements(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'enrollment_purpose' => 'required|string|max:500',
            'qualification' => 'required|string|max:255',
            'area_of_interest' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'instructor_id' => $request->instructor_id,
            'course_title' => $request->course_title,
            'enrollment_purpose' => $request->enrollment_purpose,
            'qualification' => $request->qualification,
            'area_of_interest' => $request->area_of_interest,
            'address' => $request->address,

        ]);

        if (Auth::check()) {
            $studentId = Auth::id();
            return redirect()->route('user.dashboard')->with('success', 'Your request has been submitted successfully!');
        } else {
            $studentId = 0;
            $slug = $request->input('slug'); // make sure you pass this in the form or fetch it
            return redirect()->route('course-details', ['slug' => $request->course_slug])->with('success', 'Your request has been submitted successfully!');
        }


        $studentId = Auth::id();

        $alreadyEnrolled = Order::where('user_id', $studentId)
            ->where('course_id', $course->id)
            ->exists();

        if (!$alreadyEnrolled) {
            StudentCourse::create([
                'user_id' => $studentId,
                'course_id' => $course->id,
                'instructor_id' => $course->id,
            ]);
        }
    }

    public function view($slug)
    {
        $course = Course::with(['category', 'subCategory', 'instructor'])
            ->withCount('course_lecture')
            ->where('course_name_slug', $slug)
            ->firstOrFail();


        if (Auth::check()) {
            $studentId = Auth::id();

            $alreadyEnrolled = StudentCourse::where('student_id', $studentId)
                ->where('course_id', $course->id)
                ->exists();

            if (!$alreadyEnrolled) {
                StudentCourse::create([
                    'student_id' => $studentId,
                    'course_id' => $course->id,
                ]);
            }
        }

        return view('frontend.course-detail', compact('course'));
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
    public function courses(Request $request)
    {
        $query = Course::with(['instructor', 'category'])
            ->withCount('lessons')
            ->withCount('review')
            ->withAvg('review', 'rating');

        // Categories filter
        if ($request->has('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        // Instructors filter
        if ($request->has('instructors')) {
            $query->whereIn('instructor_id', $request->instructors);
        }

        // Level filter
        if ($request->has('levels')) {
            $query->whereIn('label', $request->levels);  // assuming label stores level like 'Beginner'
        }

        // Ratings filter
        if ($request->has('ratings')) {
            $query->whereHas('review', function ($q) use ($request) {
                $q->whereIn(DB::raw('FLOOR(rating)'), $request->ratings);
            });
        }

        // Durations filter
        if ($request->has('durations')) {
            $minDuration = min($request->durations);
            $query->where('duration', '>=', $minDuration);
        }

        // Sorting by tab (Recommended, Popular, Recent)
        if ($request->has('sort_by')) {
            if ($request->sort_by === 'popular') {
                $query->withCount('students')->orderByDesc('students_count');
            } elseif ($request->sort_by === 'recent') {
                $query->orderByDesc('created_at');
            } else {  // Recommended (default)
                $query->orderByDesc('review_avg_rating');
            }
        }

        // Load more (pagination)
        $courses = $query->paginate(4);

        // Supporting data
        $categories = Category::withCount('course')->get();
        $instructors = User::where('role', 'instructor')->withCount('courses')->get();

        $ratingCounts = [
            5 => Course::select('courses.id')
                ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                ->groupBy('courses.id')
                ->havingRaw('AVG(reviews.rating) = 5')
                ->get()
                ->count(),

            4 => Course::select('courses.id')
                ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                ->groupBy('courses.id')
                ->havingRaw('AVG(reviews.rating) >= 4')
                ->get()
                ->count(),

            3 => Course::select('courses.id')
                ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                ->groupBy('courses.id')
                ->havingRaw('AVG(reviews.rating) >= 3')
                ->get()
                ->count(),

            2 => Course::select('courses.id')
                ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                ->groupBy('courses.id')
                ->havingRaw('AVG(reviews.rating) >= 2')
                ->get()
                ->count(),

            1 => Course::select('courses.id')
                ->join('reviews', 'courses.id', '=', 'reviews.course_id')
                ->groupBy('courses.id')
                ->havingRaw('AVG(reviews.rating) >= 1')
                ->get()
                ->count(),
        ];

        $durationCounts = [
            120 => Course::where('duration', '>=', 120)->count(),
            300 => Course::where('duration', '>=', 300)->count(),
            600 => Course::where('duration', '>=', 600)->count(),
            960 => Course::where('duration', '>=', 960)->count(),
        ];

        if ($request->ajax()) {
            return view('frontend.partials.course-list', compact('courses'))->render();
        }

        return view('frontend.courses', compact('courses', 'categories', 'instructors', 'ratingCounts', 'durationCounts'));
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
