<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    protected $table = 'booking_items';

    protected $fillable = [
        'booking_id',
        'type',
        'name',
        'reference',
        'profit_margin',
        'minimum_profit_amount',
        'unit_price',
        'subtotal'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public static function createNew($booking, $type, $entity, $details = null, $qty = 1)
    {
        $item = new BookingItem();

        $item->booking_id = $booking->id;

        $item->type = $type;

        $item->name = $entity->category;
        $item->reference = $entity->reference;

        $item->details = json_encode($details, true);

        $item->profit_margin = $entity->rate != null ? $entity->rate->profit_margin : null;
        $item->minimum_profit_amount = $entity->rate != null ? $entity->rate->minimum_profit_amount : null;

        $item->quantity = $qty;
        $item->unit_price = $entity->cost;

        $item->subtotal = $item->quantity * $item->unit_price;

        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();
    }
}
