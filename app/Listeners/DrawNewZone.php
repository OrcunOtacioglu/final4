<?php

namespace App\Listeners;

use App\Entities\Rate;
use App\Entities\Zone;
use App\Events\ZoneUpdated;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DrawNewZone
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
        foreach ($event->zones as $item) {
            $zoneObjects = [
                'objects' => []
            ];

            $additionalItems = [];
            $seats = [];

            $zone = Zone::find($item);
            $objects = json_decode($zone->objects, true);

            foreach ($objects['objects'] as $object) {
                if ($object['type'] !== 'seat') {
                    array_push($additionalItems, $object);
                }
            }

            foreach ($zone->seats as $seat) {

                if ($seat->rate == null) {
                    $categoryID = 0;
                    $category = '';
                    $colorCode = '76838F';
                } else {
                    $categoryID = $seat->rate->id;
                    $category = $seat->rate->name;
                    $colorCode = $seat->rate->color_code;
                }

                array_push($seats, [
                    'type'  => 'seat',
                    'left'  => intval($seat->left),
                    'top'   => intval($seat->top),
                    'number' => intval($seat->seat),
                    'row'   => $seat->row,
                    'status' => strval($seat->status),
                    'zone'  => $zone->name,
                    'reference' => $seat->reference,
                    'categoryColor' => $colorCode,
                    'category' => $category,
                    'categoryID' => $categoryID
                ]);
            }

            foreach ($seats as $newSeat) {
                array_push($zoneObjects['objects'], $newSeat);
            }
            foreach ($additionalItems as $additionalItem) {
                array_push($zoneObjects['objects'], $additionalItem);
            }

            $newObjects = json_encode($zoneObjects, true);

            $zone->previous_objects = $zone->objects;
            $zone->objects = $newObjects;

            $zone->updated_at = Carbon::now();

            $zone->save();
        }
    }
}