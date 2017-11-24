@extends('dashboard.base')

@section('title')
    Edit Booking {{ $booking->reference }}
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to edit your booking.</p>
    <p class="mb-0">Assign User, Add Hotel or Delay Booking expiration.</p>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Booking Details</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('BookingController@update', ['reference' => $booking->reference]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id">Assign User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option value="">Select User</option>
                                        @foreach(\App\User::all() as $user)
                                            <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->surname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="booked_until">Book For</label>
                                    <select name="booked_until" id="booked_until" class="form-control">
                                        <option value="">Select Days</option>
                                        @for($i = 1; $i <= 14; $i++)
                                            <option value="{{ $i }}">{{ $i }} Days</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Booking Items</h3>
                </div>
                <div class="panel-body">
                    <!-- @TODO ADD HERE BOOKING ITEM DETAIL LIKE IN ORDER DETAIL -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- @TODO ADD HERE THE HOTELS TO BE ABLE TO ADDED TO BOOKING -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Hotel to Package</h3>
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
@stop