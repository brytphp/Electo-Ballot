@extends('auth.layout')

@section('title')
Exhibition | {{ $voter->election->election?? '' }}
@endsection

@section('content')
<div class="col-md-12 col-lg-12 col-xl-12" id="app">
    <div class="row justify-content-center mt-sm-5">

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="text-center text-danger p-2">
                        <h4 class="font-wight-bold text-uppercase">{{ $voter->election->election }} Countdown</h4>
                        <span> @include('partials.counter',['election' => $election])</span>

                    </div>

                    <table class="table tablestriped">

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Verification successful</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <tbody>
                            <tr>
                                <th>Member ID</th>
                                <td>{{ $voter->voter_id }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $voter->first_name }}</td>
                            </tr>
                            <tr>
                                <th>Full Name/Other Names</th>
                                <td>
                                    {{ $voter->other_names }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><a href="mailto:{{ $voter->email }}">{{ $voter->email }}</a></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><a href="tel:{{ $voter->phone }}">{{ $voter->phone }}</a></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">

                        <div class="flex-fill">
                            <a href="{{ route('index') }}"
                                class="btn float-left btn-outline-dark waves-effect waves-light">
                                Exit
                            </a>

                            <button type="button" class="btn btn-success waves-effect waves-light float-right"
                            data-toggle="modal" data-backdrop="static" data-target="#myModal">Update My Details</button>

                        </div>

                        @if ($election->allow_proxy == 1)
                        <div class="flex-fill">
                            <a href="{{ route('proxy',request()->voter) }}"
                                class="btn float-right btn-outline-dark waves-effect waves-light">
                                Appy for a proxy vote
                            </a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>

        <update-voter-details :data="{{ $voter }}"></update-voter-details>
    </div>
    <v-dialog :width="200" :height="300" :click-to-close="false" :adaptive="true"></v-dialog>
</div>
@endsection
