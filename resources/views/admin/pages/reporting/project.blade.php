@extends('auth.layout')

@section('title',$election->election)

@section('css')
<style type="text/css">
    .project-count {
        font-weight: bold;
        font-size: 150px
    }
</style>
@endsection

@section('pusher')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher("{{ config('electo.pusher_key') }}", {
        cluster: "{{ config('electo.pusher_cluster') }}",
        forceTLS: true
    });

    var channel = pusher.subscribe("{{ config('electo.electo_channel').'-channel' }}");
    channel.bind("{{ config('electo.electo_channel').'-event' }}", function (data) {
        $('#voted').html(data.message.voted)
    });
</script>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card overflow-hidden">
        <div class="bg-dark">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center text-danger p-4">
                        <span> @include('partials.counter',['election' => $election])</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="p-2">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>

                    <div class="col-md-6">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mt-5">
                                <h1 class="project-count text-center" id="voted">{{ $election ->voted->count() }}</h1>
                            </div>
                            <div class="col-md-12">
                                <hr
                                    style="font-weight: bold; height:10px; background-color:#495057; border-radius:20px;">
                            </div>
                            <div class="col-md-12">
                                <h1 class="project-count text-center">{{ $election ->register->count() }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
@include('admin.layouts.clock')
@endsection
