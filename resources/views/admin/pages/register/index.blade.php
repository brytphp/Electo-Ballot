@extends('admin.layouts.app')


@section('title', $election?->voters_name ?? 'Voters' . ' Register')

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('theme/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('DataTables/datatables.min.js') }}" rel="stylesheet" type="text/css" />

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
                    <h4 class="mb-0 font-size-18">Register</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $election->voters_name ?? 'Voters' }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <voters ref="voters"></voters>

    </div>

@endsection

@section('datatable')
    <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
@endsection
