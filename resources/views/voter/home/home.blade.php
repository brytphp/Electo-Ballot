@extends('voter.layouts.app')

@section('title')
    {{ $data['data']['position']->position }} | {{ auth()->user()->election->election }}
@endsection

@section('css')
    <script type="text/javascript">
        window.app = {
            unopposed_position: @json($unopposed_position)
        }
    </script>
@endsection

@section('content')
    <ballot-paper></ballot-paper>
@endsection
