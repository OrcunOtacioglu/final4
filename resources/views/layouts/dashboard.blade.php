<!doctype html>
<html class="no-js js-menubar" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="AçıkGişe Ticketing Solutions Software">
    <meta name="author" content="Orçun Otacıoğlu">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('custom.meta')

    <title>@yield('title', 'Dashboard') - AçıkGişe Ticketing Solutions</title>

    <!-- Stylesheets -->
    @include('dashboard.partials.css.base')
    <!-- Plugins -->
    @include('dashboard.partials.css.plugins')
    <!-- Custom Css -->
    @yield('custom.css')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/themify/themify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
    @yield('custom.fonts')

    @include('dashboard.partials.js.responsive')
</head>
<body class="@yield('body.class', 'animsition dashboard site-menubar-hide')" style="animation-duration: 800ms; opacity: 1;">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Site Navbar -->
    @include('dashboard.partials.navbar')
    <!-- End Site Navbar -->

    <!-- Site Sidebar -->
    {{--@include('dashboard.partials.sidebar')--}}
    <!-- End Site Sidebar -->

    <!-- Page -->
    <div class="page" id="dashboard">
        <div class="page-header @yield('container.type', 'container-fluid')">
            <h1 class="page-title">@yield('title')</h1>
            @yield('page-description')
            {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item"><a href="../index.html">Home</a></li>--}}
            {{--<li class="breadcrumb-item active">You are Here</li>--}}
            {{--</ol>--}}
            <div class="page-header-actions">
                <div class="btn-group btn-group-sm" id="withBtnGroup" aria-label="Header Actions" role="group">
                    {{--<button type="button" class="btn btn-outline btn-default">--}}
                    {{--<i class="icon wb-wrench" aria-hidden="true"></i>--}}
                    {{--<span class="hidden-sm-down">Settings</span>--}}
                    {{--</button>--}}
                    @yield('header.actions')
                </div>
            </div>
        </div>
        <div class="page-content @yield('container.type', 'container-fluid')">
            @yield('content')
        </div>
    </div>
    <!-- End Page -->

    @yield('custom.html')

    <!-- Footer -->
    @include('dashboard.partials.footer')
    <!-- End Footer -->

    <!-- Core  -->
    @include('dashboard.partials.js.core')
    <!-- Plugins -->
    @include('dashboard.partials.js.plugins')
    <!-- Scripts -->
    @include('dashboard.partials.js.scripts')
    <!-- Config -->
    @include('dashboard.partials.js.config')
    <!-- Page -->
    @include('dashboard.partials.js.page')
    <!-- Dashboard Instance -->
    <script src="{{ asset('admin/js/core/dashboard.js') }}"></script>
    <!-- Custom -->
    @yield('footer.scripts')
</body>
</html>