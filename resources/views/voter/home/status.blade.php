@extends('auth.layout')

@section('title')
Status | {{ auth()->user()->election->election ?? '' }}
@endsection

@section('content')


@if(election_status($election)['status'] == 'Upcoming')
    @include('voter.home.status.upcoming')
@endif

@if(election_status($election)['status'] == 'Ongoing')
    @include('voter.home.status.ongoing')
@endif

@if(election_status($election)['status'] == 'Pending')
    @include('voter.home.status.pending')
@endif

@if(election_status($election)['status'] == 'Ended')
    @include('voter.home.status.ended')
@endif

@endsection


@section('js')
    <script src="{{ asset('theme/libs/jquery-countdown/jquery.countdown.min.js') }}"></script>

    <script src="{{ asset('theme/js/pages/coming-soon.init.js') }}"></script>
@endsection
