<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('custom.meta')

    <title>@yield('title') | Detur Official Travel Agency</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/general/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/authentication.css') }}">
    @yield('custom.css')

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/themify/themify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/web-icons/web-icons.min.css') }}">
    @yield('custom.fonts')
</head>
<body class="page-login-v2 layout-full page-dark">

    <div class="page">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="page-brand-info">
                    <div class="brand">
                        <img class="brand-img" src="{{ asset('img/logo.png') }}">
                        <h2 class="brand-text font-size-40">Official Travel Agency</h2>
                    </div>
                    <p class="font-size-20">Turkish Airlines EuroLeague Final Four 2018 Belgrade</p>
                </div>
            </div>
            <div class="page-login-main">
                <h1>@yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/base/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/base/popper.min.js') }}"></script>
    <script src="{{ asset('js/base/bootstrap.min.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>