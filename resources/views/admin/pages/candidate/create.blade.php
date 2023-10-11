@extends('admin.layouts.app')


@section('title','Candidates')

@section('content')
<div class="container-fluid">

    <div class="row" data-select2-id="17">

        <div class="col-md-12" data-select2-id="16">
            <div class="card" data-select2-id="15">
                <div class="card-body" data-select2-id="14">
                    <h4 class="card-title">Candidate
                        <div class="float-right dropdown ml-2">
                            <a class="text-muted dropdown-toggle waves-effect" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="">
                                <a class="dropdown-item" href="{{ route('elections.index') }}">Elections</a>
                                <a class="dropdown-item" href="{{ route('positions.index') }}">Positions</a>
                                <a class="dropdown-item" href="{{ route('candidates.index') }}">Candidates</a>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                    data-target="#form_modal" data-backdrop="static">New Candidate</a>
                            </div>
                        </div>
                    </h4>


                    <hr>

                    <create-candidate></create-candidate>
                </div>

            </div>
        </div>

    </div>


</div>
@endsection
