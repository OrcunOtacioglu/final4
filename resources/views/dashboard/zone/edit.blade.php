@extends('dashboard.base')

@section('custom.meta')
    <meta name="zone" content="{{ $zone->id }}">
@stop

@section('title')
    Draw & Edit {{ ucfirst($zone->name) }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-9" id="canvasZone">
            <canvas id="{{ $zone->id }}"></canvas>
        </div>
        <div class="col-md-3">
            <form action="{{ action('ZoneController@addSeats', ['id' => $zone->id]) }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="direction">Direction</label>
                    <select name="direction" id="direction" class="form-control">
                        <option value="0">Left to Right</option>
                        <option value="1">Right to Left</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="left">Left Start Point</label>
                    <input type="text" name="left" id="left" class="form-control">
                </div>

                <div class="form-group">
                    <label for="top">Top Start Point</label>
                    <input type="text" name="top" id="top" class="form-control">
                </div>

                <div class="form-group">
                    <label for="row">Row</label>
                    <input type="text" name="row" id="row" class="form-control">
                </div>

                <div class="form-group">
                    <label for="start_number">Starting Seat Number</label>
                    <input type="text" name="start_number" id="start_number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="seat_count">Number of Seats to Add</label>
                    <input type="text" name="seat_count" id="seat_count" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rate_id">Rate</label>
                    <select name="rate_id" id="rate_id" class="form-control">
                        <option value="0">None</option>
                        @foreach($rates as $rate)
                            <option value="{{ $rate->id }}">{{ $rate->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Seat Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Not Available</option>
                        <option value="1">Available</option>
                        <option value="2">Online Available</option>
                        <option value="3">Box Office Available</option>
                        <option value="4">Booked</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-secondary" value="Add Seats">
            </form>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/fabric.min.js') }}"></script>
    <script src="{{ asset('js/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('js/seatbit/seat-generator.js') }}"></script>
@stop