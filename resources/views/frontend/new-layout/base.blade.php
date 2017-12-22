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
    @yield('custom.meta')
    <!-- End Meta Tags -->

    <!-- Stylesheets -->
    @include('frontend.assets.global-css')
    @yield('custom.css')
    <!-- End Stylesheets -->

    <!-- Fonts -->
    <link href="{{ asset('WebUI/fonts/css/all-fontello.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('WebUI/fonts/css/icon_set_all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,300,300i,600,600i,700,700i&subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam:700" rel="stylesheet">
    @yield('custom.fonts')
    <!-- End Fonts -->
</head>
<body class="en wide">
    <!-- Header Start -->
    @include('frontend.new-layout.partials.header')
    <!-- End Header Start -->

    <!-- Content -->
    <main class="cd-main-content">
        @yield('content')
    </main>
    <!-- End Content -->

    <!-- Footer -->
    @include('frontend.new-layout.partials.footer')
    <!-- End Footer -->

    <!-- Footer Scripts -->
    @include('frontend.assets.global-js')
    @yield('footer.scripts')
    <!-- End Footer Scripts -->
</body>