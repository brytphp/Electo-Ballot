@extends('admin.layouts.app')


@section('title', 'User Accounts')

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('theme/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('theme/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('theme/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        td.details-control {
            background: url('{{ asset('img/details_open.jpeg') }}') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('{{ asset('img/details_close.jpeg') }}') no-repeat center center;
        }
    </style>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">User Accounts</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Accounts</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <accounts></accounts>

    </div>

@endsection

@section('datatable')
    <!-- Required datatable js -->
    <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endsection
