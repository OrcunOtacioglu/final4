@extends('dashboard.base')

@section('title', 'Edit SeatMap')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <form action="{{ action('SeatMapController@update', ['id' => $seatmap->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="venue_id">Venue</label>
                                    <select name="venue_id" id="venue_id" class="form-control">
                                        <option value="">Select Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}" {{ $venue->id == $seatmap->venue_id ? 'selected' : '' }}>{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="mapping" id="mapping" cols="30" rows="10" class="form-control">{{ $seatmap->mapping }}</textarea>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update">
                        <a href="{{ action('SeatMapController@index') }}" class="text-muted">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop