<!doctype html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JV4KD5QQY3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-JV4KD5QQY3');
    </script>

    <meta charset="utf-8" />
    <title>Candidates Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.description', 'Best Dashboard') }}" name="description" />
    <meta content="{{ $election->election }}" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('theme/libs/owl.carousel/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('theme/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-spy="scroll" data-target="#topnav-menu" data-offset="60">

    <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        <div class="container">
            <a class="navbar-logo" href="/">
                <img src="theme/images/logo-dark.png" alt="" height="19" class="logo logo-dark">
                <img src="theme/images/logo-light.png" alt="" height="19" class="logo logo-light">
            </a>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav ml-auto" id="topnav-menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/#candidates">Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#how-to-vote" id="how_to_vote_tab">How To Vote</a>
                    </li>

                    @if ($election->enable_exhibition == 'YES' && \Carbon\Carbon::now()->isBefore($election->exhibition_end_date))
                    @endif

                </ul>

                @if ($election->is_active && $election->is_sealed)
                    <div class="ml-lg-2">
                        <a href="{{ route('login') }}" class="btn btn-outline-success w-xs">Vote Now</a>
                    </div>
                @endif

            </div>
        </div>
    </nav>

    <!-- hero section start -->
    <section class="section herosection bg-ico-hero"
        style="background-image: url('{{ $election->getFirstMediaUrl('banner') }}'); background-attachment: fixed;"
        id="home">
        <div class="bg-overlay bgdark"></div>

        <div class="container" id="app">
            <div class="col-lg-12">
                <profile goto_page="{{ goto_page($candidate->id) }}"></profile>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Team end -->


    <!-- Footer start -->
    <footer class="landing-footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    {{-- <div class="mb-1">
                        <img src="{{ asset('theme/images/logo-light.png') }}" alt="" height="20">
                    </div> --}}
                    <p class="mb-2">{{ date('Y') }} © Electo.</p>
                </div>

            </div>
        </div>
        <!-- end container -->
    </footer>
    <!-- Footer end -->

    <!-- JAVASCRIPT -->
    <script src="theme/libs/jquery/jquery.min.js"></script>
    <script src="theme/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="theme/libs/metismenu/metisMenu.min.js"></script>
    <script src="theme/libs/simplebar/simplebar.min.js"></script>
    <script src="theme/libs/node-waves/waves.min.js"></script>

    <script src="theme/libs/jquery.easing/jquery.easing.min.js"></script>

    <!-- Plugins js-->
    <script src="theme/libs/jquery-countdown/jquery.countdown.min.js"></script>

    <!-- owl.carousel js -->
    <script src="theme/libs/owl.carousel/owl.carousel.min.js"></script>

    <!-- ICO landing init -->
    <script src="theme/js/pages/ico-landing.init.js"></script>

    <script src="theme/js/app.js"></script>


    <script src="{{ asset(mix('js/app.js')) }}"></script>


</body>

</html>
