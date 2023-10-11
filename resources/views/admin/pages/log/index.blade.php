@extends('admin.layouts.app')

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('theme/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('DataTables/datatables.min.js') }}" rel="stylesheet" type="text/css" />
@endsection


@section('title', 'Activity Logs')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Activity Log</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Activity Log</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>


        <div class="row" data-select2-id="17">
            <div class="col-lg-12" data-select2-id="16">
                <div class="card" data-select2-id="15">
                    <div class="card-body" data-select2-id="14">
                        <table class="table table-bordered table-hover table-condensed display responsive nowrap"
                            width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Action</th>
                                    <th class="text-center">Model</th>
                                    <th class="text-center">New Data</th>
                                    <th class="text-center">Old Data</th>
                                    <th class="text-center">Model ID</th>
                                    <th class="text-center all">Date</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $('.table').DataTable({
            processing: true,
            serverSide: true,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate
                }
            },
            order: [
                [6, 'desc']
            ],
            ajax: "{{ route('api.admin.audit-trail.activities') }}",
            columns: [{
                    data: 'user',
                    name: 'activity_log.user'
                },
                {
                    data: 'description',
                    name: 'activity_log.description'
                },
                {
                    data: 'subject_type',
                    name: 'activity_log.subject_type',
                    type: "string"
                },
                {
                    data: 'new',
                    name: 'activity_log.new'
                },
                {
                    data: 'old',
                    name: 'activity_log.old'
                },
                {
                    data: 'subject_id',
                    name: 'activity_log.subject_id'
                },
                {
                    data: 'created_at',
                    name: 'activity_log.created_at'
                }


            ],
            columnDefs: [{
                    targets: [3, 4, 5],
                    orderable: false,
                    searchable: false,
                    exportable: false
                },
                {
                    targets: [2, 6],
                    className: "text-center",
                },
            ],
            "lengthMenu": [
                [5, 15, 25, 50, 100, 200, 500, -1],
                [5, 15, 25, 50, 100, 200, 500, "All"]
            ],
            scrollY: '90vh',
            scrollCollapse: true,
            stateSave: true,
            "pagingType": "full_numbers",
        });
    </script>
@endsection
