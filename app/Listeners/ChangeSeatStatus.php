<?php

namespace App\Listeners;

use App\Entities\Seat;
use App\Events\OrderCreated;
use App\Events\ZoneUpdated;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeSeatStatus
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
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $items = $event->order->items;
        $updatedZones = [];

        foreach ($items as $item) {
            $seat = Seat::where('reference', '=', $item->reference)->first();

            $seat->status = 5;
            $seat->updated_at = Carbon::now();

            $seat->save();

            if (!in_array($seat->zone_id, $updatedZones)) {
                array_push($updatedZones, $seat->zone_id);
            } else {
                return;
            }
        }

        foreach ($updatedZones as $zone) {
            event(new ZoneUpdated($zone));
        }
    }
}
