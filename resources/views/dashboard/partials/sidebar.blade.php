<div class="site-menubar">
    <div class="site-menubar-body scrollable scrollable-inverse scrollable-vertical hoverscorll-disabled">
        <div class="scrollable-container">
            <div class="scrollable-content">
                <ul class="site-menu" data-plugin="menu">

                    <li class="site-menu-item">
                        <a href="{{ url('/dashboard') }}">
                            <i class="site-menu-icon ti-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>

                    @if(\App\User::hasRole('root'))
                    <!-- Map Drawing -->
                    <li class="site-menu-item">
                        <a href="{{ action('ZoneController@index') }}">
                            <i class="site-menu-icon ti-ruler-pencil" aria-hidden="true"></i>
                            <span class="site-menu-title">Draw Map</span>
                        </a>
                    </li>
                    @endif
                    @if(\App\User::hasRole('admin'))
                    <!-- Rates -->
                    <li class="site-menu-item">
                        <a href="{{ action('RateController@index') }}">
                            <i class="site-menu-icon ti-money" aria-hidden="true"></i>
                            <span class="site-menu-title">Rates</span>
                        </a>
                    </li>

                    <!-- Reports -->
                    <li class="site-menu-item">
                        <a href="{{ action('HotelController@index') }}">
                            <i class="site-menu-icon ti-home" aria-hidden="true"></i>
                            <span class="site-menu-title">Hotels</span>
                        </a>
                    </li>

                    <!-- Site Management -->
                    <li class="site-menu-item">
                        <a href="{{ action('PageController@index') }}">
                            <i class="site-menu-icon ti-files" aria-hidden="true"></i>
                            <span class="site-menu-title">Pages</span>
                        </a>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ action('UserController@index') }}">
                            <i class="site-menu-icon ti-user" aria-hidden="true"></i>
                            <span class="site-menu-title">Customers</span>
                        </a>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ action('BoxOfficeController@index') }}">
                            <i class="site-menu-icon ti-ticket" aria-hidden="true"></i>
                            <span class="site-menu-title">Box Office</span>
                        </a>
                    </li>
                    @endif
                    @if(\App\User::hasRole('finance'))
                    <li class="site-menu-item">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon ti-receipt" aria-hidden="true"></i>
                            <span class="site-menu-title">Finance</span>
                        </a>
                    </li>
                    @endif
                    @if(\App\User::hasRole('marketer'))
                    <li class="site-menu-item">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon ti-pie-chart" aria-hidden="true"></i>
                            <span class="site-menu-title">Analytics</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false">
            <div class="scrollable-bar-handle"></div>
        </div>
    </div>
</div>