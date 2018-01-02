@extends('dashboard.base')

@section('title', 'Event Configuration')

@section('header.right')
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ action('RateController@index') }}">Manage Rates</a>
            <a class="dropdown-item" href="#">Manage Hotels</a>
            <a class="dropdown-item" href="{{ action('ZoneController@index') }}">Draw Map</a>
        </div>
    </div>
@stop

@section('content')

@stop