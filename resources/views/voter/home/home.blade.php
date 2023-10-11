@extends('voter.layouts.app')

@section('title')
{{ $data['data']['position']->position }} | {{ auth()->user()->election->election }}
@endsection

@section('content')
<ballot-paper></ballot-paper>
@endsection
