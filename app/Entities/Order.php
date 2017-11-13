<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'user_id',
        'status',
        'cost',
        'subtotal',
        'comission',
        'fee',
        'tax',
        'total',
        'currency_code',
    ];

    /**
     * Returns associated OrderItem entities
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }

    /**
     * Creates a new Order entity.
     *
     * @param $items
     * @return Order
     */
    public static function createNew($items)
    {

        // Creates a new Order with default values
        // to be changed after adding OrderItem instances.
        $order = new Order();
        $order->reference = str_random(6);
        $order->status = 0;
        $order->cost = 0;
        $order->profit = 0;
        $order->subtotal = 0;
        $order->comission = 0;
        $order->fee = 0;
        $order->tax = 0;
        $order->total = 0;
        $order->currency_code = 978;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->save();

        // Adds Items to Order
        foreach ($items as $seat) {
            $seat = Seat::where('reference', '=', $seat['reference'])->first();

            $details = [
                'Info' => 'This ticket is a Weekend Pass which means you can participate in all four matches at Final Four Belgrade',
                'Row'  => $seat->row,
                'Zone' => $seat->zone->screen_name,
                'Number' => $seat->seat
            ];

            OrderItem::createNew($order, 1, $seat, $details);
        }

        // Calculate Order financials
        self::calculateTotal($order);

        return $order;
    }

    /**
     * Updates an existing Order entity.
     *
     * @param $reference
     * @param $items
     * @return mixed
     */
    public static function updateOrder($reference, $items)
    {
        $order = Order::where('reference', '=', $reference)->first();

        foreach ($items as $seat) {
            $seat = Seat::where('reference', '=', $seat['reference'])->first();

            $details = [
                'Info' => 'This ticket is a Weekend Pass which means you can participate in all four matches at Final Four Belgrade',
                'Row'  => $seat->row,
                'Zone' => $seat->zone,
                'Number' => $seat->number
            ];

            OrderItem::createNew($order, 1, $seat, $details);
        }

        self::calculateTotal($order);

        return $order;
    }

    /**
     * Calculates financial parts of the Order entity.
     *
     * @param $order
     */
    public static function calculateTotal($order)
    {
        $cost = 0;
        $ticketCount = 0;
        $totalProfitMargin = 0;
        $minimumProfitAmount = 0;

        foreach ($order->items as $item) {

            // Calculate total cost
            $cost += $item->unit_price;

            if ($item->type === 1) {

                $ticketCount = $ticketCount + 1;
                $totalProfitMargin += $item->profit_margin;

                // Calculate EB comission for reporting purposes.
                $order->comission = $order->comission + $item->unit_price * 0.048;

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
        $profit = $subtotal - $cost;
        $profitPerItem = $profit / $ticketCount;

        // Divide profit to ticket count to find whether we are making profit more than minimum profit amount
        // If we are not making more than minimum_profit_amount then calculate new subtotal (subtotal + ((minimum_profit_amount - profit per item) * ticket_count))
        if ($profitPerItem < $minimumProfitAmount) {
            $subtotal = $subtotal + (($minimumProfitAmount - $profitPerItem) * $ticketCount);
        }

        $order->cost = $cost;
        $order->profit = $profit;
        $order->subtotal = $subtotal;
        $order->fee = $subtotal * 0.02;
        $order->tax = $subtotal * 0.18;
        $order->total = $subtotal + $order->fee;
        $order->updated_at = Carbon::now();
        $order->save();
    }

    /**
     * Check whether an Order has Hotel or not.
     *
     * @param $order
     * @return bool
     */
    public static function hasHotel($order)
    {
        $hotels = [];

        foreach ($order->items as $item) {
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

    /**
     * Appends Order to a User.
     *
     * @param $order
     * @param $user
     */
    public static function appendUser($order, $user)
    {
        $order->user_id = $user->id;
        $order->updated_at = Carbon::now();
        $order->save();
    }

    /**
     * Prepares the Order for payment based on Payment Processor needs.
     *
     * @param $order
     * @param $settings
     * @return array
     */
    public static function prepareOrder($order, $settings)
    {
        $clientId = $settings->client_id;      //Banka tarafindan magazaya verilen isyeri numarasi
        $amount = $order->total;             //tutar
        $oid = $order->reference;                    //Siparis numarasi
        $okUrl = env('APP_URL') . '/order-complete';      //Islem basariliysa dönülecek isyeri sayfasi  (3D isleminin ve ödeme isleminin sonucu)
        $failUrl = env('APP_URL') . '/order-complete';    //Islem basarisizsa dönülecek isyeri sayfasi  (3D isleminin ve ödeme isleminin sonucu)
        $rnd = microtime();                                     //Tarih ve zaman gibi sürekli degisen bir deger güvenlik amaçli kullaniliyor

        $taksit = "";    					//Taksit sayisi
        $islemtipi="Auth";					//Islem tipi
        $storekey = $settings->storekey;					//Isyeri anahtari

        $hashstr = $clientId . $oid . $amount . $okUrl . $failUrl . $islemtipi . $taksit . $rnd . $storekey; //güvenlik amaçli hashli deger

        $hash = base64_encode(pack('H*',sha1($hashstr)));

        return [
            'clientid' => $clientId,
            'amount' => $amount,
            'oid' => $oid,
            'okUrl' => $okUrl,
            'failUrl' => $failUrl,
            'rnd' => $rnd,
            'taksit' => $taksit,
            'islemtipi' => $islemtipi,
            'storekey' => $storekey,
            'hash' => $hash
        ];
    }

    /**
     * Hashing Algorithm for Asseco
     *
     * @param $paymentData
     * @param $settings
     * @return string
     */
    public static function prepareHash($paymentData, $settings)
    {
        $storekey = $settings->storekey;
        $hashstr = $paymentData['clientid'] . $paymentData['oid'] . $paymentData['amount'] . $paymentData['okUrl'] . $paymentData['failUrl'] . $paymentData['islemtipi'] . "" . $paymentData['rnd'] . $storekey;

        return base64_encode(pack('H*',sha1($hashstr)));
    }

    public static function getTicketCount($order)
    {
        $ticketCount = 0;

        foreach ($order->items as $item) {
            if ($item->type === 1) {
                $ticketCount = $ticketCount +1;
            }
        }

        return $ticketCount;
    }

    public static function getHotelCount($order)
    {
        $hotelCount = 0;

        foreach ($order->items as $item) {
            if ($item->type === 2) {
                $hotelCount = $hotelCount + 1;
            }
        }

        return $hotelCount;
    }

    public static function listTickets($order)
    {
        $allItems = $order->items;
        $tickets = $allItems->where('type', '=', 1);

        return $tickets->all();
    }

    public static function listHotels($order)
    {
        $allItems = $order->items;
        $hotels = $allItems->where('type', '=', 2);

        return $hotels->all();
    }
}
