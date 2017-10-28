<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('custom.meta')
    <link rel="icon" href="../../../../favicon.ico">

    <title>@yield('title', 'Dashboard') | AçıkGişe</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('custom.css')

    <link rel="stylesheet" href="{{ asset('fonts/web-icons/web-icons.min.css') }}">
    @yield('custom.fonts')
</head>

<body>
    @include('dashboard.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.partials.sidebar')
            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                {{--@include('dashboard.partials.breadcrumbs')--}}
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="float-left">@yield('title', 'Dashboard')</h1>
                    </div>
                    <div class="col-md-2 clearfix">
                        <div class="folat-right">
                            @yield('header.right')
                        </div>
                    </div>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('footer.scripts')

</body>
</html>