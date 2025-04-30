<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Services\instructor\DashboardService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class InstructorController extends Controller
{

    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function login()
    {

        return view('backend.instructor.login');
    }


    public function dashboard()
    {

        $instructor_id = Auth::user()->id;

        // Total Data
        $totalData = $this->dashboardService->getTotalData($instructor_id);

        // Last Week Data
        $lastWeekData = $this->dashboardService->getLastWeekData($instructor_id);

        $instructor_courses = Course::where('instructor_id', $instructor_id)->get();

        // Prepare data for pie chart
        $chartData = $instructor_courses->map(function ($course) {
            $salesCount = Order::where('course_id', $course->id)->distinct('user_id')->count('user_id');
            return [
                'course_name' => $course->course_name,
                'sales_count' => $salesCount,
            ];
        });

        $recent_order = Order::where('instructor_id', $instructor_id)->with('course')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->get();

        return view('backend.instructor.index', compact('totalData', 'lastWeekData', 'instructor_courses', 'chartData', 'recent_order'));
    }

    public function register()
    {
        return view('backend.instructor.register');
    }

    public function store(Request $request): RedirectResponse
    {
        //dd('Hello');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name ?? 'NULL',
            'last_name' => $request->last_name ?? 'NULL',
            'address' => $request->address ?? 'NULL',
            'phone' => $request->phone ?? 'NULL',
            'day' => $request->day ?? 'NULL',
            'month' => $request->month ?? 'NULL',
            'year' => $request->year ?? 'NULL',
            'city' => $request->city ?? 'NULL',
            'gender' => $request->gender ?? 'NULL',
            'country' => $request->country ?? 'NULL',
            'role' => 'instructor',

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('instructor.dashboard', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
