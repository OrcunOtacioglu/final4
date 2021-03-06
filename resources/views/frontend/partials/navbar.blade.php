<nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo.png') }}" alt="Official Travel Agency" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainMenu">
        <span class="navbar-text d-lg-block d-md-block d-sm-none">
            <h2>2018 Final Four Belgrade</h2>
            <small>from Friday 18 May 2018 to Sunday 20 May 2018</small>
        </span>
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a href="{{ action('ApplicationController@dashboard') }}" class="nav-link">
                            <i class="wb-dashboard text-success"></i> Dashboard
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="wb-user-circle"></i> Profile
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="wb-unlock"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="wb-user-add"></i> Register
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>