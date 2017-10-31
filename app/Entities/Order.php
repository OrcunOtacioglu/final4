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
                'info' => 'This ticket is a Weekend Pass which means you can participate in all four matches at Final Four Belgrade'
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
                'info' => 'This ticket is a Weekend Pass which means you can participate in all four matches at Final Four Belgrade'
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
        $subtotal = 0;

        foreach ($order->items as $item) {
            $subtotal = $subtotal + $item->subtotal;

            // Only calculate ticket comissions for Euroleague
            if ($item->type === 1) {
                $order->comission = $order->comission + $subtotal * 0.05;
            }
        }

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
}
