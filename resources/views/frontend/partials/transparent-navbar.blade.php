<nav class="navbar navbar-expand-lg navbar-dark bg-dark transparent-navbar">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo.png') }}" alt="Official Travel Agency" width="100px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a href="{{ action('ApplicationController@dashboard') }}" class="nav-link">
                            <i class="icon ti-dashboard text-success"></i> Dashboard
                        </a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon ti-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="icon ti-lock"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
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
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="cart.displayCart = !cart.displayCart">
                    <span class="badge badge-pill badge-detur up"><i class="icon wb-bell"></i></span>
                    <i class="ti-shopping-cart-full"></i> Package
                </a>
            </li>
        </ul>
    </div>
</nav>