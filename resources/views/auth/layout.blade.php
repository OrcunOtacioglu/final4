<!doctype html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="title" content="Special Events on Tripoki">
    <meta name="keywords" content="event, tour, special event">
    <meta name="description" content="Tripoki offers special events and packages">

    <meta name="revisit-after" content="10 days">
    <meta name="publisher" content="">
    <meta name="copyright" content="">
    <meta name="author" content="DETUR">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom.meta')
    <!-- End Meta Tags -->

    <title>@yield('title') | Tripoki Events</title>

    <!-- Bootstrap CSS -->
    @include('frontend.assets.global-css')
    <link rel="stylesheet" href="{{ asset('frontend/css/misc/authentication.css') }}">
    @yield('custom.css')

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/themify/themify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/web-icons/web-icons.min.css') }}">
    @yield('custom.fonts')
</head>
<body class="page-login-v2 layout-full page-dark">

    <div class="page" id="app">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="page-brand-info">
                    <div class="brand">
                        <img class="brand-img" src="{{ asset('frontend/img/tripoki-logo.png') }}">
                        <h2 class="brand-text font-size-40">Tripoki Events</h2>
                    </div>
                    <p class="font-size-20">Special Events & Hospitality Packages</p>
                </div>
            </div>
            <div class="page-login-main">
                <h1>@yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </div>

    @include('frontend.assets.global-js')
    @yield('footer.scripts')
</body>
</html>