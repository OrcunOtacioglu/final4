@extends('frontend.base')

@section('title', 'Final Four Packages')

@section('content')
    @include('frontend.partials.categories')
    <div class="app">
        <canvas id="venue"></canvas>
    </div>
    @include('frontend.partials.sidebar')
@stop

@section('footer.scripts')
    <script src="{{ asset('js/fabric.min.js') }}"></script>
    <script src="{{ asset('js/seatbit/app.js') }}"></script>
@stop
