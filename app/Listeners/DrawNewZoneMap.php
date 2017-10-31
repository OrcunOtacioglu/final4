<?php

namespace App\Listeners;

use App\Events\ZoneUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DrawNewZoneMap
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
     * @param  ZoneUpdated  $event
     * @return void
     */
    public function handle(ZoneUpdated $event)
    {
        // @TODO DRAW NEW ZONE VIEW
    }
}
