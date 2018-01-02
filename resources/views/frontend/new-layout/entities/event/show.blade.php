@extends('frontend.new-layout.base')

@section('title', 'Final Four 2018 Belgrade')

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
@stop

@section('content')
    <div class="hoteldetaildatalayer" id="hoteldetail">
        <!-- Header Area -->
        <section class="parallax-window" data-parallax="scroll" style="height: 350px; min-height: 350px;">
            <div class="widget-overlay transtation"></div>
            <img alt="Image" class="img-blur sp-image hotel-top-image" src="/img/authentication-bg-1.jpg">
            <div class="parallax-content-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h1>Turkish Airlines Final Four 2018 Belgrade</h1>
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
                                    <div class="single-price color-green font-bold font-50 fr ng-binding">579</div>
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
                                    <a href="/e">Events</a>
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
        <div class="container mt20 mb50">
            <div class="row">
                <div class="col-md-8" id="single_tour_desc">
                    <div class="back-white pt15 mt10">
                        <div id="description">
                            <div class="col-md-4">
                                <h3 class="mt0">Description</h3>
                            </div>
                            <div class="col-md-8">
                                <p>Located in the new business district of Barcelona's metropolitan area, it is well connected to the El Prat airport and the city centre. It is also conveniently close to the second largest trade park in Europe - Fira2 and is the perfect choice for conference and business travellers. There is an underground stations just 200 metres away and from there the journey to the city centre takes less than 15...</p>
                                <div id="areadetails">
                                    <h4>Area Detail</h4>
                                    <ul class="list_ok">
                                        <li class="col-md-6 col-sm-6" style="float:left;">Barcelona, Barcelona Harbour 6 kms away</li>
                                        <li class="col-md-6 col-sm-6" style="float:left;">Barcelona, El Prat Airport 5 kms away</li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr/>

                        <div id="location">
                            <div class="col-md-4">
                                <h3 class="mt0">Location</h3>
                            </div>
                            <div class="col-md-8">
                                <p>Located in the new business district of Barcelona's metropolitan area, it is well connected to the El Prat airport and the city centre. It is also conveniently close to the second largest trade park in Europe - Fira2 and is the perfect choice for conference and business travellers. There is an underground stations just 200 metres away and from there the journey to the city centre takes less than 15...</p>
                                <div id="areadetails">
                                    <h4>Area Detail</h4>
                                    <ul class="list_ok">
                                        <li class="col-md-6 col-sm-6" style="float:left;">Barcelona, Barcelona Harbour 6 kms away</li>
                                        <li class="col-md-6 col-sm-6" style="float:left;">Barcelona, El Prat Airport 5 kms away</li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <hr/>
                    </div>

                    <div class="clear"></div>
                </div>

                <div class="col-md-4">
                    <!-- Arena Image -->
                    <div class="pt10">
                        <img src="/img/kombank.jpg" alt="" class="img-responsive">
                    </div>
                    <!-- End Arena Image -->
                    <a class="btn_1 blue block mt10">Select Seats</a>
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
@stop