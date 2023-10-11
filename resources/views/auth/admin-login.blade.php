@extends('auth.layout')

@section('title', 'Login')

@section('content')

    <div class="col-md-6 col-lg-4 col-xl-4 mt-5">
        <div class="card overflow-hidden">
            <div class="border-bottom">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center p-4">
                            <h4 class="textwhite font-wight-bold">Sign in to continue</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">

                <div class="p-2">

                    <form class="form-horizontal" method="POST" action="{{ route('auth.sign-in-submit') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Enter your Email" autofocus required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Enter your Password" required autocomplete="current-password">
                            @error('password')
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
