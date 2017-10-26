@extends('dashboard.base')

@section('title', 'Create Hotel')

@section('content')
    <form action="{{ action('HotelController@store') }}" method="POST">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-6">
                <!-- Name Form Input -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <!-- Stars Form Input -->
                <div class="form-group">
                    <label for="stars">Stars</label>
                    <input type="text" class="form-control" id="stars" name="stars">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <!-- Review_point Form Input -->
                <div class="form-group">
                    <label for="review_point">Review Point</label>
                    <input type="text" class="form-control" id="review_point" name="review_point">
                </div>
            </div>
            <div class="col-md-4">
                <!-- Review_count Form Input -->
                <div class="form-group">
                    <label for="review_count">Review Count</label>
                    <input type="text" class="form-control" id="review_count" name="review_count">
                </div>
            </div>
            <div class="col-md-4">
                <!-- Location Form Input -->
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="facilities">Facilities</label>
                    <textarea name="facilities" id="facilities" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-success" value="Create">
        <a href="{{ action('HotelController@index') }}" class="text-muted">Cancel</a>
    </form>
@stop