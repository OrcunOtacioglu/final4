@extends('dashboard.base')

@section('title', 'Dashboard')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/custom/dashboard.css') }}">
@stop

@section('page-header')
    <a href="{{ action('EventController@create') }}" class="btn btn-outline btn-success" data-toggle="tooltip" data-original-title="Create New Event" data-container="body">
        <i class="icon wb-plus" aria-hidden="true"></i>
        <span class="hidden-sm-down">Create New Event</span>
    </a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-block p-30 bg-red-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-money" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number"></span>
                        <span class="counter-number-related text-capitalize">gross sales</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-block p-30 bg-green-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-money" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number"></span>
                        <span class="counter-number-related text-capitalize">Net Income</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-block p-30 bg-blue-600">
                <div class="card-watermark darker font-size-80 m-15"><i class="icon ti-receipt" aria-hidden="true"></i></div>
                <div class="counter counter-md counter-inverse text-left">
                    <div class="counter-number-group">
                        <span class="counter-number"></span>
                        <span class="counter-number-related text-capitalize">orders</span>
                    </div>
                    <div class="counter-label text-capitalize">from  customers</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if($events->count() == 0)
                <div class="alert alert-info" role="alert">
                    <p>There are no events to show! Start creating <a href="{{ action('EventController@create') }}">here</a></p>
                </div>
            @else
                @include('dashboard.entities.event.partials.list')
            @endif
        </div>
    </div>
@stop