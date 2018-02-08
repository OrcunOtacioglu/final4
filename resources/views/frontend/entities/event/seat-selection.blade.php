@extends('frontend.base')

@section('custom.meta')
    <meta name="event" content="{{ $event->id }}">
    <meta name="zone" content="{{ \Illuminate\Support\Facades\Cookie::get('zone') }}">
@stop

@section('title')
    {{ $event->name }} Seat Selection
@stop

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('frontend/css/hoteldetail.css') }}">
    <style>
        #logo_home h1 a {
            margin-top: 8px;
        }
        body {
            background: #eee !important;
        }
        .photo-cat ul li a {
            padding: 3px 10px;
            border: none;
            background: transparent;
            color: #fff;
        }
        .parallax-window {
            height: 270px;
            background: transparent;
            position: relative;
            overflow: hidden;
            min-height: 270px;
        }
        .hotel-top-image {
            width: 110%;
            margin: -50% -15px;
        }
        .close-map-btn > div {
            border-radius: 0 0 30px 30px;
            padding: 6px 35px;
            background: #16b7cd;
            display:inline-block;
        }
        #map {
            width: 100%;
            height: 400px;
            background-color: grey;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@stop

@section('content')
    <div class="hoteldetaildatalayer">
        @include('frontend.entities.event.partials.header-area')

        @include('frontend.partials.breadcrumb')

        <!-- Content -->
        <div class="container mt20 mb50" style="border-radius: 5px;">
            <div class="row">
                <div class="col-md-8 back-white">
                    <div class="venue-wrapper">
                        <canvas id="venue"></canvas>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="col-md-4">
                    <!-- Rates of the Event -->
                    <div class="back-white p15">
                        <h3>Package Categories</h3>
                        <img src="{{ $event->seatMap->category_map_photo }}" alt="" class="img-responsive">
                        <div class="rate-list">
                            <div class="rate p10 mb10" style="border-left: 3px solid #e7983b">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="rate-name">Hospitality Package</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="#" class="btn btn-xs btn-primary">Request Info</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-muted m0" style="font-size: 12px">Starting from 1.150€</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <small class="color-green">Available</small>
                                    </div>
                                </div>
                            </div>
                            @foreach($rates as $rate)
                                <div class="rate p10 mb10" style="border-left: 3px solid #{{ $rate->color_code }}">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="rate-name">{{ $rate->name }}</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a class="btn btn-xs btn-primary" role="button" data-toggle="collapse" href="#{{ $rate->color_code }}" aria-expanded="false" aria-controls="{{ $rate->name }}List">
                                                    Zone List
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-muted m0" style="font-size: 12px">Starting from {{ \Acikgise\Helpers\Helpers::formatMoney($rate->price/100) }}</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <small class="color-green">Available</small>
                                            </div>
                                        </div>
                                        <div class="collapse" id="{{ $rate->color_code }}">
                                            @foreach(\App\Entities\Rate::listZones($rate->zones) as $zone)
                                                <div class="well back-white p5">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <img src="/img/zone-images/thumbnails/{{ $zone }}.png" alt="">
                                                        </div>
                                                        <div class="col-md-4 text-center pt20">
                                                            @if($zone == 2161)
                                                                <p class="text-muted" style="font-size: 16px;">216-A</p>
                                                            @elseif($zone == 2162)
                                                                <p class="text-muted" style="font-size: 16px;">216-B</p>
                                                            @else
                                                                <p class="text-muted" style="font-size: 16px;">{{ $zone }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-4 text-center pt20">
                                                            <button onclick="getSeatsOf({{ $zone }})" class="btn btn-xs btn-primary">Select Seats</button>
                                                            <small class="color-green">Available</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Rates of the Event -->
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('frontend/js/fabric.min.js') }}"></script>
    <script src="{{ asset('frontend/js/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('frontend/js/seatbit/zone.class.js') }}"></script>
    <script src="{{ asset('frontend/js/seatbit/tripoki.js') }}"></script>
@stop