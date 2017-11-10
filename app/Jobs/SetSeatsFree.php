<?php

namespace App\Jobs;

use App\Entities\Seat;
use App\Events\ZoneUpdated;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SetSeatsFree implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $timeout = 120;

    public $items;

    /**
     * SetSeatsFree constructor.
     * @param $items
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $updatedZones = [];

        foreach ($this->items as $item) {
            if ($item->type == 1) {
                $seat = Seat::where('reference', '=', $item->reference)->first();

                if ($seat->status != 6) {
                    $seat->status = 1;

                    $seat->updated_at = Carbon::now();
                    $seat->save();

                    if (!in_array($seat->zone_id, $updatedZones)) {
                        array_push($updatedZones, $seat->zone_id);
                    }
                }
            }
        }

        event(new ZoneUpdated($updatedZones));
    }
}
