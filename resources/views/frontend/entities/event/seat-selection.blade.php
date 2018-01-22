@extends('frontend.base')

@section('custom.meta')
    <meta name="event" content="{{ $event->id }}">
@stop

@section('title')
    {{ $event->name }} Seat Selection
@stop

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('WebUI/css/hoteldetail.css') }}">
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
    <link rel="stylesheet" href="{{ asset('css/general/custom.css') }}">
@stop

@section('content')
    <div class="hoteldetaildatalayer">
        <!-- Header Area -->
        <section class="parallax-window" data-parallax="scroll" style="height: 350px; min-height: 350px;">
            <div class="widget-overlay transtation"></div>
            <img alt="Image" class="img-blur sp-image hotel-top-image" src="/img/cover-photos/{{ $event->cover_photo }}">
            <div class="parallax-content-2">
                <div class="container" id="wrapper">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h1>{{ $event->name }}</h1>
                            <div class="clear"></div>
                            <div class="hotel-category">
                                <span class="t-uppercase color-white">Weekend Pass</span>
                            </div>
                        </div>
                        <div class="fr top-price-area mt15 pr15">
                            <div id="price_single_main" class="hotel p0 mt3">
                                <div>
                                    <div class="color-white font-500 fl">
                                        <div class="color-white font-600 font-20 t-right">EUR</div>
                                        <div class="color-white font-400 font-12 t-right">Starting From</div>
                                    </div>
                                    <div class="single-price color-green font-bold font-50 fr ng-binding">527</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Header Area -->
        <!-- Breadcrumb -->
        <div id="position" class="breadcrumbs container-fuild">
            <div class="container clearfix">
                <section>
                    <div class="breadcrumbs-full">
                        <div id="nav">
                            <ul id="navlist" class="sf-menu clearfix breand-back col-sm-6 t-uppercase font-10">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <div class="fl breadline"></div>
                                <li>
                                    <a href="/">Events</a>
                                </li>
                                <div class="fl breadline"></div>
                                <li>
                                    <a href="" class="ng-binding">Sports</a>
                                </li>
                                <div class="fl breadline"></div>
                                <li>
                                    <a href="">Basketball</a>
                                </li>

                                <div class="fl breadline"></div>
                                <li class="color-aqua">Euroleague Final Four</li>
                            </ul>
                            <div class="t-uppercase fr hotel-address color-white col-sm-6 t-right p0">
                                <i class="icon-location-2 p0 font-10 mt0 mr5"></i>Address: Bulevar Arsenija Čarnojevica 58, Beograd, Serbia
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End Breadcrumb -->
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
                    <div class="back-white p15">
                        <h3>Selected Zone View</h3>
                        <div id="zone-view" class="mb30"></div>
                        <div class="rate-list">
                            <div class="rate p10 mb10" style="border-left: 3px solid #e7983b">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="rate-name">Hospitality Package</p>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <a href="#" class="btn btn-xs btn-primary">More Info</a>
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
                                @if(\App\Entities\Rate::hasMultipleZones($rate))
                                    <div class="rate p10 mb10" style="border-left: 3px solid #{{ $rate->color_code }}">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="rate-name">{{ $rate->name }}</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <a class="btn btn-xs btn-primary" role="button" data-toggle="collapse" href="#{{ $rate->color_code }}" aria-expanded="false" aria-controls="{{ $rate->name }}List">
                                                    Buy Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-muted m0" style="font-size: 12px">Starting from {{ $rate->price }}€</p>
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
                                                            <button onclick="getSeatsOf({{ $zone }})" class="btn btn-xs btn-primary">Buy Now</button>
                                                            <small class="color-green">Available</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="rate p10 mb10" style="border-left: 3px solid #{{ $rate->color_code }}">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="rate-name">{{ $rate->name }}</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <button onclick="getSeatsOf({{ $rate->zones }})" class="btn btn-xs btn-primary">Buy Now</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p class="text-muted m0" style="font-size: 12px">Starting from {{ $rate->price }}€</p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <small class="color-green">Available</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/frontend/fabric.min.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/zone.class.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/tripoki.js') }}"></script>
    <script>
        axios.get('/zone/data/' + {{ \Illuminate\Support\Facades\Cookie::get('zone') }})
            .then(function (response) {
                drawSeats(response.data.objects);
                appendZoneView({{ \Illuminate\Support\Facades\Cookie::get('zone') }});
            })
            .catch(function (error) {
                console.log(error);
            });
    </script>
@stop