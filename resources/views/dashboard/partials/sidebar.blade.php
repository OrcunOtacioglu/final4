<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="icon wb-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/event') ? 'active' : '' }}" href="{{ action('EventController@index') }}">
                <i class="icon wb-calendar"></i> Events
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/analytic') ? 'active' : '' }}" href="#">
                <i class="icon-bar wb-stats-bars"></i> Analytics
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/finance') ? 'active' : '' }}" href="#">
                <i class="icon-bar wb-payment"></i> Finance
            </a>
        </li>
    </ul>
</nav>
