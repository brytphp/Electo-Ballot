<!doctype html>
<html lang="en">

<head>
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
    <title>{{ $election->election }}</title>
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
                        <a class="nav-link active" href="#home">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#candidates">Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-to-vote" id="how_to_vote_tab">How To Vote</a>
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
    <section class="section hero-section bg-ico-hero"
        style="background-image: url('{{ $election->banner }}'); background-attachment: fixed;" id="home">
        <div class="bg-overlay bgdark"></div>
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">
                            {{ $election->banner_title }}</h1>
                        <p class="font-size-14">{{ $election->banner_subtitle }}</p>

                        <div class="button-items mt-4">
                            <a href="javascript:void(0)" class="btn btn-light"
                                onclick="event.preventDefault();document.getElementById('how_to_vote_tab').click()">How
                                To Vote</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-8 col-sm-10 ml-lg-auto">

                    @if (
                        $election->enable_exhibition == 'YES' &&
                            \Carbon\Carbon::now()->between($election->exhibition_start_date, $election->exhibition_end_date))
                        <div class="card overflow-hidden mb-0 mt-5 mt-lg-0  text-danger">
                            <div class="card-header text-center">
                                <h5 class="mb-0">Voter Exhibition Countdown</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="mt-4">
                                        <div data-countdown="{{ $election->exhibition_end_date }}"
                                            class="counter-number ico-countdown"></div>
                                    </div>

                                    <div class="mt-4">
                                        <a href="{{ route('exhibition.login.form') }}"
                                            class="btn btn-danger w-md btn-block">Check Your Details Now</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card overflow-hidden mb-0 mt-5 mt-lg-0 text-danger">
                            <div class="card-header text-center ">
                                <h5 class="mb-0 ">Election Countdown</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="mt-4">
                                        <div data-countdown="{{ $election->is_active == 0 ? $election->start_date : $election->end_date }}"
                                            class="counter-number ico-countdown"></div>
                                    </div>

                                    @if ($election->is_active && $election->is_sealed)
                                        <div class="mt-4">
                                            <a href="{{ route('login') }}" class="btn btn-success w-md btn-block">Vote
                                                Now</a>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                    @endif



                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

        <section class="section" id="candidates">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5 ">
                            <div class="small-title  text-white">Candidates</div>
                            <h4 class="text-uppercase text-white">Meet our Candidates</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="col-lg-12">

                    <div id="{{ $election->slug }}" class="accordion custom-accordion">

                        @foreach ($election->positions as $position)
                            <div class="mb-3">
                                <a href="#{{ $position->slug }}" class="accordion-list" data-toggle="collapse"
                                    aria-expanded=" {{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="{{ $position->slug }}">


                                    <div>{{ $position->position }}</div>
                                    <i class="mdi mdi-minus accor-plus-icon"></i>

                                </a>

                                <div id="{{ $position->slug }}" class="collapse show">
                                    {{-- {{ $loop->first ? 'show' : 'hide' }} --}}
                                    <div class="card-body">
                                        <div class="row nogutters">
                                            @foreach ($position->candidates as $key => $candidate)
                                                <div class="col-md-3">
                                                    <a href="{{ route('profile', $candidate->id) }}">
                                                        <div class="card text-center team-box">
                                                            @if ($position->position != 'President')
                                                                <div class="card-header rounded">
                                                                    <b>{{ 'Candidate No. ' . $key + 1 }}</b>
                                                                </div>
                                                            @endif

                                                            <div class="card-body">
                                                                <div>
                                                                    <img src="{{ $candidate->avatar }}"
                                                                        alt="" class="rounded img-fluid">
                                                                </div>

                                                                <div class="mt-1 border-top">
                                                                    <h6 class="">{{ $candidate->first_name }}
                                                                        {{ $candidate->other_names }}
                                                                    </h6>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end container -->
    </section>
    <!-- Team end -->

    <!-- Roadmap start -->
    <section class="section" id="how-to-vote">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Steps</div>
                        <h4 class="text-uppercase">How To Vote</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="hori-timeline">
                        <div class="owl-carousel owl-theme events navs-carousel" id="timeline-carousel">
                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">Step 1</div>
                                        <h5 class="mb-4">Member Verification</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">This stage ensures a member quallifies to vote for his or
                                            her prefered candidate</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">Step 2</div>
                                        <h5 class="mb-4">Voting</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">Verified members are presented with e-ballots to vote for
                                            their prefered candidates </p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">Step 3</div>
                                        <h5 class="mb-4">Casting Vote</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">Members have the chance to revisit their choices in step
                                            2
                                            before finally casting their votes. </p>
                                    </div>
                                </div>
                            </div>

                            <div class="item event-list">
                                <div>
                                    <div class="event-date">
                                        <div class="text-primary mb-1">Step 4</div>
                                        <h5 class="mb-4">Results</h5>
                                    </div>
                                    <div class="event-down-icon">
                                        <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <p class="text-muted">Whilst election results are declared at the end of the
                                            election, votes are counted in realtime. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Roadmap end -->

    <!-- Footer start -->
    <footer class="landing-footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="mb-1">
                        <img src="theme/images/logo-light.png" alt="" height="20">
                    </div>
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

    {{-- <a href="//www.dmca.com/Protection/Status.aspx?ID=4c2af808-9a90-4211-98c2-6b3a799d6ba2"
        title="DMCA.com Protection Status" class="dmca-badge"> <img
            src="https://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=4c2af808-9a90-4211-98c2-6b3a799d6ba2"
            alt="DMCA.com Protection Status" /></a>
    <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script> --}}

</body>

</html>
