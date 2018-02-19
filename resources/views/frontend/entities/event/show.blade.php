@extends('frontend.base')

@section('title')
    {{ $event->name }}
@stop

@section('custom.meta')
    <meta name="event" content="{{ $event->id }}">
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
                    @include('frontend.entities.event.partials.rate-list')
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
            var image = '/frontend/img/marker-map.png';
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: image
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
    <script src="{{ asset('frontend/js/plugins/axios.min.js') }}"></script>
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