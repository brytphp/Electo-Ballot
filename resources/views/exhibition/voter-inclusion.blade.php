@extends('auth.layout')

@section('title', 'Voter Inclusion Form')

@section('content')
    <div class="col-md-12 col-lg-12 col-xl-12">
        <form action="{{ route('voter-inclusion.submit') }}" method="post">
            <div class="row justify-content-center mt-sm-5">

                <div class="col-md-6">
                    <div class="card textcenter">
                        <div class="">

                            <div class="text-center text-danger p-4">
                                <h4 class="font-wight-bold text-uppercase">{{ $election->election }} Countdown</h4>
                                <span> @include('partials.counter', ['election' => $election])</span>
                            </div>

                            @csrf
                            <div class="card-body">

                                <h4 class="card-title">Member Inclusion/Update Form</h4>
                                <p class="card-title-desc">Please selelct an option/options below and provide your current
                                    details. </p>

                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="email_update" value="1"
                                                class="custom-control-input  @error('email_update') is-invalid @enderror"
                                                id="email_update" {{ old('email_update') == '1' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="email_update">Update My Email</label>
                                            @error('email_update')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="phone_update" value="1"
                                                class="custom-control-input @error('phone_update') is-invalid @enderror"
                                                id="phone_update" {{ old('phone_update') == '1' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="phone_update">Update My Phone
                                                Number</label>
                                            @error('phone_update')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        {{-- <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" name="voter_id_update" value="1"
                                            class="custom-control-input" id="voter_id_update"
                                            {{ old('voter_id_update') == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="voter_id_update">Update My Member
                                            ID</label>
                                        @error('voter_id_update')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> --}}

                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" name="voter_inclusion" value="1"
                                                class="custom-control-input @error('voter_inclusion') is-invalid @enderror"
                                                id="voter_inclusion" {{ old('voter_inclusion') == '1' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="voter_inclusion">Include My
                                                Details</label>
                                            @error('voter_inclusion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="voter_id">{{ str()->singular($election->voters_name) }} Id</label>
                                    <input type="text" name="voter_id"
                                        class="form-control @error('voter_id') is-invalid @enderror" id="voter_id"
                                        maxlength="6" placeholder="Your {{ str()->singular($election->voters_name) }} Id"
                                        value="{{ old('voter_id') }}" autofocus required autocomplete="voter_id">
                                    @error('voter_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="surname">First Name</label>
                                    <input type="text" name="surname"
                                        class="form-control @error('surname') is-invalid @enderror" id="surname"
                                        placeholder="Your first name" value="{{ old('surname') }}" autofocus required
                                        autocomplete="surname">
                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="other_names">Other Names</label>
                                    <input type="text" name="other_names"
                                        class="form-control @error('other_names') is-invalid @enderror" id="other_names"
                                        placeholder="Your other names" value="{{ old('other_names') }}" autofocus required
                                        autocomplete="other_names">
                                    @error('other_names')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Active Phone Number</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        maxlength="10" placeholder="Your phone" value="{{ old('phone') }}" autofocus
                                        required autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control @error('country') is-invalid @enderror"
                                        id="country" placeholder="Your country" value="{{ old('country') }}" autofocus
                                        required autocomplete="country">
                                        <option>Select...</option>
                                        @foreach ($countries as $key => $country)
                                            <option {{ $country == 'Ghana' ? 'selected' : '' }}>{{ $country }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Your email" value="{{ old('email') }}" autofocus required
                                        autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>


                        </div>
                        <div class="card-footer bg-transparent border-top">
                            <div class="contact-links d-flex font-size-20">
                                <div class="flex-fill">
                                    <a href="{{ route('index') }}"
                                        class="btn float-left btn-outline-dark waves-effect waves-light">
                                        Exit
                                    </a>
                                </div>
                                <div class="flex-fill">
                                    <button type="submit"
                                        class="btn float-right btn-outline-dark waves-effect waves-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
