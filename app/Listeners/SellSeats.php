<?php

namespace App\Listeners;

use App\Entities\Seat;
use App\Events\OrderCompleted;
use App\Events\ZoneUpdated;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellSeats
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
        $updatedZones = [];

        foreach ($event->order->items as $item) {
            if ($item->type == 1) {
                $seat = Seat::where('reference', '=', $item->reference)->first();
                $seat->status = 6;

                $seat->updated_at = Carbon::now();
                $seat->save();

                if (!in_array($seat->zone_id, $updatedZones)) {
                    array_push($updatedZones, $seat->zone_id);
                }
            }
        }

        event(new ZoneUpdated($updatedZones));
    }
}