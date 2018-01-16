@extends('frontend.base')

@section('title', 'Final Four 2018 Belgrade')

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
                                    <div class="single-price color-green font-bold font-50 fr ng-binding">588</div>
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
        <div class="container mt20 mb50" style="background: #fff;
                                                border-radius: 5px;">
            <div class="row">
                <div class="col-md-8" id="single_tour_desc">
                    <canvas id="venue"></canvas>
                    <div class="clear"></div>
                </div>

                <div class="col-md-4">
                    @include('frontend.partials.categories')
                    <!-- @TODO Here will be the category selection for desktop and laptop views -->
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
@stop

@section('footer.scripts')
    <script src="{{ asset('js/frontend/fabric.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{ asset('js/frontend/plugins/axios.min.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/zone.class.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/seat.class.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/app.js') }}"></script>
    <script src="{{ asset('js/frontend/seatbit/tripoki.js') }}"></script>
@stop