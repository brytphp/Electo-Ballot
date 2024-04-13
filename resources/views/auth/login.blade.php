@extends('auth.layout')

@section('title', 'Login')

@section('content')

    <div class="col-md-6 col-lg-4 col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-dark">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center text-danger p-4">
                            @if ($show_election_countdown)
                            @endif
                            <span> @include('partials.counter', ['election' => $election])</span>
                            <hr class="bg-white">

                            <h4 class="text-white font-wight-bold">Sign in to continue</h4>
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

                    @env('local')
                    @php
                        $voter = voter();
                        $password = $voter->voter_id;
                        $email = $voter->email;
                    @endphp
                    @endenv

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password"
                                class="text-uppercase">{{ $election->password_title ?? 'Password' }}</label>
                            <input type="text" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Enter {{ str()->title($election->password_title) ?? 'Password' }}" required
                                autofocus autocomplete="current-password" value="{{ $password ?? null }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email"
                                class="text-uppercase">{{ $election->username_title ?? 'Email or Phone' }}</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                placeholder="{{ str()->title($election->username_title) ?? 'Email or Phone' }}" required
                                autocomplete="email" value="{{ $email ?? null }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>





                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="customControlInline"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                        </div>


                        <div class="mt-2">
                            <button class="btn btn-dark btn-block waves-effect waves-light" type="submit">Log In</button>
                        </div>

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
