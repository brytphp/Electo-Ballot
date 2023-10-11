<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', config('app.name', 'Laravel') . ' - ' . config('app.description', 'Best Dashboard')) | {{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.description', 'Best Dashboard') }}" name="description" />
    <meta content="Bryt Works" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- Lightbox css -->
    <link href="{{ asset('theme/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('theme/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css" />

    @yield('css')

    <script>
        window.electo = {
            voters_name: @json($election->voters_name),
            sms_deliverability: @json(sms_deliverability()),
            total_number_of_voters: @json(total_number_of_voters()),
        }
    </script>
    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
</head>

<body data-sidebar="dark" class="{{ config('electo_settings.theme_layout') }}" data-topbar="dark">
    <div id="app">
        <!-- Begin page -->
        <div id="layout-wrapper">


            @include('admin.layouts.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.navigation')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content  mb-3">
                    @yield('content')
                    {{-- <cookie-consent/> --}}
                </div>
                <!-- End Page-content -->
                <v-dialog :width="200" :height="300" :click-to-close="false" :adaptive="true">
                </v-dialog>

                @include('admin.layouts.footer')


                <pusher-notifications electo_channel="{{ config('electo.electo_channel') }}"></pusher-notifications>
                <firebase-notification></firebase-notifications>
            </div>


        </div>

        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('admin.layouts.right-bar')
        <!-- /Right-bar -->


    </div>


    @yield('datatable')

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>
    {{-- <script src="{{ asset('theme/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/lightbox.init.js') }}"></script> --}}
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="{{ asset('theme/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/ico-landing.init.js') }}"></script>

    @include('admin.layouts.firebase')

    @yield('scripts')

</body>

</html>
