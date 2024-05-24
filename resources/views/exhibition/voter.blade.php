@extends('auth.layout')

@section('title')
    Exhibition | {{ $voter->election->election ?? '' }}
@endsection

@section('css')
    <script type="text/javascript">
        window.config = {
            countries: @json(countries())
        }
    </script>
@endsection

@section('content')
    <div class="col-md-12 col-lg-12 col-xl-12" id="app">
        <div class="row justify-content-center mt-sm-5">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center text-danger p-2">
                            <h4 class="font-wight-bold text-uppercase">{{ $voter->election->election }} EXHIBITION</h4>

                            <div class="alert alert-success" role="alert">
                                <b>Please verify your personal information to get your account ready to vote.</b>
                            </div>
                        </div>

                        <table class="table tablestriped">

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
                                    <th>Other Names</th>
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

                    <update-voter-details :data="{{ $voter }}"></update-voter-details>

                </div>

            </div>


        </div>
        <v-dialog :width="200" :height="300" :click-to-close="false" :adaptive="true"></v-dialog>
    </div>
@endsection

@section('js')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
