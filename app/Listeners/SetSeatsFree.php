<?php

namespace App\Listeners;

use App\Events\SeatsFree;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetSeatsFree
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
     * @param  SeatsFree  $event
     * @return void
     */
    public function handle(SeatsFree $event)
    {
        //
    }
}