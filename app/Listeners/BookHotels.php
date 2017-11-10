<?php

namespace App\Listeners;

use App\Entities\HotelRoom;
use App\Events\OrderCompleted;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookHotels
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
        foreach ($event->order->items as $item) {
            if ($item->type == 2) {
                $room = HotelRoom::where('reference', '=', $item->reference)->first();

                $room->hotel->total_availability -= 1;
                $room->hotel->online_availability -= 1;

                $room->hotel->updated_at = Carbon::now();
                $room->hotel->save();
            }
        }
    }
}