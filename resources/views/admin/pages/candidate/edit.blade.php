@extends('admin.layouts.app')


@section('title', 'Candidates')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Candidates</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.ballot.candidate.index') }}">Candidates</a>
                            </li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row" data-select2-id="17">

            <div class="col-md-12" data-select2-id="16">
                <div class="card" data-select2-id="15">
                    <div class="card-body" data-select2-id="14">
                        <h4 class="card-title">Edit Candidate
                            <div class="float-right dropdown ml-2">
                                <a class="text-muted dropdown-toggle waves-effect" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item" href="{{ route('admin.ballot.election.index') }}">Elections</a>
                                    <a class="dropdown-item" href="{{ route('admin.ballot.position.index') }}">Positions</a>
                                    <a class="dropdown-item"
                                        href="{{ route('admin.ballot.candidate.index') }}">Candidates</a>
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                        data-target="#form_modal" data-backdrop="static">New Candidate</a>
                                </div>
                            </div>
                        </h4>


                        <hr>
                        <edit-candidate :data="{{ $candidate }}"></edit-candidate>
                    </div>

                </div>
            </div>

        </div>


    </div>
@endsection
