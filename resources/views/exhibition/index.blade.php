@extends('auth.layout')

@section('title', 'Voters Register Exhibition')

@section('content')

    <div class="col-md-6 col-lg-4 col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-dark">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center text-danger p-2">
                            <div data-countdown="{{ $election->exhibition_end_date }}"
                                class="counter-number ico-countdown text-danger"></div>

                            <hr class="bg-white">

                            <h4 class="text-white font-wight-bold ml-5">Register Exhibition</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="avatar-md profile-user-wid mb-0">
                    <span class="avatar-title rounded-circle bg-white">
                        <img src="{{ $election->logo }}" alt="" class="rounded-circle" height="70">
                    </span>
                </div>
                <div class="p-2">
                    <form class="form-horizontal" method="POST" action="{{ route('exhibition.login.submit') }}">
                        @csrf

                        @if ($errors->has('404'))
                            <div class="error text-center border-1 font-size-14">{!! $errors->first('404') !!}</div>
                            <hr>
                        @endif

                        <div class="form-group">
                            <label for="password">{{ $election->password_title ?? 'Password' }}</label>
                            <input type="text" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password" maxlength="10"
                                placeholder="{{ $election->password_title ?? 'Password' }}" autofocus required
                                autocomplete="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="username">{{ $election->username_title ?? 'Email or Phone' }}</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="{{ $election->username_title ?? 'Email or Phone' }}" autofocus required
                                autocomplete="username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>




                        <div class="mt-2">
                            <button class="btn btn-dark btn-block waves-effect waves-light" type="submit">Submit</button>
                        </div>

                        {{-- <div class="mt-2 text-center text-info">
                            <a href="{{ route('voter-inclusion') }}" class="text-info">
                                Click here to submit your current information </a>
                        </div> --}}

                        <div class="mt-2 text-center">
                            <a href="/" class="text-muted"><i class="mdi mdi-home mr-1"></i>
                                Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
