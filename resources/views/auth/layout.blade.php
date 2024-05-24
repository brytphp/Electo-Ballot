<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name', 'Laravel') }} - {{ config('app.description', 'Best Dashboard') }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.description', 'Best Dashboard') }}" name="description" />
    <meta content="Bryt Works" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    {!! htmlScriptTagJsApi() !!}

    @yield('pusher')

    @yield('css')

</head>

<body>
    <div class="account-pages my-4 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center" id="app">
                @yield('content')
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    @include('cookie-consent::index')
                </div>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('theme/js/app.js') }}"></script>
    <script src="{{ asset('theme/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/ico-landing.init.js') }}"></script>

    @yield('js')

</body>

</html>
