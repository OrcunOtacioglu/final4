@extends('dashboard.base')

@section('title')
    Edit Booking {{ $booking->reference }}
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to edit your booking.</p>
    <p class="mb-0">Assign User, Add Hotel or Delay Booking expiration.</p>
@stop

@section('page-header')
    <button class="btn btn-secondary" data-target="#userCreation" data-toggle="modal" type="button">
        <i class="icon ti-user"></i> Create User
    </button>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Booking Details</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('BookingController@update', ['reference' => $booking->reference]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user_id">Assign User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Select User</option>
                                        @foreach(\App\User::all() as $user)
                                            <option value="{{ $user->id }}" {{ $booking->user_id === $user->id ? 'selected': '' }}>{{ $user->name . ' ' . $user->surname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="booked_until">Book For</label>
                                    <select name="booked_until" id="booked_until" class="form-control">
                                        <option value="">Select Days</option>
                                        @for($i = 1; $i <= 14; $i++)
                                            <option value="{{ $i }}" {{ $booking->booked_until == $i ? 'selected': '' }}>{{ $i }} Days</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="offer">Offer</label>
                                    <input type="text" name="offer" id="offer" class="form-control" value="{{ $booking->offer }}">
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Assing Booking" class="btn btn-success">
                    </form>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Booking Items</h3>
                </div>
                <div class="panel-body">
                    <div id="order-detail">
                        <table class="table text-left">
                            <thead class="detur-thead">
                            <tr>
                                <th colspan="3">Item</th>
                                <th class="text-center">Qty</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style="background: #fbfbfb;">
                                <td colspan="3">
                                    <i class="icon ti-ticket"></i> Final Four Weekend Pass
                                </td>
                                <td class="bt-none text-center">{{ \App\Entities\Booking::getTicketCount($booking) }}</td>
                            </tr>
                            @foreach(\App\Entities\Booking::listTickets($booking) as $ticket)
                                <tr>
                                    <td colspan="4" class="bt-none">
                                        <p class="mb-0">{{ $ticket->name }}</p>
                                        <small>Section: {{ \App\Entities\BookingItem::listDetailOf($ticket, 'Zone') }} Row: {{ \App\Entities\BookingItem::listDetailOf($ticket, 'Row') }} Seat: {{ \App\Entities\BookingItem::listDetailOf($ticket, 'Number') }}</small>
                                        <hr class="mb-0">
                                    </td>
                                </tr>
                            @endforeach
                            @if(\App\Entities\Booking::hasHotel($booking))
                                <tr style="background: #fbfbfb;">
                                    <td colspan="3">
                                        <i class="icon ti-home"></i> Hotel Accommodations
                                    </td>
                                    <td class="bt-none text-center">{{ \App\Entities\Booking::getHotelCount($booking) }}</td>
                                </tr>
                                @foreach(\App\Entities\Booking::listHotels($booking) as $hotel)
                                    <tr>
                                        <td colspan="4" class="bt-none">
                                            <p class="mb-0">{{ $hotel->name }}</p>
                                            <small>{{ \App\Entities\BookingItem::listDetailOf($hotel, 'Use') }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot class="detur-details">
                            <tr>
                                <td colspan="3">Subtotal</td>
                                <td class="text-center">{{ $booking->subtotal }}€</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="bt-none">Service Fees</td>
                                <td class="bt-none text-center">{{ $booking->fee }}€</td>
                            </tr>
                            <tr class="detur-summary">
                                <td colspan="3">TOTAL</td>
                                <td class="text-center">{{ $booking->total }}€</td>
                            </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Hotel to Package</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('BookingController@addHotel', ['reference' => $booking->reference]) }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="hotel_id">Hotel</label>
                            <select name="hotel_id" id="hotel_id" class="form-control">
                                <option value="">Select Hotel</option>
                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->name }} ({{ $hotel->total_availability }})</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="usage">Room Type</label>
                            <select name="usage" id="usage" class="form-control">
                                <option value="">Select Usage</option>
                                <option value="0">Single Use</option>
                                <option value="1">Double Use</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="roomCount">Quantity</label>
                            <select name="roomCount" id="roomCount" class="form-control">
                                @for($i = 0; $i <= 25; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <input type="submit" class="btn btn-block btn-primary" value="Add Hotel">
                    </form>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Convert to Sale</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('BookingController@convertBooking', ['reference' => $booking->reference]) }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="payment_type">Payment Type</label>
                            <select name="payment_type" id="payment_type" class="form-control">
                                <option value="">Select Payment Type</option>
                                <option value="cash">Cash</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="mail_order">Mail Order</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="payment_channel">Payment Channel</label>
                            <select name="payment_channel" id="payment_channel" class="form-control">
                                <option value="">Select Payment Channel</option>
                                <option value="offline">Offline</option>
                                <option value="online">Online</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-block btn-secondary" value="Convert Booking">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    <div class="modal fade show" id="userCreation" aria-labelledby="userCreationLabel" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple modal-center">
            <form class="modal-content" action="{{ action('UserController@store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="userCreationLabel">Create User</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <!-- Name Form Input -->
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="col-md-6 form-group">
                            <!-- Surname Form Input -->
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_admin">Is Admin?</label>
                                <select name="is_admin" id="is_admin" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">No Role</option>
                                    @foreach(\App\Entities\Authorization\Role::all() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Phone Form Input -->
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Citizenship Form Input -->
                            <div class="form-group">
                                <label for="citizenship">Citizenship</label>
                                <select name="citizenship" id="citizenship" class="form-control">
                                    <option value="TR">Turkish</option>
                                    <option value="NonTR">Non-Turkish</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Identifier Form Input -->
                            <div class="form-group">
                                <label for="identifier">Identifier</label>
                                <input type="text" class="form-control" id="identifier" name="identifier">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Address Form Input -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Zip_code Form Input -->
                            <div class="form-group">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Province Form Input -->
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" id="province" name="province">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Country Form Input -->
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Email Form Input -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Password Form Input -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success" value="Create">
                    <a href="{{ action('UserController@index') }}" class="text-muted">Cancel</a>

                </div>
            </form>
        </div>
    </div>
@stop