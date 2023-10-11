@extends('admin.layouts.app')

@section('css')
    <script>
        window.config = {
            election_history: @json($election_history)
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-primary p-3">
                                    <h5 class="text-white text-truncate">{{ $election->election }}</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="avatar-md profile-user-wid mb-2">
                                    <img src="{{ $election->logo }}" style="width: 150px; height:75px;" alt=""
                                        class="img-thumbnail rounded-circle">
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <div class="pt-0">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <h5 class="font-size-15">{{ nice_number($election->positions->count()) }}</h5>
                                            <p class="text-muted text-bold mb-0"><b>Positions</b></p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <h5 class="font-size-15">{{ nice_number($election->contestants->count()) }}</h5>
                                            <p class="text-muted mb-0"><b>Candidates</b></p>
                                        </div>
                                        <div class="col-4 text-center">
                                            <h5 class="font-size-15">{{ nice_number($election->register->count()) }}</h5>
                                            <p class="text-muted mb-0"><b>Voters</b></p>
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
                            <div class="col-8">
                                <div class="text-primary">
                                    <h5 class="text-uppercase text-{{ $status['class'] }} text-truncate">
                                        {{ $status['status'] }}</h5>
                                </div>
                            </div>
                            <div class="col-4 align-self-end">
                                <img src="{{ asset('svg/setup2.svg') }}" alt="" class="img-fluid">
                            </div>
                        </div>

                        <div class="text-center">
                            <div id="radialBar-chart" class="apex-charts"></div>
                            <p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
                            <a href="#" class="btn btn-block btn-primary waves-effect waves-light btn-sm">View Profile
                                <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>

                    </div>
                </div>

                <div class="card overflow-hidden">
                    <div class="bg-">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary text-truncate">{{ $election->election }}</h5>
                                    <p>Overview</p>
                                </div>
                            </div>
                            <div class="col-4 align-self-end">
                                <img src="{{ asset('svg/setup2.svg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div id="column_chart_datalabel" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Past Elections</p>
                                        <h4 class="mb-0">{{ nice_number($stats['past_elections']) }}</h4>
                                    </div>

                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-electo-yellow align-self-center">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24 text-electo-yellow"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Total Voters</p>
                                        <h4 class="mb-0">{{ nice_number($stats['total_voters']) }}</h4>
                                    </div>

                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-archive-in font-size-24 text-electo-yellow"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-muted font-weight-medium">Total Vote Cast</p>
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
                <div class="card h100">
                    <div class="card-body">
                        <div class="float-right">
                            <select class="custom-select custom-select-sm ml-2">
                                <option value="1" selected="">March</option>
                                <option value="2">February</option>
                                <option value="3">January</option>
                                <option value="4">December</option>
                            </select>
                        </div>
                        <h4 class="card-title mb-3">Wallet Balance</h4>
                        <div class="row">
                            <div class="col-lg-9">
                                <election-history></election-history>
                            </div>

                            <div class="col-lg-3">
                                <div class="mt-4">
                                    <p>Available Balance</p>
                                    <h4>$ 6134.39</h4>

                                    <p class="text-muted mb-4"> + 0.0012.23 ( 0.2 % ) <i
                                            class="mdi mdi-arrow-up ml-1 text-success"></i></p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <p class="mb-2">Income</p>
                                                <h5>$ 2632.46</h5>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mt-4">
                                        <a href="#" class="btn btn-primary btn-sm">View more <i
                                                class="mdi mdi-arrow-right ml-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection


@section('scripts')
    <script src="{{ asset('theme/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        options = {
            chart: {
                height: 350,
                type: "bar",
                toolbar: {
                    show: !1
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        position: "top"
                    }
                }
            },
            dataLabels: {
                enabled: !0,
                formatter: function(e) {
                    return e;
                    return e + " votes"
                },
                offsetY: -20,
                style: {
                    fontSize: "12px",
                    colors: ["#304758"]
                }
            },
            series: [{
                name: "Voter Turnout",
                data: @json($election_history['series_data'])
            }],
            colors: ["#F1C93B", "#1A5D1A"],
            grid: {
                borderColor: "#f1f1f1"
            },
            xaxis: {
                categories: @json($election_history['categories']),
                position: "top",
                labels: {
                    offsetY: -18
                },
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                crosshairs: {
                    fill: {
                        type: "gradient",
                        gradient: {
                            colorFrom: "#D8E3F0",
                            colorTo: "#BED1E6",
                            stops: [0, 100],
                            opacityFrom: .4,
                            opacityTo: .5
                        }
                    }
                },
                tooltip: {
                    enabled: !0,
                    offsetY: -35
                }
            },
            fill: {
                gradient: {
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: .1,
                    gradientToColors: void 0,
                    inverseColors: !0,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [50, 0, 100, 100]
                }
            },
            yaxis: {
                axisBorder: {
                    show: !1
                },
                axisTicks: {
                    show: !1
                },
                labels: {
                    show: !1,
                    formatter: function(e) {
                        return e + "%"
                    }
                }
            },
            title: {
                text: "Voter Turnout Statistics",
                floating: !0,
                offsetY: 320,
                align: "center",
                style: {
                    color: "#444"
                }
            }
        };
        (chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options)).render();



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
            colors: ["#F1C93B"],
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
            series: [90],
            labels: ["Percentage Complete"]
        };
        (chart = new ApexCharts(document.querySelector("#radialBar-chart"), options)).render();
    </script>
@endsection
