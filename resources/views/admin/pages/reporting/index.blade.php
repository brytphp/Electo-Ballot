@extends('admin.layouts.app')


@section('title', 'Dashboard | ' . $election->election)

@section('content')
    <div class="row">
        <div class="col-xl-9">
            <div>
                <live-chart ref="election_live_chart" timing="{{ election_status($election)['date'] }}"></live-chart>
            </div>

        </div>

        <div class="col-xl-3">
            <div class="card overflow-hidden  mini-stats-wid h-100">
                <div class="bg-electo">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-white p-3">
                                <h5 class="text-white">{{ $election->election }}</h5>
                                <status-update ref="status_update" is_sealed="{{ $election->is_sealed }}"
                                    is_active="{{ $election->is_active }}"></status-update>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="avatar-md profile-user-wid mb-0">
                        <img src="{{ $election->logo }}" alt="" class="img-thumbnail rounded-circle">
                    </div>

                    <div class="media">
                        <div class="media-body">
                            <h4 class="mb-0 text-success">@include('partials.counter', ['election' => $election])</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="bx bx-time font-size-24"></i>
                            </span>
                        </div>
                    </div>

                    <hr>
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>

                </div>

            </div>
        </div>

    </div>

@endsection

@section('scripts')
    @include('admin.layouts.clock')
@endsection
