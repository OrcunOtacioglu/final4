<?php

namespace App\Entities;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'reference',
        'user_id',
        'status',
        'cost',
        'profit',
        'subtotal',
        'comission',
        'fee',
        'tax',
        'total',
        'currency_code',
        'booked_until'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(BookingItem::class);
    }

    public static function createNew($items)
    {
        $booking = new Booking();

        $booking->reference = str_random(6);
        $booking->status = 0;
        $booking->cost = 0;
        $booking->profit = 0;
        $booking->subtotal = 0;
        $booking->comission = 0;
        $booking->fee = 0;
        $booking->tax = 0;
        $booking->offer = 0;
        $booking->total = 0;
        $booking->currency_code = 978;

        $booking->booked_until = 7;

        $booking->created_at = Carbon::now();
        $booking->updated_at = Carbon::now();

        $booking->save();

        foreach ($items as $item) {
            $seat = Seat::where('reference', '=', $item['reference'])->first();

            $details = [
                'Info' => 'This ticket is a Weekend Pass which means you can participate in all four matches at Final Four Belgrade',
                'Row'  => $seat->row,
                'Zone' => $seat->zone->screen_name,
                'Number' => $seat->seat
            ];

            BookingItem::createNew($booking, 1, $seat, $details);
        }

        self::calculateTotal($booking);

        return $booking;
    }

    public static function updateEntity($reference, $items)
    {
        $booking = Booking::where('reference', '=', $reference)->first();

        foreach ($items as $item) {
            $seat = Seat::where('reference', '=', $item['reference'])->first();

            $details = [
                'Info' => 'This ticket is a Weekend Pass which means you can participate in all four matches at Final Four Belgrade',
                'Row'  => $seat->row,
                'Zone' => $seat->zone->screen_name,
                'Number' => $seat->seat
            ];

            BookingItem::createNew($booking, 1, $seat, $details);
        }

        self::calculateTotal($booking);

        return $booking;
    }

    public static function calculateTotal($booking)
    {
        $cost = 0;
        $ticketCount = 0;
        $totalProfitMargin = 0;
        $minimumProfitAmount = 0;

        foreach ($booking->items as $item) {

            // Calculate total cost
            $cost += $item->unit_price;

            if ($item->type === 1) {

                $ticketCount = $ticketCount + 1;
                $totalProfitMargin += $item->profit_margin;

                // Calculate EB comission for reporting purposes.
                $booking->comission = $booking->comission + $item->unit_price * 0.048;

                // Get the highest minimum_profit_amount
                $minimumProfitAmount = $item->minimum_profit_amount > $minimumProfitAmount
                    ? $item->minimum_profit_amount
                    : $minimumProfitAmount;
            }
        }

        // Calculate average profit margin based on only tickets
        $averageProfitMargin = $totalProfitMargin / $ticketCount;

        // Calculate subtotal (total cost * profit_margin)
        $subtotal = $cost * $averageProfitMargin;

        // Calculate profit (subtotal - cost)
        if ($subtotal != $booking->offer) {
            $profit = $booking->offer - $cost;
        } else {
            $profit = $subtotal - $cost;
        }

        $profitPerItem = $profit / $ticketCount;

        // Divide profit to ticket count to find whether we are making profit more than minimum profit amount
        // If we are not making more than minimum_profit_amount then calculate new subtotal (subtotal + ((minimum_profit_amount - profit per item) * ticket_count))
        if ($profitPerItem < $minimumProfitAmount) {
            $subtotal = $subtotal + (($minimumProfitAmount - $profitPerItem) * $ticketCount);
        }

        $booking->cost = $cost;
        $booking->profit = $profit;
        $booking->subtotal = $subtotal;
        $booking->fee = 0;
        $booking->tax = $subtotal * 0.18;
        $booking->total = $subtotal;
        $booking->updated_at = Carbon::now();
        $booking->save();
    }

    public static function hasHotel($booking)
    {
        $hotels = [];

        foreach ($booking->items as $item) {
            if ($item->type === 2) {
                array_push($hotels, $item);
            }
        }

        if (count($hotels)) {
            return true;
        } else {
            return false;
        }
    }

    public static function listTickets($booking)
    {
        $allItems = $booking->items;
        $tickets = $allItems->where('type', '=', 1);

        return $tickets->all();
    }

    public static function listHotels($booking)
    {
        $allItems = $booking->items;
        $hotels = $allItems->where('type', '=', 2);

        return $hotels;
    }

    public static function getTicketCount($booking)
    {
        $ticketCount = 0;

        foreach ($booking->items as $item) {
            if ($item->type === 1) {
                $ticketCount = $ticketCount +1;
            }
        }

        return $ticketCount;
    }

    public static function getHotelCount($booking)
    {
        $hotelCount = 0;

        foreach ($booking->items as $item) {
            if ($item->type === 2) {
                $hotelCount = $hotelCount + 1;
            }
        }

        return $hotelCount;
    }
}
