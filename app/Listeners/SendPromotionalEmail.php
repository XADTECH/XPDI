<?php

namespace App\Listeners;

use App\Events\PromotionalEmailEvent;
use App\Mail\PromotionalEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPromotionalEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(PromotionalEmailEvent $event)
    {
        foreach ($event->subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new PromotionalEmail($event->mail_data));
        }
    }


}
