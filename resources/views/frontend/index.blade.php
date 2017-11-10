@extends('frontend.base')

@section('custom.meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('title', 'Final Four Packages')

@section('content')
    <div id="root">
        <div class="container-fluid">
            <div class="row" id="wrapper">
                <div class="col-3 p0">
                    @include('frontend.partials.categories')
                </div>
                <div class="col-6 p0">
                    <div class="app">
                        <canvas id="venue"></canvas>
                    </div>
                </div>
                <div class="col-3 p0">
                    @include('frontend.partials.sidebar')
                </div>
            </div>
        </div>
    </div>
@stop

@section('custom.html')
    @include('frontend.partials.footer')
@stop

@section('footer.scripts')
    {{--<script src="https://unpkg.com/vue"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.runtime.min.js"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/fabric.min.js') }}"></script>
    <script src="{{ asset('js/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('js/seatbit/zone.class.js') }}"></script>
    <script src="{{ asset('js/seatbit/app.js') }}"></script>
@stop
