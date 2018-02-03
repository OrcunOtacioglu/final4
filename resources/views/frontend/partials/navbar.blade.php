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

            <cart ref="cart"></cart>
        </ul>
        <!-- End Search Bar & Cart -->
    </div>
</div>
<!-- End Navigation Area -->