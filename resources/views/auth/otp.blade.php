@extends('auth.layout')

@section('title', 'Voter verification')

@section('css')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="col-md-6 col-lg-4 col-xl-4 vld-parent">
        @if (Session::has('auth_error'))
            <div class="alert alert-danger text-center alert-dismissible mb-4" role="alert">
                {{ Session::get('auth_error') }}
            </div>
        @endif

        @if (Session::has('auth_success'))
            <div class="alert alert-success text-center alert-dismissible mb-4" role="alert">
                {{ Session::get('auth_success') }}
            </div>
        @endif

        @if (!empty(auth()->user()->otp) && !Session::has('auth_error'))
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all mr-3"></i>Enter OTP</h5>
                    <p class="mt-2">
                        We've sent a four digit code to {{ auth()->user()->masked_phone }} and
                        {{ auth()->user()->masked_email }}.
                    </p>
                </div>
            </div>
        @endif

        {{ auth()->user()->otp }}

        <div class="otp">
            <otp></otp>
        </div>


        <div class="mt-4 text-center mr-lg-5">
            Didn't get Code? <br>
            <a href="{{ route('voter.verification.resend') }}" class="text-muted"><i class="mdi mdi-refresh mr-1"> Resend
                    Code in 3 min</i>
            </a>
        </div>

    </div>
@endsection
