@extends('auth.layout')

@section('title','Reset Password')

@section('content')
<div class="col-md-6 col-lg-4 col-xl-4">
    <div class="card overflow-hidden">
        <div class="bg-dark">
            <div class="row">
                <div class="col-8">
                    <div class="text-primary p-4">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p>Password Reset</p>
                    </div>
                </div>
                <div class="col-4 align-self-end">
                    <img src="{{ asset('theme/images/profile-img.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div>
                <a href="/">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle bg-light">
                            <img src="{{ asset('theme/images/logo.svg') }}" alt="" class="rounded-circle" height="34">
                        </span>
                    </div>
                </a>
            </div>
            <div class="p-2">
                <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <input type="hidden" name="token" value="{{ $request->token }}">

                    <div class="form-group row">
                        <label for="username">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="username" placeholder="Enter email" value="{{ $request->email ?? old('email') }}" required
                            autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Enter password" autofocus required autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('email') is-invalid @enderror" id="password_confirmation"
                            placeholder="Confirm Password" required autocomplete="password_confirmation">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-dark btn-block waves-effect waves-light" type="submit">Recover</button>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i>
                            Login</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
