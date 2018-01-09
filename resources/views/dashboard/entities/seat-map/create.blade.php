@extends('dashboard.base')

@section('title', 'Create SeatMap')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ action('SeatMapController@store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="venue_id">Venue</label>
                                    <select name="venue_id" id="venue_id" class="form-control">
                                        <option value="">Select Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">SeatMap Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="mapping">SeatMap Mapping</label>
                                <textarea name="mapping" id="mapping" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Create">
                        <a href="{{ action('SeatMapController@index') }}" class="text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop