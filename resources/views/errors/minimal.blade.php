<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    @yield('page_refresh')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 font-weight-medium">@yield('code')</h1>
                        <h4 class="text-uppercase"> @yield('message')</h4>
                        <div class="mt-5 text-center">

                            @if (Auth::check())
                            <a class="btn btn-primary waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Go Home</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <a class="btn btn-primary waves-effect waves-light" href="{{ route('index') }}">Go Home</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div>
                        <img src="{{ asset('img/error-img.png') }}" alt="" class="img-fluid">
                    </div>
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

    <script src="{{ asset('theme/js/app.js') }}"></script>

</body>

</html>
