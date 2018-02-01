@extends('frontend.hotel')

@section('title', 'Choose your hotel')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('WebUI/css/hotels.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/plugins/fotorama/fotorama.css') }}">
@stop

@section('content')
    <div class="container-fuild summary-table p15">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 relative pl60 capsul">
                    <i class="icon_set_1_icon-41"></i>
                    <span>Destination</span>
                    <h3 class="ng-binding">Belgrade, Serbia</h3>
                </div>
                <div class="col-sm-3 relative pl60 capsul">
                    <i class="icon_set_1_icon-53"></i>
                    <span>Check in</span>
                    <h3 class="ng-binding">18/05/2018</h3>
                </div>
                <div class="col-sm-3 relative pl60 capsul">
                    <i class="icon_set_1_icon-53"></i>
                    <span>Check out</span>
                    <h3 class="ng-binding">21/05/2018</h3>
                </div>
                <div class="col-sm-2">
                    <a href="" class="modify-search-btn t-center" style="width:100%;display:inline-block;margin-top:2px;">3 NIGHTS</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt20">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <h3>Please choose your hotel</h3>
                @foreach($hotels as $hotel)
                    <div class="strip_all_tour_list">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="img_list back-black">
                                    <a href="#" data-toggle="modal" data-target="#{{ $hotel->reference }}G">
                                        <img src="/img/hotel-images/{{ $hotel->media_path }}/1.jpg" alt="">
                                        <i class="icon-camera-6"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="tour_list_desc">
                                    <h3 class="text-dot">
                                        <strong>{{ $hotel->name }}</strong>
                                    </h3>
                                    <div class="rating">
                                        <img src="{{ asset('WebUI/images/stars/4.png') }}" alt="">
                                    </div>
                                    <p class="hotel-list-info">{{ substr($hotel->description, 0, 180) }}...</p>
                                    <a href data-toggle="modal" data-target="#{{ $hotel->reference }}M" class="show-map w100 p0 relative font-600">
                                        <i class="icon-location-2 font-14 fl color-blue p0"></i>
                                        Show Hotel On Map
                                    </a>
                                    <div class="mt15">
                                        <a href="#" class="otherprice color-black capitalize">More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 pr0">
                                <div class="price_list">
                                    <div class="p0">
                                        <ul>
                                            <li class="room-price pl10 pr10">
                                                <h6 class="board font-11 text-dot">{{ $hotel->location }}</h6>

                                                <small>Based on {{ $hotel->review_count }} reviews<span class="font-10 color-gray"><br></span></small>
                                                <h4> {{ $hotel->review_point }}<span class="font-16 color-black">/10</span></h4>
                                            </li>
                                            <li class="price-btn">
                                                <button type="button" data-toggle="collapse" data-target="#{{ $hotel->reference }}R" aria-expanded="false"
                                                        aria-controls="{{ $hotel->reference }}Rooms" style="min-width: 145px;" class="btn_1 green radius-50">ROOM OPTIONS</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @include('frontend.entities.hotel.partials.rooms')
                            </div>
                        </div>
                    </div>
                    @include('frontend.entities.hotel.partials.gallery')
                    @include('frontend.entities.hotel.partials.maps')
                @endforeach
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
    <script src="{{ asset('js/frontend/plugins/maps.js') }}"></script>
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
    <script src="{{ asset('js/frontend/plugins/fotorama.js') }}"></script>
@stop
