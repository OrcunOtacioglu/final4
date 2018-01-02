@extends('frontend.base')

@section('title', 'Special Events and Tours')

@section('custom.css')
    <link rel="stylesheet" href="{{ asset('css/general/custom.css') }}">
@stop

@section('content')
    <!-- Hero Image -->
    <div class="container-fuild clearfix relative">
        <div class="main-page">
            <section>
                <article>
                    <div class="text-wrapper w100 t-center">
                        <h2 class="text-shadow font-Kalam">ENJOY YOUR LIFE</h2>
                        <h3 class="text-shadow">SEARCH, CLICK &amp; LÖ POMPA</h3></div>
                    <div class="overlay-back"></div>
                </article>
            </section>
            <div class="clearfix"></div>
            <div class="scroller">
                <div class="mouse">
                    <div class="wheel"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Image -->

    <!-- Page Content -->
    <div class="container blockcontainer clearfix mt30">
        <div class="row">
            <div class="clear"></div>
            <div class="container-fuild custome-page-wrap">

                <!-- Popular Events -->
                <section>
                    <article>
                        <div class="puzzle-content animated col-md-12 p0" style="margin-top:50px;margin-bottom:0;">
                            <h2 class="t-center mb0">
                                Popular&nbsp;
                                <span style="color:orange">
                                    <strong>EVENTS</strong>
                                </span>
                            </h2>
                            <h3 class="t-center mt10 font-16">Start planning your event now!</h3>

                            <div class="col-sm-6 col-lg-6">
                                <div class="content-box widget-general relative t-center">
                                    <div class="widget-overlay transtation"></div>
                                    <img src="/img/authentication-bg-1.jpg" class="w100 p0">
                                    <div class="text-container t-center">
                                        <a href="#">
                                            <h2 class="header text-shadow transtation">
                                                <strong> </strong>Turkish Airlines Euroleague Final Four 2018 Belgrade&nbsp;
                                            </h2>
                                        </a>
                                        <div class="group-btn w100 p0">
                                            <div class="seperator mt0 mb30" style="border-bottom: 1px solid rgba(255,255,255,0.4);"></div>
                                            <ul>
                                                <li class="">
                                                    <a href="#" class="transtation flight"></a>
                                                    <p class="m0 font-11">Buy Tickets</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="content-box widget-general relative t-center">
                                    <div class="widget-overlay transtation"></div>
                                    <img src="/img/champions-league.jpg" class="w100 p0">
                                    <div class="text-container t-center">
                                        <a href="#">
                                            <h2 class="header text-shadow transtation">
                                                <strong> </strong>UEFA Champions League Final&nbsp;
                                            </h2>
                                        </a>
                                        <div class="group-btn w100 p0">
                                            <div class="seperator mt0 mb30" style="border-bottom: 1px solid rgba(255,255,255,0.4);"></div>
                                            <ul>
                                                <li class="">
                                                    <a href="#" class="transtation flight"></a>
                                                    <p class="m0 font-11">Buy Tickets</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <!-- End Popular Events -->
                <section>
                    <article>
                        <div class="clear"></div>
                        <hr style="margin-bottom:30px;margin-top:50px;">
                    </article>
                </section>
                <!-- Why Us -->
                <section>
                    <article>
                        <style>
                            .widget-general-icon i:before{font-size:60px !important;}
                        </style>
                        <div class="w100 t-center mt30 mb30">
                            <h2 class="">Why Choose&nbsp;<span style="color:orange"><strong>TRIPOKI?</strong></span>
                            </h2>
                        </div>

                        <div class="col-sm-4">
                            <div class="panel basic-content-icon t-center widget-general-icon" style="">
                                <div class="panel-body widget-color-Green">
                                    <div class="text-container mt20">
                                        <i class="color-orange OK"></i>
                                        <h2 class="t-center font-20 mt15 mb10 font-600">Countless travel choices</h2>
                                        <p class="m0">tripoki.com promises a flawless journey with countless choices in flights, hotels, transfers, tours and car rental categories.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="panel basic-content-icon t-center widget-general-icon" style="">
                                <div class="panel-body widget-color-Green">
                                    <div class="text-container mt20">
                                        <i class="color-orange Deals"></i>
                                        <h2 class="t-center font-20 mt15 mb10 font-600">Cheapest deals</h2>
                                        <p class="m0">Find cheap travel deals to every destination in the world and save money on hotels to airline tickets and more.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="panel basic-content-icon t-center widget-general-icon" style="">
                                <div class="panel-body widget-color-Green">
                                    <div class="text-container mt20">
                                        <i class="color-orange Setting"></i>
                                        <h2 class="t-center font-20 mt15 mb10 font-600">Fast and Easy</h2>
                                        <p class="m0">With just a few steps, you can book your travel online quickly and easily. tripoki.com helps you save time and money!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <!-- End Why Us -->
            </div>
        </div>
    </div>
    <!-- End Page Content -->
@stop