<?php

namespace App\Listeners;

use App\Entities\Sale;
use App\Events\OrderCompleted;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MakeSale
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
        $event->order->status = 4;
        $event->order->updated_at = Carbon::now();

        $event->order->save();

        Sale::createNewFromOrder($event->order);
    }
}