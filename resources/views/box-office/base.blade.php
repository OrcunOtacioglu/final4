<!DOCTYPE html>
<html class="no-js js-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <meta name="description" content="Açıkgişe Ticketing Solutions Dashboard">
    <meta name="author" content="Orçun Otacıoğlu">
    @yield('custom.meta')

    <title>@yield('title', 'Box Office') | AçıkGişe Ticketing Solutions</title>

    <!-- Stylesheets -->
    @include('dashboard.partials.css.base')
<!-- Plugins -->
    @include('dashboard.partials.css.plugins')
<!-- Custom -->
    @yield('custom.css')

    <link rel="stylesheet" href="{{ asset('fonts/themify/themify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/web-icons/web-icons.min.css') }}">
    @yield('custom.fonts')

    @include('dashboard.partials.js.responsive')
    @yield('header.scripts')
</head>
<body class="@yield('body.class', 'animsition site-navbar-small page-aside-fixed page-aside-left mm-wrapper site-menubar-fold')" style="animation-duration: 800ms; opacity: 1;">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

@include('dashboard.partials.navbar')

@include('dashboard.partials.sidebar')

<!-- Page -->
<div class="page" id="page">
    @include('box-office.partials.sidebar-fixed')
    <div class="page-main">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">@yield('title')</h1>
            @yield('page-description')

            <div class="page-header-actions">
                <div class="btn-group btn-group" id="withBtnGroup" aria-label="Page Header Actions" role="group">
                    @yield('page-header')
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>
<!-- End Page -->

@yield('custom.html')


<!-- Footer -->
@include('dashboard.partials.footer')
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

@yield('footer.scripts')
</body>
</html>