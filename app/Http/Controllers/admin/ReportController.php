<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.admin.report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // Get filter inputs
        $startDate = $request->input('start_date')
        ? Carbon::parse($request->input('start_date'))->format('Y-m-d')
        : null;

        $endDate = $request->input('end_date')
        ? Carbon::parse($request->input('end_date'))->format('Y-m-d')
        : null;

        $month = $request->input('month');
        $year = $request->input('year');




        // Build the query
        $query = Payment::query();

        // Filter by date range
        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }

        // Filter by month
        if ($month) {
            $query->where('order_month', $month);
        }

        // Filter by year
        if ($year) {
            $query->where('order_year', $year);
        }

        // Debug query


        // Execute the query and get results
        $filteredPayments = $query->get();

        // Pass the filtered data to the view
        return view('backend.admin.report.show', compact('filteredPayments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
