<?php

namespace App\Http\Controllers\admin;

use App\Events\PromotionalEmailEvent;
use App\Http\Controllers\Controller;
use App\Models\PromotionalTemplate;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_subscribers = Subscriber::all();
        $template_info = PromotionalTemplate::first();
        return view('backend.admin.subscriber.index', compact('all_subscribers', 'template_info'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subscriber_ids' => 'required|array',
            'subscriber_ids.*' => 'exists:subscribers,id',
        ]);

        $subscribers = Subscriber::whereIn('id', $request->subscriber_ids)->get();

        $mail_data = PromotionalTemplate::first();

         // Dispatch the event
        event(new PromotionalEmailEvent($subscribers, $mail_data));

        return response()->json(['message' => 'Mail sent successfully to selected subscribers.']);
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
