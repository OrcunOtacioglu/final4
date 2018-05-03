<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="description" content="Final Four 2018 package sales">
    <meta name="order" content="{{ request()->hasCookie('orderRef') ? request()->cookie('orderRef') : 'not-set' }}">
    @yield('custom.meta')

    <title>@yield('title', 'Homepage') | Detur Official Travel Agency</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/general/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/general/froala_blocks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general/custom.css') }}">
    @yield('custom.css')

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/themify/themify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/web-icons/web-icons.min.css') }}">
    @yield('custom.fonts')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109535935-1"></script>
    <script>
        window.location = 'https://event.tripoki.com/tr/event/turkish-airlines-euroleague-final-four-2018-belgrade';
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-109535935-1');
    </script>

    @yield('header.scripts')
</head>
<body>
    <div class="powered-by text-right">
        <div class="row">
            <img src="{{ asset('img/ag-small-logo-dark.png') }}" alt="" height="25" class="mr5">
            <small style="color: #fff; padding-top: 5px;">Powered by AçıkGişe</small>
        </div>
    </div>
    @include('frontend.partials.header')

    @yield('content')

    @yield('custom.html')

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/base/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/base/popper.min.js') }}"></script>
    <script src="{{ asset('js/base/bootstrap.min.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>