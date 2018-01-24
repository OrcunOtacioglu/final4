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

                    <!-- Map Drawing -->
                    <li class="site-menu-item">
                        <a href="{{ action('ZoneController@index') }}">
                            <i class="site-menu-icon ti-ruler-pencil" aria-hidden="true"></i>
                            <span class="site-menu-title">Draw Map</span>
                        </a>
                    </li>
                    <li class="site-menu-item has-sub open">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon ti-ticket" aria-hidden="true"></i>
                            <span class="site-menu-title">Box Office</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub" style="">
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('BoxOfficeController@index') }}">
                                    <span class="site-menu-title">Book Packages</span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('BookingController@index') }}">
                                    <span class="site-menu-title">Manage Bookings</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="site-menu-item has-sub open">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon ti-calendar" aria-hidden="true"></i>
                            <span class="site-menu-title">Event Management</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub" style="">
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('EventController@index') }}">
                                    <span class="site-menu-title">
                                        <i class="icon ti-calendar"></i> Event Management
                                    </span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('VenueController@index') }}">
                                    <span class="site-menu-title">
                                        <i class="icon ti-vector"></i> Venue Management
                                    </span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('SeatMapController@index') }}">
                                    <span class="site-menu-title">
                                        <i class="icon ti-vector"></i> SeatMap Management
                                    </span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('RateController@index') }}">
                                    <span class="site-menu-title">
                                        <i class="icon ti-money"></i> Rate Management
                                    </span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('HotelController@index') }}">
                                    <span class="site-menu-title">
                                        <i class="icon ti-home"></i> Hotel Management
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="site-menu-item has-sub open">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon ti-panel" aria-hidden="true"></i>
                            <span class="site-menu-title">Application Management</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub" style="">
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('RoleController@index') }}">
                                <span class="site-menu-title">
                                    <i class="icon ti-id-badge"></i> User Management
                                </span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('PageController@index') }}">
                                <span class="site-menu-title">
                                    <i class="icon ti-files"></i> Page Management
                                </span>
                                </a>
                            </li>
                            <li class="site-menu-item is-shown">
                                <a class="animsition-link" href="{{ action('SettingsController@index') }}">
                                <span class="site-menu-title">
                                    <i class="icon ti-settings"></i> Settings
                                </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ action('UserController@index') }}">
                            <i class="site-menu-icon ti-user" aria-hidden="true"></i>
                            <span class="site-menu-title">Customer Management</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon ti-receipt" aria-hidden="true"></i>
                            <span class="site-menu-title">Finance</span>
                        </a>
                    </li>
                    <li class="site-menu-item">
                        <a href="{{ action('AnalyticsController@index') }}">
                            <i class="site-menu-icon ti-pie-chart" aria-hidden="true"></i>
                            <span class="site-menu-title">Analytics</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="scrollable-bar scrollable-bar-vertical scrollable-bar-hide" draggable="false">
            <div class="scrollable-bar-handle"></div>
        </div>
    </div>
</div>

