<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Order;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $user = Auth::user();

        if ($user->hasPermissionTo('view-dashboard')) {
            return '/dashboard';
        } elseif (request()->hasCookie('orderRef')) {
            $order = Order::where('reference', '=', request()->cookie('orderRef'))->first();

            // If added Hotel to package, redirect to Complete-Order
            if ($order->status === 2) {
                return '/complete-order/' . $order->reference;
            } else {
                return '/order/' . $order->reference;
            }
        } else {
            return url(request()->headers->get('referer'));
        }
    }
}
