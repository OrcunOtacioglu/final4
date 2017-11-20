@extends('dashboard.base')

@section('title')
    Edit {{ $hotel->name }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
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
                                <!-- Total_availability Form Input -->
                                <div class="form-group">
                                    <label for="total_availability">Total Availability</label>
                                    <input type="text" class="form-control" id="total_availability" name="total_availability" value="{{ $hotel->total_availability }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Online_availability Form Input -->
                                <div class="form-group">
                                    <label for="online_availability">Online Availability</label>
                                    <input type="text" class="form-control" id="online_availability" name="online_availability" value="{{ $hotel->online_availability }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Box_office_availability Form Input -->
                                <div class="form-group">
                                    <label for="box_office_availability">Box Office Availability</label>
                                    <input type="text" class="form-control" id="box_office_availability" name="box_office_availability" value="{{ $hotel->box_office_availability }}">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="available_online">Available Online?</label>
                                    <select name="available_online" id="available_online" class="form-control">
                                        <option value="0" {{ $hotel->available_online == false ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $hotel->available_online == true ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="available_box_office">Available Box Office?</label>
                                    <select name="available_box_office" id="available_box_office" class="form-control">
                                        <option value="0" {{ $hotel->available_box_office == false ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $hotel->available_box_office == true ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $hotel->latitude }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $hotel->longitude }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $hotel->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facilities">Facilities</label>
                                    <textarea name="facilities" id="facilities" cols="30" rows="5" class="form-control">{{ $hotel->facilities }}</textarea>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
                        <a href="{{ action('HotelController@index') }}" class="text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    @include('dashboard.entities.hotel.room.create')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    @include('dashboard.entities.hotel.room.index')
                </div>
            </div>
        </div>
    </div>
@stop