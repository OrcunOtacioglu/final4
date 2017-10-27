@extends('frontend.base')

@section('title', 'Final Four Packages')

@section('content')
    <div id="root">
        @include('frontend.partials.categories')
        <div class="app">
            <canvas id="venue"></canvas>
        </div>
        @include('frontend.partials.sidebar')
    </div>
@stop

@section('footer.scripts')
    <script src="https://unpkg.com/vue"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/fabric.min.js') }}"></script>
    <script src="{{ asset('js/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('js/seatbit/app.js') }}"></script>
@stop
