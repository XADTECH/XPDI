<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Services\admin\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function login()
    {

        return view('backend.admin.login');
    }

    public function dashboard()
    {
        $total_courses = \App\Models\Course::count();
        $total_enrolled_students = DB::table('students_courses')->distinct('student_id')->count('student_id');
        $total_instructors = \App\Models\User::where('role', 'instructor')->count();
        $total_enrollment_requests = DB::table('students_courses')->where('status', 0)->count();

        $currentYear = Carbon::now()->year;
        $months = collect([]);
        $studentCounts = collect([]);

        for ($month = 1; $month <= 12; $month++) {
            $count = DB::table('students_courses')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->distinct('student_id')
                ->count('student_id');

            $months->push(Carbon::create()->month($month)->format('F'));
            $studentCounts->push($count);
        }

        $contact_list = User::where('role', 'instructor')->get();

        return view('backend.admin.index', [
            'total_courses' => $total_courses,
            'total_enrolled_students' => $total_enrolled_students,
            'total_instructors' => $total_instructors,
            'total_enrollment_requests' => $total_enrollment_requests,
            'months' => $months,
            'studentCounts' => $studentCounts,
            'contact_list' => $contact_list,
        ]);
    }



    /*

    public function dashboard()
    {
        // মোট ডেটা
        $total_order = Order::count();
        $total_earn = Order::sum('price');
        $total_students = User::where('role', 'user')->count();
        $total_instructor = User::where('role', 'instructor')->count();

        // গত সপ্তাহের ডেটা
        $last_week_orders = Order::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ])->count();

        $last_week_earn = Order::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek(),
        ])->sum('price');

        $last_week_students = User::where('role', 'user')
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek(),
            ])->count();

        $last_week_instructors = User::where('role', 'instructor')
            ->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek(),
            ])->count();

        // গ্রোথ পার্সেন্টেজ
        $order_growth = $last_week_orders > 0 ? (($total_order - $last_week_orders) / $last_week_orders) * 100 : 0;
        $earn_growth = $last_week_earn > 0 ? (($total_earn - $last_week_earn) / $last_week_earn) * 100 : 0;
        $student_growth = $last_week_students > 0 ? (($total_students - $last_week_students) / $last_week_students) * 100 : 0;
        $instructor_growth = $last_week_instructors > 0 ? (($total_instructor - $last_week_instructors) / $last_week_instructors) * 100 : 0;


        // Orders data (Number of orders per month for the current year)
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Courses data (Number of courses created per month for the current year)
        $courses = Course::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        //Chart Calculation

        // Month labels (January, February, ...)
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('F');
        });

        // Ensure months with no data are filled with 0
        $orders_data = $months->mapWithKeys(function ($month, $index) use ($orders) {
            return [$month => $orders[$index + 1] ?? 0];
        });

        $courses_data = $months->mapWithKeys(function ($month, $index) use ($courses) {
            return [$month => $courses[$index + 1] ?? 0];
        });

        return view('backend.admin.index', compact(
            'total_order',
            'total_earn',
            'total_students',
            'total_instructor',
            'order_growth',
            'earn_growth',
            'student_growth',
            'instructor_growth',

            'months',
            'orders_data',
            'courses_data',
        ));
    }  */

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function contactView($id)
    {

        $contact = Contact::find($id);

        return view('backend.admin.contact.show', compact('contact'));
    }
}
