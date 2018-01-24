<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|regex:/[0-9]/|min:10|max:25',
            'citizenship' => 'required|string',
            'identifier' => 'required|min:8|max:25',
            'address' => 'required',
            'zip_code' => 'required',
            'province' => 'required',
            'country' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'is_admin' => 0,
            'role_id' => null,
            'phone' => $data['phone'],
            'citizenship' => $data['citizenship'],
            'identifier' => $data['identifier'],
            'address' => $data['address'],
            'zip_code' => $data['zip_code'],
            'province' => $data['province'],
            'country' => $data['country'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectTo()
    {
        if (request()->hasCookie('orderRef')) {
            $order = Order::where('reference', '=', request()->cookie('orderRef'))->first();

            if ($order->status === 2) {
                return '/complete-order/' . $order->reference;
            } else {
                return '/order/' . $order->reference;
            }
        } else if (Auth::user()->hasPermissionTo('view-dashboard')) {
            return '/dashboard';
        } else {
            return url(request()->headers->get('referer'));
        }
    }
}
