@extends('dashboard.base')

@section('custom.meta')
    <meta name="zone" content="{{ $zone->id }}">
@stop

@section('title')
    Draw & Edit {{ ucfirst($zone->name) }}
@stop

@section('content')
    <div class="col-md-9" id="canvasZone">
        <canvas id="{{ $zone->id }}"></canvas>
    </div>
    <div class="col-md-3">
        <div class="panel">
            <div class="panel-body">
                @include('dashboard.entities.zone.partials.add-seats')
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/fabric.min.js') }}"></script>
    <script src="{{ asset('js/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('js/seatbit/seat-generator.js') }}"></script>
@stop