@extends('vendor.laravel-log-viewer.layout')

@section('title','System Logs')

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
    h1 {
        font-size: 1.5em;
        margin-top: 0;
    }

    #table-log {
        font-size: 0.85rem;
    }

    .sidebar {
        font-size: 0.85rem;
        line-height: 1;
    }

    .btn {
        font-size: 0.7rem;
    }

    .stack {
        font-size: 0.85em;
    }

    .date {
        min-width: 75px;
    }

    .log-text {
        word-break: break-all;
    }

    a.llv-active {
        z-index: 2;
        background-color: #f5f5f5;
        border-color: #777;
    }

    .list-group-item {
        word-break: break-word;
    }

    .folder {
        padding-top: 15px;
    }

    .div-scroll {
        height: 80vh;
        overflow: hidden auto;
    }

    .nowrap {
        white-space: nowrap;
    }



    /**
  * DARK MODE CSS
  */

    body[data-theme="dark"] {
        background-color: #151515;
        color: #cccccc;
    }

    [data-theme="dark"] a {
        color: #4da3ff;
    }

    [data-theme="dark"] a:hover {
        color: #a8d2ff;
    }

    [data-theme="dark"] .list-group-item {
        background-color: #1d1d1d;
        border-color: #444;
    }

    [data-theme="dark"] a.llv-active {
        background-color: #0468d2;
        border-color: rgba(255, 255, 255, 0.125);
        color: #ffffff;
    }

    [data-theme="dark"] a.list-group-item:focus,
    [data-theme="dark"] a.list-group-item:hover {
        background-color: #273a4e;
        border-color: rgba(255, 255, 255, 0.125);
        color: #ffffff;
    }

    [data-theme="dark"] .table td,
    [data-theme="dark"] .table th,
    [data-theme="dark"] .table thead th {
        border-color: #616161;
    }

    [data-theme="dark"] .page-item.disabled .page-link {
        color: #8a8a8a;
        background-color: #151515;
        border-color: #5a5a5a;
    }

    [data-theme="dark"] .page-link {
        background-color: #151515;
        border-color: #5a5a5a;
    }

    [data-theme="dark"] .page-item.active .page-link {
        color: #fff;
        background-color: #0568d2;
        border-color: #007bff;
    }

    [data-theme="dark"] .page-link:hover {
        color: #ffffff;
        background-color: #0051a9;
        border-color: #0568d2;
    }

    [data-theme="dark"] .form-control {
        border: 1px solid #464646;
        background-color: #151515;
        color: #bfbfbf;
    }

    [data-theme="dark"] .form-control:focus {
        color: #bfbfbf;
        background-color: #212121;
        border-color: #4a4a4a;
    }

    /* td.highlight {
        background-color: whitesmoke !important;
        color: #000000;
    } */

    table.dataTable tbody tr.selected {
        background-color: #2A3042;
        color: #eae8e8
    }

</style>

@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">System Log</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">System Log</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row" data-select2-id="17">
        <div class="col-lg-12" data-select2-id="16">
            <div class="card" data-select2-id="15">
                <div class="card-body" data-select2-id="14">
                    <div class="row">
                        @if (count($files) > 1)
                        <div class="col sidebar mb-3">

                            <div class="list-group div-scroll">
                                @foreach($folders as $folder)
                                <div class="list-group-item">
                                    <a href="?f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}">
                                        <span class="fa fa-folder"></span> {{$folder}}
                                    </a>
                                    @if ($current_folder == $folder)
                                    <div class="list-group folder">
                                        @foreach($folder_files as $file)
                                        <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}&f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}"
                                            class="list-group-item @if ($current_file == $file) llv-active @endif">
                                            {{$file}}
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                                @foreach($files as $file)
                                <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"
                                    class="list-group-item @if ($current_file == $file) llv-active @endif">
                                    {{$file}}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class=" {{ count($files) > 1 ? 'col-10' :'col-12' }}  table-container">
                            @if ($logs === null)
                            <div>
                                Log file >50M, please download it.
                            </div>
                            @else
                            <table id="table-log" class="table table-striped"
                                data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
                                <thead>
                                    <tr>
                                        @if ($standardFormat)
                                        <th>Level</th>
                                        <th>Context</th>
                                        <th>Date</th>
                                        @else
                                        <th>Line number</th>
                                        @endif
                                        <th>Content</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($logs as $key => $log)
                                    <tr data-display="stack{{{$key}}}">
                                        @if ($standardFormat)
                                        <td class="nowrap text-{{{$log['level_class']}}}">
                                            <span class="fa fa-{{{$log['level_img']}}}"
                                                aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                                        </td>
                                        <td class="log-text">{{$log['context']}}</td>
                                        @endif
                                        <td class="date">{{{$log['date']}}}</td>
                                        <td class="log-text">
                                            @if ($log['stack'])
                                            <button type="button"
                                                class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                                                data-display="stack{{{$key}}}">
                                                <span class="fa fa-eye"></span>
                                            </button>
                                            @endif
                                            {{{$log['text']}}}
                                            @if (isset($log['in_file']))
                                            <br />{{{$log['in_file']}}}
                                            @endif
                                            @if ($log['stack'])
                                            <div class="stack" id="stack{{{$key}}}"
                                                style="display: none; white-space: pre-wrap;">
                                                {{{ trim($log['stack']) }}}
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @endif
                            <div class="p-3">
                                @if($current_file)
                                <a class="btn btn-outline-dark"
                                    href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                    <span class="fa fa-download"></span> Download file
                                </a>

                                {{-- @if ($current_file !='sms.log') --}}
                                -
                                <a id="clean-log" class="btn btn-outline-dark"
                                    href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                    <span class="fa fa-sync"></span> Clean file
                                </a>
                                - <a id="delete-log" class="btn btn-outline-dark"
                                    href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                    <span class="fa fa-trash"></span> Delete file
                                </a>
                                {{-- @endif --}}

                                {{-- @if(count($files) > 1) @endif--}}
                                -
                                <a id="delete-all-log" class="btn btn-outline-dark"
                                    href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                <span class="fa fa-trash-alt"></span> Delete all files
                                </a>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
<script src="{{ asset('theme/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.table-container tr').on('click', function () {
            $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
            "order": [$('#table-log').data('orderingIndex'), 'desc'],
            "stateSave": true,
            "stateSaveCallback": function (settings, data) {
                window.localStorage.setItem("datatable", JSON.stringify(data));
            },
            "stateLoadCallback": function (settings) {
                var data = JSON.parse(window.localStorage.getItem("datatable"));
                if (data) data.start = 0;
                return data;
            },
            scrollY: '50vh',
            scrollCollapse: true,
            stateSave: true,
            "pagingType": "full_numbers",
        });
        $('#delete-log, #clean-log, #delete-all-log').click(function () {
            return confirm('Are you sure?');
        });


        $('.table tbody')
            .on('mouseenter', 'td', function () {
                var colIdx = table.cell(this).index().column;

                $(table.cells().nodes()).removeClass('highlight');
                $(table.column(colIdx).nodes()).addClass('highlight');
            });

        $('.table tbody').on('click', 'tr', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });

</script>
@endsection
