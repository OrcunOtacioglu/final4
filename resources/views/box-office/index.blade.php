@extends('box-office.base')

@section('custom.meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('title', 'Box Office')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/dashboard/custom/box-office.css') }}">
@stop

@section('page-description')
    <p class="mb-0">This panel allows you to manage the all your events and sales.</p>
    <p class="mb-0">View, edit and delete pretty much everything.</p>
@stop

@section('page-header')
    <button class="btn btn-info" data-target="#package" data-toggle="modal" type="button">
        <i class="icon ti-package"></i> Package
    </button>
@stop

@section('content')
    <div class="col-md-12">
        <div id="box-office-wrapper">
            <canvas id="box-office"></canvas>
        </div>
    </div>
@stop

@section('custom.html')
    @include('box-office.partials.cart')
@stop

@section('footer.scripts')
    <script src="https://unpkg.com/vue"></script>
    <script src="{{ asset('js/frontend/plugins/axios.min.js') }}"></script>
    <script src="{{ asset('js/frontend/fabric.min.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/seat.box-office.class.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/box-office.js') }}"></script>
@stop