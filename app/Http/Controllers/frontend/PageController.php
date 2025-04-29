<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('frontend.about');
    }

    public function contactUs()
    {
        return view('frontend.pages.contact-us.index');
    }

    public function contact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable',
            'message' => 'required|string|max:5000',
        ]);

        // If validation passes, save the contact data
        Contact::create($validatedData);

        return back()->with('success', 'Your message has been sent successfully.');
    }

    public function faq()
    {
        return view('frontend.pages.faq.index');
    }
}
