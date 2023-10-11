@extends('admin.layouts.app')

@section('css')
    <script>
        window.config = {
            election_history: @json($election_history),
            device: @json($device),
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="text-primary font-weight-medium">Past Elections</h4>
                                <h4 class="mb-0">{{ nice_number($stats['past_elections']) }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm rounded-circle bg-electo-yellow align-self-center">
                                <span class="avatar-title">
                                    <i class="fas fa-history font-size-24 text-electo-yellow"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="text-primary font-weight-medium">Total {{ $election->voters_name }}</h4>
                                <h4 class="mb-0">{{ nice_number($stats['total_voters']) }}</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="fas fa-users font-size-24 text-electo-yellow"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="text-primary font-weight-medium">Total Vote Cast</h4>
                                <h4 class="mb-0">{{ nice_number($stats['total_vote_cast']) }}</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="mdi mdi-thumb-up font-size-24 text-electo-yellow"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="text-primary font-weight-medium">Total Vote Cast</h4>
                                <h4 class="mb-0">{{ nice_number($stats['total_vote_cast']) }}</h4>
                            </div>

                            <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                <span class="avatar-title rounded-circle bg-primary">
                                    <i class="bx bx-purchase-tag-alt font-size-24 text-electo-yellow"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-9">
                <div class=" h-100">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row no-gutters">
                                <div class="col-lg-9">
                                    @if (\App\Models\History::count() == 0)
                                        <div class="text-center mt-5"><img src="{{ asset('svg/chart.svg') }}"
                                                class="img-fluid my-4" style="width: 50%" alt=""></div>
                                    @else
                                        <election-history></election-history>
                                    @endif

                                </div>

                                <div class="col-lg-3">
                                    {{-- <img src="{{ asset('svg/setup2.svg') }}" alt="" style="width:200px;"
                                        class="img-fluid mt-5"> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="border-bottom hover mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h4 class="text-primary font-weight-medium">Past Elections</h4>
                                                            <h4 class="mb-0">{{ nice_number($stats['past_elections']) }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="border-bottom hover mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h4 class="text-primary font-weight-medium">Total
                                                                {{ $election->voters_name }}</h4>
                                                            <h4 class="mb-0">{{ nice_number($stats['total_voters']) }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="border-bottom hover mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body">
                                                            <h4 class="text-primary font-weight-medium">Total Vote Cast
                                                            </h4>
                                                            <h4 class="mb-0">
                                                                {{ nice_number($stats['total_vote_cast']) }}
                                                            </h4>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="border-bottom hover mini-stats-wid">
                                                <div class="card-body">
                                                    <div class="media">
                                                        <div class="media-body"> <voter-turnout></voter-turnout>

                                                            <h4 class="mb-0 text-danger">
                                                                56.5%
                                                            </h4>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="table-responaive">
                                <table class="table table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="2"><a href="#"> Percentage Turnout</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $records = \App\Models\History::latest()->get();
                                            $max_turnout = $records[0]?->percentage_turnout ?? 0;
                                        @endphp

                                        @foreach ($records as $key => $history)
                                            @php

                                                if ($history->percentage_turnout > $max_turnout) {
                                                    $color = 'text-success';
                                                    $max_turnout = $history->percentage_turnout;
                                                } else {
                                                    $color = 'text-danger';
                                                }

                                            @endphp
                                            <tr>
                                                <td class="text-truncate">{{ $history->election }}</td>
                                                <br>
                                                <td class="{{ $color }} text-truncate">
                                                    <b>{{ $history->percentage_turnout }}%
                                                    </b>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3">
                <div class=" h-100">
                    <div class="card">
                        <div class="bgprimary">
                            <div class="row mt-2">
                                <div class="col-9">
                                    <div class="text-primary p-3">
                                        <h5 class="textwhite text-truncate">{{ $election->election }}</h5>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="avatar-sm">
                                        <img src="{{ $election->logo }}" alt=""
                                            class=" mt-1 img-thumbnail rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mt-auto">
                                    </div>

                                    <div class="pt-0">
                                        <div class="row">
                                            <div class="col-4 text-center">
                                                <h5 class="font-size-15">{{ nice_number($election->positions->count()) }}
                                                </h5>
                                                <p class="text-muted text-bold mb-0"><a
                                                        href="{{ route('admin.ballot.position.index') }}"><b>&nbsp;
                                                            Positions</b></a>
                                                </p>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h5 class="font-size-15">
                                                    {{ nice_number($election->contestants->count()) }}
                                                </h5>
                                                <p class="text-muted mb-0 overflow-hidden"><a
                                                        href="{{ route('admin.ballot.candidate.index') }}"><b
                                                            style="overflow: hidden">Candidates</b></a></p>
                                            </div>
                                            <div class="col-4 text-center">
                                                <h5 class="font-size-15">{{ nice_number($election->register->count()) }}
                                                </h5>
                                                <p class="text-muted mb-0 overflow-hidden"><a
                                                        href="{{ route('admin.register.index') }}"><b>{{ $election->voters_name }}</b></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body border-top border-primary">
                            @php
                                $status = election_status($election);
                            @endphp

                            <div class="row">
                                <div class="col-12">
                                    <div class="text-primary">
                                        <h5 class="text-uppercase text-{{ $status['class'] }} text-truncate">
                                            {{ $status['status'] }}</h5>
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <div id="radialBar-chart" class="apex-charts"></div>

                                <a href="{{ setup_progress()['url'] }}"
                                    class="btn btn-block btn-outline-primary waves-effect waves-light btn-sm">
                                    {{ setup_progress()['text'] }}
                                    <i class="mdi mdi-arrow-right ml-1"></i></a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if (\App\Models\History::count() == 0)
                            <div class="text-center mt-5"><img src="{{ asset('svg/chart.svg') }}" class="img-fluid my-4"
                                    style="width: 50%" alt=""></div>
                        @else
                            <device-statistics></device-statistics>
                        @endif
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>


    </div>
@endsection


@section('scripts')
    <script src="{{ asset('theme/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        var options = {
                chart: {
                    height: 59,
                    type: "bar",
                    stacked: !0,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !0
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "15%",
                        endingShape: "rounded"
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                series: [{
                    name: "Series A",
                    data: [44, 55, 41, 67, 22, 43, 36, 52, 24, 18, 36, 48]
                }, {
                    name: "Series B",
                    data: [13, 23, 20, 8, 13, 27, 18, 22, 10, 16, 24, 22]
                }, {
                    name: "Series C",
                    data: [11, 17, 15, 15, 21, 14, 11, 18, 17, 12, 20, 18]
                }],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                },
                colors: ["#556ee6", "#f1b44c", "#34c38f"],
                legend: {
                    position: "bottom"
                },
                fill: {
                    opacity: 1
                }
            },
            chart = new ApexCharts(document.querySelector("#stacked-column-chart"), options);
        chart.render();
        options = {
            chart: {
                height: 200,
                type: "radialBar",
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {
                            fontSize: "13px",
                            color: void 0,
                            offsetY: 60
                        },
                        value: {
                            offsetY: 22,
                            fontSize: "16px",
                            color: void 0,
                            formatter: function(e) {
                                return e + "%"
                            }
                        }
                    }
                }
            },
            colors: @json(setup_progress()['color']),
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: .15,
                    inverseColors: !1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                }
            },
            stroke: {
                dashArray: 3
            },
            series: @json(setup_progress()['percentage']),
            labels: ["Setup Progress"]
        };
        (chart = new ApexCharts(document.querySelector("#radialBar-chart"), options)).render();
    </script>
@endsection
