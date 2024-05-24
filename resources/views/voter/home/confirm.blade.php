@extends('voter.layouts.app')

@section('title')
    Confirmation | {{ auth()->user()->election->election }}
@endsection

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Confirmation</h4>

                    <div class="page-title-right">
                        <h4 class="mb-0 font-size-18">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Selected :
                                        {{ count($votes) }}</a></li>
                            </ol>
                        </h4>
                    </div>
                </div>

                <div class="alert alert-warning fade show" role="alert">
                    <i class="mdi mdi-alert-outline mr-2"></i>
                    You may go <b>BACK</b> to reselect candidate(s) or scroll down and click on <b class="textsuccess">CAST
                        VOTE</b> to
                    finally submit your vote.
                </div>

            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            @foreach ($votes as $vote)
                @if (!empty($vote->candidate_id))
                    <div class="col-md-2 col-lg-2 col-sm-4 col-xs-4">
                        <div class="card text-center team-box">

                            <div class="card-body ballot">
                                <div class="cardheader rounded border-bottom bg-faded text-dark">
                                    <h6 class="text-uppercase"> <strong>{{ $vote->position->position }}</strong></h6>
                                </div>
                                <div>
                                    <img src="{{ $vote->candidate->avatar }}" class="rounded img-fluid">
                                </div>

                                <div class="mt-2" style="height:50px;">
                                    <h6>{{ $vote->candidate->first_name }} {{ $vote->candidate->other_names }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <confirmation previous="{{ route('voter.ballot.paper', $back) }}"></confirmation>
    </div>
@endsection
