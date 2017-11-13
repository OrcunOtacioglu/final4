<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-custom sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="icon ti-dashboard"></i> Dashboard
            </a>
        </li>
        @if(\App\User::hasRole('root'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/zone') ? 'active' : '' }}" href="{{ action('ZoneController@index') }}">
                    <i class="icon ti-ruler-pencil"></i> Draw Map
                </a>
            </li>
        @endif
        @if(\App\User::hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/rate') ? 'active' : '' }}" href="{{ action('RateController@index') }}">
                    <i class="icon ti-money"></i> Rates
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/hotel') ? 'active' : '' }}" href="{{ action('HotelController@index') }}">
                    <i class="icon ti-home"></i> Hotels
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/page') ? 'active' : '' }}" href="{{ action('PageController@index') }}">
                    <i class="icon ti-files"></i> Pages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user') ? 'active' : '' }}" href="{{ action('UserController@index') }}">
                    <i class="icon ti-user"></i> Customers
                </a>
            </li>
        @endif
        @if(\App\User::hasRole('finance'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/finance') ? 'active' : '' }}" href="#">
                    <i class="icon ti-receipt"></i> Finance
                </a>
            </li>
        @endif
        @if(\App\User::hasRole('marketer'))
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/analytic') ? 'active' : '' }}" href="#">
                    <i class="icon ti-pie-chart"></i> Analytics
                </a>
            </li>
        @endif
    </ul>
</nav>
