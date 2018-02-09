@extends('frontend.hotel')

@section('title', 'Choose your hotel')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('frontend/css/hotels.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/fotorama/fotorama.css') }}">
@stop

@section('content')
    <div class="container-fuild summary-table p15">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 relative pl60 capsul">
                    <i class="icon_set_1_icon-41"></i>
                    <span>Destination</span>
                    <h3>Belgrade, Serbia</h3>
                </div>
                <div class="col-sm-2 relative pl60 capsul">
                    <i class="icon_set_1_icon-53"></i>
                    <span>Check in</span>
                    <h3>18/05/2018</h3>
                </div>
                <div class="col-sm-2 relative pl60 capsul">
                    <i class="icon_set_1_icon-53"></i>
                    <span>Check out</span>
                    <h3>21/05/2018</h3>
                </div>
                <div class="col-sm-2">
                    <span>Your stay</span>
                    <h3>3 Nights</h3>
                </div>
                <div class="col-sm-3">
                    <a href="" class="modify-search-btn t-center" style="width:100%;display:inline-block;margin-top:2px;">SHOW MAP</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt20">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <h3>Please choose your hotel</h3>
                <hotel-list></hotel-list>
                {{--@foreach($hotels as $hotel)--}}
                    {{--@include('frontend.entities.hotel.partials.gallery')--}}
                    {{--@include('frontend.entities.hotel.partials.maps')--}}
                {{--@endforeach--}}
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="alert alert-info mt50" role="alert">
                    <p>City TAX not included in the price</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('frontend/js/plugins/maps.js') }}"></script>
    <script>
        @foreach($hotels as $hotel)
            $('#{{ $hotel->reference }}M').on('shown.bs.modal', function () {
                initMap("{{ $hotel->latitude }}", "{{ $hotel->longitude }}", "{{ $hotel->reference }}");
            });
        @endforeach
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdpMB_vp0CXlEy49kSEO42duzmTXbTMQw">
    </script>
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
    <script src="{{ asset('frontend/js/plugins/fotorama.js') }}"></script>
@stop
