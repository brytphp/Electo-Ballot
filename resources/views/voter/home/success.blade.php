@extends('auth.layout')

@section('title')
    Success | {{ auth()->user()->election->election ?? '' }}
@endsection

@section('content')
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="row justify-content-center mt-sm-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="text-center">
                                        <img src="{{ $election->logo }}" alt=""
                                            class="img-thumbnail rounded-circle avatar-sm">
                                        <h5 class="mt-2 font-weight-semibold">{{ $election->election }}</h5>
                                    </div>

                                    <div class="mt-2">
                                        <p class="font-weight-semibold text-success">Thank you for voting in this election
                                        </p>
                                        <a href="javascript:void(0)"
                                            class="btn btn-outline-success waves-effect waves-light"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Download Receipt
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-5 mb-2">
                                <div class="col-sm-6 col-8">
                                    <div>
                                        <img src="{{ asset('svg/vote_success.svg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 ">
                                    <h2>Total Vote Cast
                                        {{ auth()->user()->election->voted->count() }}/{{ auth()->user()->election->register->count() }}
                                    </h2>

                                    <a href="javascript:void(0)" class="btn btn-outline-dark waves-effect waves-light"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Close Window
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
