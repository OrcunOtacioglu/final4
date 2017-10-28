<nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo.png') }}" alt="Official Travel Agency" width="100px;">
    </a>

    <div class="navbar-text">
        <h2>2018 Final Four Belgrade</h2>
        <small>from Friday 18 May 2018 to Sunday 20 May 2018</small>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
    </div>

    <div class="navbar-right">
        <ul class="navbar-nav mr-auto">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a href="{{ action('ApplicationController@dashboard') }}" class="nav-link">
                            <i class="wb-dashboard text-success"></i>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="wb-user-circle"></i>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="wb-shopping-cart"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>