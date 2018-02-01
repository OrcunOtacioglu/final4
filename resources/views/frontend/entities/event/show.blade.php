@extends('frontend.base')

@section('title')
    {{ $event->name }}
@stop

@section('custom.meta')
    <meta name="event" content="{{ $event->id }}">
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
            <img alt="Image" class="img-blur sp-image hotel-top-image" src="{{ $event->cover_photo }}">
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
                <div class="col-md-8">
                    <div class="back-white p15">
                        <h3>Package Information</h3>
                        <p>{{ $event->description }}</p>
                    </div>
                    <div class="clear"></div>
                    <hr>
                    <div class="back-white p15">
                        <h3>Event Location</h3>
                        <div id="map"></div>
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
                                @if(\App\Entities\Rate::hasMultipleZones($rate))
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
                                                        <button onclick="setSeatSelectionCookie({{ $zone }})" class="btn btn-xs btn-primary">Select Seats</button>
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
                                                <button onclick="setSeatSelectionCookie({{ $rate->zones }})" class="btn btn-xs btn-primary">Select Seats</button>
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
                                    </div>
                                @endif
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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdpMB_vp0CXlEy49kSEO42duzmTXbTMQw&callback=initMap">
    </script>
    <script>
        function initMap() {
            var kombankArena = {
                info: '<strong>Kombank Arena</strong>',
                lat: 44.814146,
                lng: 20.421289
            };
            var holidayInn = {
                info: '<strong>Holiday Inn Belgrade</strong>',
                lat: 44.809755,
                lng: 20.414288,
            };
            var falkensteiner = {
                info: '<strong>Falkensteiner Hotel</strong>',
                lat: 44.823648,
                lng: 20.41622,
            };
            var hotelPrag = {
                info: '<strong>Hotel Prag</strong>',
                lat: 44.810905,
                lng: 20.459725
            };
            var lifeDesign = {
                info: '<strong>Life Design Hotel</strong>',
                lat: 44.811295,
                lng: 20.46033
            };
            var radissonBlu = {
                info: 'strong>Radisson Blu Old Mill</strong>',
                lat: 44.797564,
                lng: 20.447181
            };
            var locations = [
                [kombankArena.info, kombankArena.lat, kombankArena.lng, 0],
                [holidayInn.info, holidayInn.lat, holidayInn.lng, 1],
                [falkensteiner.info, falkensteiner.lat, falkensteiner.lng, 2],
                [hotelPrag.info, hotelPrag.lat, hotelPrag.lng, 3],
                [lifeDesign.info, lifeDesign.lat, lifeDesign.lng, 4],
                [radissonBlu.info, radissonBlu.lat, radissonBlu.lng, 5]
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: {lat: 44.814146, lng: 20.421289},
            });

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                var infoWindow = new google.maps.InfoWindow({});

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/frontend/plugins/axios.min.js') }}"></script>
    <script>
        function setSeatSelectionCookie(zone) {
            var eventID = $('meta[name="event"]').attr('content');
            axios.post('/set-zone', {
                eventId: eventID,
                zone: zone
            })
                .then(response => {
                    if (response.status === 200) {
                        toastr.success('You will be redirected to seat selection!', {timeout: 2000});
                        window.setTimeout(function () {
                            location.href = ('/event/' + response.data.event + '/seat-selection');
                        }, 500);
                    }
                })
                .catch(error => {
                    toastr.error(error, 'Ooops!Something went wrong!');
                })
        }
    </script>
@stop