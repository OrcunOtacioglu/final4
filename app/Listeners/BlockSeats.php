<?php

namespace App\Listeners;

use App\Entities\Seat;
use App\Events\OrderCreated;
use App\Events\ZoneUpdated;
use App\Jobs\CheckOrderStatus;
use App\Jobs\SetSeatsFree;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlockSeats
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

            if (!in_array($seat->zone_id, $updatedZones)) {
                array_push($updatedZones, $seat->zone_id);
            }

            $seat->status = 5;
            $seat->updated_at = Carbon::now();
            $seat->save();
        }

        event(new ZoneUpdated($updatedZones));

        CheckOrderStatus::dispatch($event->order)
            ->delay(Carbon::now()->addMinutes(20));
    }
}