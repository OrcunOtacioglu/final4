<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Hotel extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'hotels';

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'name',
        'total_availability',
        'online_availability',
        'box_office_availability',
        'available_online',
        'available_box_office',
        'media_path',
        'stars',
        'review_point',
        'review_count',
        'location',
        'description',
        'facilities'
    ];

    /**
     * Returns the list of associated HotelRooms
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany(HotelRoom::class);
    }

    /**
     * Creates a new Hotel instance
     *
     * @param Request $request
     * @return Hotel
     */
    public static function createNew(Request $request)
    {
        $hotel = new Hotel();

        $hotel->reference = str_random(6);
        $hotel->name = $request->name;

        //@TODO IMPLEMENT ONLINE AVAILABILITY AND WHETHER AVAILABLE CONTROL ON HOTEL LIST PAGE
        $hotel->total_availability = $request->total_availability;
        $hotel->online_availability = $request->online_availability;
        $hotel->box_office_availability = $request->box_office_availability;

        $hotel->available_online = $request->available_online;
        $hotel->available_box_office = $request->available_box_office;

        $hotel->media_path = strtolower(str_replace(' ', '_', $request->name));

        $hotel->stars = $request->stars;
        $hotel->review_point = $request->review_point;
        $hotel->review_count = $request->review_count;

        $hotel->location = $request->location;
        $hotel->description = $request->description;
        $hotel->facilities = $request->facilities;

        $hotel->created_at = Carbon::now();
        $hotel->updated_at = Carbon::now();

        $hotel->save();

        return $hotel;
    }

    /**
     * Updates an existing Hotel entity.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public static function updateEntity(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->name = $request->name;

        $hotel->total_availability = $request->total_availability;
        $hotel->online_availability = $request->online_availability;
        $hotel->box_office_availability = $request->box_office_availability;

        $hotel->available_online = $request->available_online;
        $hotel->available_box_office = $request->available_box_office;

        $hotel->stars = $request->stars;
        $hotel->review_point = $request->review_point;
        $hotel->review_count = $request->review_count;

        $hotel->location = $request->location;
        $hotel->description = $request->description;
        $hotel->facilities = $request->facilities;

        $hotel->updated_at = Carbon::now();

        $hotel->save();

        return $hotel;
    }

    public static function calculateRoomAvailability($hotel, $order)
    {
        $hotelAvailability = $hotel->online_availability;
        $ticketCount = Order::getTicketCount($order);

        if ($ticketCount > $hotelAvailability) {
            return $hotelAvailability;
        } else {
            return $ticketCount;
        }
    }
}
