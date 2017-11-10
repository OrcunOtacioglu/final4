<?php

namespace App\Http\Controllers;

use App\Entities\Hotel;
use App\Entities\Order;
use App\Entities\Seat;
use App\Entities\Settings;
use App\Events\OrderCompleted;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notAvailableSeats = [];

        // Check if the seats are available
        foreach ($request->items as $seat) {
            if (!Seat::checkIfAvailable($seat)) {
                array_push($notAvailableSeats, $seat);
            };
        }

        if (count($notAvailableSeats)) {
            return response()->json([
                'status' => 0,
                'message' => 'Selected seats are not available!',
                'seats' => $notAvailableSeats,
                'reference' => null,
            ]);
        } else {
            if ($request->hasCookie('orderRef')) {
                $order = Order::updateOrder($request->cookie('orderRef'), $request->items);
            } else {
                // If available create a new order
                $order = Order::createNew($request->items);
            }

            // Fire an event to draw the new seating map
            // Change Seat statuses
            event(new OrderCreated($order));

            return response()->json([
                'status' => 1,
                'message' => 'Success!',
                'seats' => null,
                'reference' => $order->reference,
            ])->cookie('orderRef', $order->reference, 20);
        }
    }

    /**
     * Display the specified Order with Hotels.
     *
     * @param $reference
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($reference)
    {
        $order = Order::where('reference', '=', $reference)->first();
        $hotels = Hotel::where('available_online', '=', true)->get();

        if (Order::getTicketCount($order) == Order::getHotelCount($order)) {

            return redirect()->action('OrderController@completeOrder', ['reference' => $order->reference]);

        }

        return view('frontend.entities.hotel.index', compact('hotels', 'order'));

    }

    public function completeOrder($reference)
    {
        $order = Order::where('reference', '=', $reference)->first();
        $settings = Settings::where('profile_name', '=', 'finansbank')->first();

        if (!Order::hasHotel($order)) {
            return redirect()->action('OrderController@show', ['reference' => $reference]);
        }

        $order->status = 1;
        $order->save();

        if (Auth::guest()) {

            return view('frontend.entities.order.index', compact('order'));

        } else {

            $user = Auth::user();
            Order::appendUser($order, $user);
            $paymentData = Order::prepareOrder($order, $settings);

            return view('frontend.entities.order.show', compact('order', 'paymentData', 'settings'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update Order
     *
     * @param Request $request
     * @param $reference
     */
    public function update(Request $request, $reference)
    {
        $order = Order::where('reference', '=', $reference)->first();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validatePayment(Request $request)
    {
        $hashParams = $request->HASHPARAMS;
        $hashParamsVal = $request->HASHPARAMSVAL;
        $hashParam = $request->HASH;

        $storekey = "123456";
        $paramsval = "";
        $index1=0;
        $index2=0;

        while($index1 < strlen($hashParams))
        {
            $index2 = strpos($hashParams,":",$index1);
            $vl = $_POST[substr($hashParams,$index1,$index2- $index1)];
            if($vl == null)
                $vl = "";
            $paramsval = $paramsval . $vl;
            $index1 = $index2 + 1;
        }
        $storekey = "123456";
        $hashval = $paramsval.$storekey;

        $hash = base64_encode(pack('H*',sha1($hashval)));

        if ($paramsval != $hashParamsVal || $hashParam != $hash) {
            $error = 'Güvenlik Uyarisi. Sayisal Imza Geçerli Degil';

            return view('frontend.entities.order.fail', compact('error'));
        }

        $mdStatus = $_POST["mdStatus"];
        $error = $_POST["ErrMsg"];

        if ($mdStatus == 1 || $mdStatus == 2 || $mdStatus == 3 || $mdStatus == 4) {
            $response = $_POST["Response"];

            if ($response == "Approved")
            {
                $order = Order::where('reference', '=', $request->oid)->first();
                event(new OrderCompleted($order));

                return view('frontend.entities.order.success', compact('order'));
            }
            else
            {
                echo "Ödeme Islemi Basarisiz. Hata = " . $error;

                return view('frontend.entities.order.fail', compact('error'));
            }

        } else {
            $error = '3D İşlemi Başarısız!';

            return view('frontend.entities.order.fail', compact('error'));
        }
    }
}
