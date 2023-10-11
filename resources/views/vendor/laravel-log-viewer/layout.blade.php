<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <title>@yield('title',config('app.name', 'Laravel') .' '.config('app.description', 'Best Dashboard'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ config('app.description', 'Best Dashboard') }}" name="description" />
    <meta content="Bryt Works" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('theme/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')

</head>

<body data-sidebar="dark" class="" data-topbar="dark">
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

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->
                <v-dialog :width="200" :height="300"></v-dialog>

                @include('admin.layouts.footer')

                <pusher-notifications></pusher-notifications>
            </div>


        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    {{-- @include('admin.layouts.right-bar') --}}
    <!-- /Right-bar -->



@yield('datatable')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>

    <script src="{{ asset('theme/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/libs/jquery-countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/ico-landing.init.js') }}"></script>



    @yield('scripts')

</body>

</html>
