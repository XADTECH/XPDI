<?php

namespace App\Services\admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Course;
use Carbon\Carbon;

class DashboardService
{
    public function getTotalData()
    {
        return [
            'total_order' => Order::count(),
            'total_earn' => Order::sum('price'),
            'total_students' => User::where('role', 'user')->count(),
            'total_instructor' => User::where('role', 'instructor')->count(),
        ];
    }

    public function getLastWeekData()
    {
        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

        return [
            'last_week_orders' => Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
            'last_week_earn' => Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])->sum('price'),
            'last_week_students' => User::where('role', 'user')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
            'last_week_instructors' => User::where('role', 'instructor')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
        ];
    }

    public function calculateGrowth($total, $lastWeek)
    {
        return $lastWeek > 0 ? (($total - $lastWeek) / $lastWeek) * 100 : 0;
    }

    public function getMonthlyData()
    {
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $courses = Course::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('F');
        });

        $orders_data = $months->mapWithKeys(function ($month, $index) use ($orders) {
            return [$month => $orders[$index + 1] ?? 0];
        });

        $courses_data = $months->mapWithKeys(function ($month, $index) use ($courses) {
            return [$month => $courses[$index + 1] ?? 0];
        });

        return [
            'months' => $months,
            'orders_data' => $orders_data->values(),
            'courses_data' => $courses_data->values(),
        ];
    }
}
