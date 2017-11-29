<?php

namespace App\Listeners;

use App\Entities\Seat;
use App\Events\BookingCreated;
use App\Events\ZoneUpdated;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockBookingSeats
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
     * @param  BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        $items = $event->booking->items;
        $updatedZones = [];

        foreach ($items as $item) {
            $seat = Seat::where('reference', '=', $item->reference)->first();

            if (!in_array($seat->zone_id, $updatedZones)) {
                array_push($updatedZones, $seat->zone_id);
            }

            $seat->status = 4;
            $seat->updated_at = Carbon::now();
            $seat->save();
        }

        event(new ZoneUpdated($updatedZones));
    }
}
