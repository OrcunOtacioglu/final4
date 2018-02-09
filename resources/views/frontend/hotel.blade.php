<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <title>@yield('title', 'Special Events and Packages') - Tripoki</title>

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
    <meta name="cart" content="{{ \Illuminate\Support\Facades\Cookie::get('cart_uuid') }}">
    @yield('custom.meta')
    <!-- End Meta Tags -->

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('frontend/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('frontend/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('frontend/img/favicon/apple-icon-144x144.png') }}">

    <!-- Stylesheets -->
    @include('frontend.assets.global-css')
    @yield('custom.css')
    <!-- End Stylesheets -->

    <!-- Fonts -->
    <link href="{{ asset('frontend/fonts/css/all-fontello.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/fonts/css/icon_set_all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,300,300i,600,600i,700,700i&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam:700" rel="stylesheet">
    @yield('custom.fonts')
    <!-- End Fonts -->
</head>
<body class="en wide">
<div id="app">
    <!-- Header Start -->
    @include('frontend.partials.fixed-header')
    <!-- End Header Start -->

    <!-- Content -->
    <main class="cd-main-content">
        @yield('content')
    </main>
    <!-- End Content -->
</div>

<!-- Footer -->
@include('frontend.partials.footer')
<!-- End Footer -->

<!-- Footer Scripts -->
@include('frontend.assets.global-js')
@yield('footer.scripts')
<!-- End Footer Scripts -->
</body>