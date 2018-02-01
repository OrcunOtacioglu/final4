<!-- Navigation Area -->
<div class="container relative">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
            <div id="logo_home">
                <a href="/" title="Detur, search click and travel"></a>
            </div>
        </div>

        <!-- @TODO REMOVE REQUESTS TO TRIPOKI.COM DIRECTLY -->
        <!-- Navbar -->
        <nav class="col-md-9 col-sm-9 col-xs-9">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);">
                <span>Menu mobile</span>
            </a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="{{ asset('frontend/img/tripoki-logo-black.png') }}" width="120" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in">
                    <i class="icon_set_1_icon-77"></i>
                </a>
                <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
                    <li>
                        <a href="#">EVENTS</a>
                    </li>
                    <li>
                        <a href="#">HOTELS</a>
                    </li>
                    <li>
                        <a href="#">FLIGHTS</a>
                    </li>
                    <li>
                        <a href="#">CARS</a>
                    </li>
                    <li>
                        <a href="#">TRANSFERS</a>
                    </li>
                    <li>
                        <a href="#">TOURS</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Search Bar & Cart -->
        <ul id="top_tools">
            <!-- Search Bar -->
            <li>
                <div class="dropdown dropdown-search">
                    <a href="#" class="search-overlay-menu-btn" data-toggle="dropdown">
                        <i class="pe-7s-search font-26"></i>
                    </a>
                </div>
                <div class="search-overlay-menu">
                    <form role="search" id="searchform" method="get">
                        <input type="search" id="txtsearch" autofocus name="txtsearch" placeholder="Search..."/>

                        <div class="quicksearch m15" style="display:none;margin:15px;">
                            <i class="font-30 loading-icon icon-spin6 animate-spin" style=" z-index: 1;"></i>
                        </div>

                        <button type="submit" class="fl">
                            <i class="icon_set_1_icon-78"></i>
                        </button>
                        <span class="search-overlay-close fr">
                            <i class="icon_set_1_icon-77"></i>
                        </span>
                    </form>
                    <div class="result-search dn"></div>
                </div>
            </li>
            <!-- End Search Bar -->

            <!-- Shopping Cart -->
            <li>
                <div class="dropdown dropdown-cart">
                    <a id="basketicon" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="cartloading" style="display:none;">
                            <i class="font-50 loading-icon icon-spin6 animate-spin" style="position: absolute; z-index: 1;"></i>
                        </div>
                        <i class="pe-7s-cart font-26"></i>
                        <span class="cart-length">1</span>
                    </a>
                    <ul class="dropdown-menu" id="cart_items">
                        <li class="relative cart-items">
                            <div id="loading-1" style="display:none;">
                                <i class="font-50 loading-icon icon-spin6 animate-spin" style="position: absolute; z-index: 1;margin-left: 330px; "></i>
                            </div>
                            <div class="cart-wrapper w100 p0">
                                <div class="image">
                                    <img src="/" alt="image">
                                </div>
                                <div class="font-12 mb5 text-dot color-black pr30">Turkish Airlines Euroleague</div>
                                {{--<span class="font-bold font-14 color-black">157 €</span>--}}
                            </div>
                            <a class="action remove-basket" style="cursor:pointer;">
                                <i class="icon-trash"></i>
                            </a>
                        </li>
                        <li class="">
                            <div class="col-sm-6 p8 font-bold font-14" style="padding-left:0 !important; padding-right:0 !important;">
                                Total:
                                {{--<span>157 €</span>--}}
                            </div>
                            <a href="/hotel" class="button_drop outline">PROCEED</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- End Shopping Cart -->
        </ul>
        <!-- End Search Bar & Cart -->
    </div>
</div>
<!-- End Navigation Area -->