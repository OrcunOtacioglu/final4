<?php

namespace App\Listeners;

use App\Events\OrderCompleted;
use App\Mail\ConfirmationMail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendConfirmationMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCompleted  $event
     * @return void
     */
    public function handle(OrderCompleted $event)
    {
        $user = User::find($event->order->user_id);

        Mail::to($user->email)->send(new ConfirmationMail($event->order));
    }
}