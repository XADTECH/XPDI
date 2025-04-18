<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoogleRequest;
use App\Http\Requests\MailRequest;
use App\Http\Requests\PusherRequest;
use App\Http\Requests\StripeRequest;
use App\Models\Google;
use App\Models\Pusher;
use App\Models\Smtp;
use App\Models\Stripe;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function mailSetting()
    {
        $mailSettings = Smtp::first();
        return view('backend.admin.setting.mail.index', compact('mailSettings'));
    }

    public function updateMailSettings(MailRequest $request)
    {

        Smtp::updateOrCreate(['id' => 1], $request->validated());

        return redirect()->back()->with('success', 'Mail settings updated successfully!');
    }

    public function stripeSetting(){

        $stripeSettings = Stripe::first();

        return view('backend.admin.setting.stripe.index', compact('stripeSettings'));

    }

    public function updateStripeSettings(StripeRequest $request)
    {

        Stripe::updateOrCreate(['id' => 1], $request->validated());

        return redirect()->back()->with('success', 'Stripe settings updated successfully!');
    }

    public function pusherSetting()
    {
        $pusherSettings = Pusher::first();
        return view('backend.admin.setting.pusher.index', compact('pusherSettings'));
    }

    public function updatePusherSettings(PusherRequest $request)
    {

        Pusher::updateOrCreate(['id' => 1], $request->validated());

        return redirect()->back()->with('success', 'Pusher updated successfully!');
    }

    public function googleSetting(){
        $google = Google::first();
        return view('backend.admin.setting.google.index', compact('google'));

    }

    public function updateGoogleSettings(GoogleRequest $request)
    {

        Google::updateOrCreate(['id' => 1], $request->validated());

        return redirect()->back()->with('success', 'Google updated successfully!');
    }
}
