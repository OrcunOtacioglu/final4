@extends('dashboard.base')

@section('title')
    Edit {{ $hotel->name }}
@stop

@section('content')
    <form action="{{ action('HotelController@update', ['id' => $hotel->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-6">
                <!-- Name Form Input -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <!-- Stars Form Input -->
                <div class="form-group">
                    <label for="stars">Stars</label>
                    <input type="text" class="form-control" id="stars" name="stars" value="{{ $hotel->stars }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- Review_point Form Input -->
                <div class="form-group">
                    <label for="review_point">Review Point</label>
                    <input type="text" class="form-control" id="review_point" name="review_point" value="{{ $hotel->review_point }}">
                </div>
            </div>
            <div class="col-md-4">
                <!-- Review_count Form Input -->
                <div class="form-group">
                    <label for="review_count">Review Count</label>
                    <input type="text" class="form-control" id="review_count" name="review_count" value="{{ $hotel->review_count }}">
                </div>
            </div>
            <div class="col-md-4">
                <!-- Location Form Input -->
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $hotel->location }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $hotel->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="facilities">Facilities</label>
                    <textarea name="facilities" id="facilities" cols="30" rows="10" class="form-control">{{ $hotel->facilities }}</textarea>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-success" value="Update">
        <a href="{{ action('HotelController@index') }}" class="text-muted">Cancel</a>
    </form>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ action('HotelRoomController@store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                <div class="row">
                    <div class="col-md-6">
                        <!-- Room_name Form Input -->
                        <div class="form-group">
                            <label for="room_name">Name</label>
                            <input type="text" class="form-control" id="room_name" name="room_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Room_price Form Input -->
                        <div class="form-group">
                            <label for="room_price">Price</label>
                            <input type="text" class="form-control" id="room_price" name="room_price">
                            <small class="form-text text-muted">(Per night without city tax)</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Comission Form Input -->
                        <div class="form-group">
                            <label for="comission">Comission</label>
                            <input type="text" class="form-control" id="comission" name="comission">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Fee Form Input -->
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="text" class="form-control" id="fee" name="fee">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Tax_percentage Form Input -->
                        <div class="form-group">
                            <label for="tax_percentage">Tax Percentage</label>
                            <input type="text" class="form-control" id="tax_percentage" name="tax_percentage">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Room Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="0">Single Room</option>
                                <option value="1">Double Room</option>
                                <option value="2">Triple Room</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Availability Form Input -->
                <div class="form-group">
                    <label for="availability">Availability</label>
                    <input type="text" class="form-control" id="availability" name="availability">
                </div>

                <div class="form-group">
                    <label for="misc">Miscellanous</label>
                    <textarea name="misc" id="misc" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <input type="submit" class="btn btn-secondary" value="Add Room">
            </form>
        </div>
        <div class="col-md-6">
            @if($hotel->rooms->count() == 0)
                <div class="alert alert-info" role="alert">
                    There are no rooms to show!
                </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Availability</th>
                        <th scope="col" class="text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hotel->rooms as $room)
                        <tr>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->price }}</td>
                            <td>{{ $room->availability }}</td>
                            <td class="text-nowrap">
                                <a href="{{ action('HotelRoomController@edit', ['id' => $room->id]) }}" class="text-muted">Edit</a>
                                <a href="#" class="text-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop