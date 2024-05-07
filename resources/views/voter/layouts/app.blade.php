<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <title>@yield('title', config('app.name', 'Laravel') . ' - ' . config('app.description', 'Best Dashboard'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.description', 'Best Dashboard') }}" name="description" />
    <meta content="Bryt Works" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('theme/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @yield('css')


</head>

<body data-sidebar="dark" data-layout="horizontal">
    <div id="app">
        <!-- Begin page -->
        <div id="layout-wrapper">


            @include('voter.layouts.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('voter.layouts.navigation')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content mb-3">
                    @yield('content')
                </div>
                <!-- End Page-content -->

                @include('voter.layouts.footer')
            </div>
            <!-- end main content-->
            <v-dialog :width="200" :height="300" :click-to-close="false" :adaptive="true">
            </v-dialog>
        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('voter.layouts.right-bar')
    <!-- /Right-bar -->




    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="{{ asset('theme/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/ico-landing.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            if (!localStorage.getItem("{{ auth()->user()->id }}")) {
                $("#modal-info").modal({
                    show: true
                });
            }

            $("#modal-info").on('hide.bs.modal', function() {
                localStorage.setItem("{{ auth()->user()->id }}", true)
            });

        });

        function hideInfo() {
            localStorage.setItem("{{ auth()->user()->id }}", true)
        }
    </script>


    @yield('scripts')

</body>

</html>
