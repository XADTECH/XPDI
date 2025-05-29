<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf; // Correct namespace for Laravel 11+

class InstructorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructor_id = Auth::user()->id;
        $all_order = Order::where('instructor_id', $instructor_id)->with('payment')->latest()->get();
        return view('backend.instructor.order.index', compact('all_order'));
    }


    public function show(string $id)
    {
        $order_info = Order::where('id', $id)->with('course', 'user', 'instructor', 'payment')->first();

        return view('backend.instructor.order.show', compact('order_info'));
    }

    public function invoice($id)
    {
        // Fetch the order data with related course, instructor, and user
        $data = Order::where('id', $id)->with('course', 'instructor', 'user')->first();

        // Modify the image URLs to remove the base URL
        $data->course->course_image = str_replace('http://127.0.0.1:8000/', '', $data->course->course_image);
        $data->instructor->photo = str_replace('http://127.0.0.1:8000/', '', $data->instructor->photo);
        $data->user->photo = str_replace('http://localhost:8000/', '', $data->user->photo);  // Handle both localhost and 127.0.0.1

        // Generate PDF and download
        $pdf = Pdf::loadView('pdf.order', compact('data'));
        return $pdf->download('order.pdf');
    }
}
