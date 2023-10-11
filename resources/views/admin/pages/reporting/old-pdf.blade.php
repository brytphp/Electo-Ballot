<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        PDf</title>

    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #222D32;
            text-decoration: none;
        }

        body {
            position: relative;
            /* width: 21cm; */
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #222D32;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #222D32;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 5px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }


        table td h3 {
            color: #777777;
            font-size: 1em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            font-size: 1.2em;
            background: #DDDDDD;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
            width: 10%;
        }

        table .qty {}

        table .total {
            background: #DDDDDD;

        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr td .total {
            color: #DDDDDD;
            font-size: 1em;
            border-top: 1px solid #DDDDDD;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #222D32;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }

        #watermark {

            position: fixed;
            top: 20%;
            /* left: 30%; */
            margin-left: auto;
            margin-right: auto;

            text-align: center;
            vertical-align: middle;


            /* Change image dimensions*/
            width: 100%;
            height: 100%;

            /* Your watermark should be behind every content*/
            /* z-index: -1000; */

            opacity: 0.05;
        }

        .ql-align-center {
            margin: 2px;
            padding: 0;
        }

        hr {
            border: 0;
            border-bottom: 1px dashed rgb(255, 255, 255);
            background: rgb(0, 0, 0);
        }

    </style>
</head>

<body>

    {{-- <body style="background-image: url('{{ base_path('public/theme/images/logo.svg') }}'); background-repeat: repeat; background-size: 50px 50px; opacity:0.1; color:rgb(0, 0, 0)"> --}}

    <div id="watermark" >
        <img src="{{ base_path('public/img/logo.jpeg') }}" style="height: 50% wideth: 50%" />
    </div>

    <main>
        @if(!$election->pdf_header)
        <h3 style="text-align: center">{{ $election->election }} Results</h3>
        @else
        <div style="text-align: center">
            {!! html_entity_decode($election->pdf_header) !!}
        </div>
        @endif


        <hr>
        <table border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
            <thead>
                <tr>
                    <th class="no" style="text-align:left;">Election</th>
                    <td class="desc">{{$election->election}}</td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">No. Positions</th>
                    <td class="desc">{{$election->positions->count()}}</td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">No. Candidates</th>
                    <td class="desc">{{$election->contestants->count()}}</td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">Duration</th>
                    <td class="desc">{{ $election->start_date->format('d M Y h:m:s a')}} - {{ $election->end_date->format('d M Y h:m:s a')}}</td>
                </tr>
                <!-- <tr>
                    <th class="no" style="text-align:left;">System Duration</th>
                    <td class="desc">{{ $election->app_start_date->format('d M Y h:m:s a')}} - {{ $election->app_end_date->format('d M Y h:m:s a')}}</td>
                </tr> -->
                <tr>
                    <th class="no" style="text-align:left;">Total Voters</th>
                    <td class="desc">{{$election->register->count()}}</td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">Total Verified Voters</th>
                    <td class="desc">{{$election->verified_voters->count()}}</td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">Total Voters Turnout</th>
                    <td class="desc">{{$election->voted->count()}}</td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">Total Vote Cast</th>
                    <td class="desc">{{$election->total_vote_cast->count()}} </td>
                </tr>
                <tr>
                    <th class="no" style="text-align:left;">Percentage Turnout</th>
                    <td class="desc">{{round(($election->voted->count()/$election->register->count()*100),2)}}% </td>
                </tr>

                <tr>
                    <th class="no" style="text-align:left;">Total Skipped Votes</th>
                    <td class="desc">{{$election->skipped_votes->count()}}</td>
                </tr>

                <tr>
                    <th class="no" style="text-align:left;">#Ref.</th>
                    <td class="desc">{{$election->ref}}</td>
                </tr>
            </thead>
        </table>





        {{-- Loop through Positions --}}
        @foreach($election->positions as $position)

        <div id="watermark" >
            <img src="{{ base_path('public/img/logo.jpeg') }}" style="height: 2px; wideth: 4px;" />
        </div>

        <div class="page-break"></div>

        <h2>{{ $position->position }}</h2>
        <hr>

        @php
            $skipped = $position->skipped_votes->count();
        @endphp

        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no" style="width:5%"><strong>#</strong></th>
                    <th class="desc" style="width:50%"><strong>CANDIDATE</strong></th>
                    <th class="unit"><strong>VOTES</strong></th>
                    <th class="desc" style="text-align:center"><strong>PERCENTAGE</strong></th>
                </tr>
            </thead>
            <tbody>

                @foreach($position->candidates as $key=>$candidate)
                <tr>
                    <td class="no" style="text-align:center">{{$key+1}}</td>
                    <td class="desc">
                        <h3>{{ $candidate->first_name }} {{  $candidate->other_names  }}</h3>
                    </td>
                    <td class="unit" style="text-align:center">{{ $candidate->tally }}</td>
                    <td class="desc" style="text-align:center">

                        @if($candidate->tally==0)
                            0%
                            @else
                            {{ @round(($candidate->tally/($position->votes() + $skipped) ?: 1 )*100,2) }}%
                        @endif


                    </td>
                </tr>
                @endforeach

                @if ($skipped > 0)
                    <tr>
                    <td class="no" style="text-align:center"><strong>No/Skipped</strong></td>
                    <td class="desc"> &nbsp; </td>
                    <td class="unit" style="text-align:center"><strong>{{ $skipped }}</strong></td>
                    <td class="desc" style="text-align:center">
                        @if($skipped==0)
                        0%
                        @else
                        {{ @round(($skipped/($position->votes() + $skipped) ?: 1 )*100,2) }}%
                    @endif</td>
                    </tr>
                @endif




                <tr>
                    <td class="no" style="text-align:center"><strong>Total</strong></td>
                    <td class="desc"> &nbsp; </td>
                    <td class="unit" style="text-align:center"><strong>{{ $position->votes() + $skipped }}</strong></td>
                    <td class="desc" style="text-align:center"> &nbsp;</td>
                </tr>


            </tbody>

        </table>


        @if($position->top_candidates()->count()==$position->votes_per_voter)

        <div id="notices" style="text-align:left">
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no" style="text-align:left;">
                            {{ $position->top_candidates()->count() > 1 ? 'CANDIDATES':'CANDIDATE' }} ELECT</th>
                    </tr>
                </thead>
            </table>

            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no"><strong>#</strong> </th>
                        <th class="desc" style="width:50%"><strong>CANDIDATE</strong></th>
                        <th class="unit"><strong>VOTES</strong></th>
                        <th class="desc" style="text-align:center"><strong>PERCENTAGE</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($position->top_candidates as $key=>$candidate)
                    <tr>
                        <td class="no" style="text-align:center">{{$key+1}}</td>
                        <td class="desc">
                            <h3>{{ $candidate->first_name }} {{  $candidate->other_names  }}</h3>
                        </td>
                        <td class="unit" style="text-align:center">{{ $candidate->tally }}</td>
                        <td class="desc" style="text-align:center">

                            @if($candidate->tally==0)
                            0%
                            @else
                            {{ @round(($candidate->tally/($position->votes() + $skipped) ?: 1 )*100,2) }}%
                            @endif

                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else

        <div id="notices" style="text-align:left">
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no" style="text-align:left;"><strong>RUNOFF CANDIDATES</strong></th>
                    </tr>
                </thead>
            </table>

            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no"><strong>#</strong></th>
                        <th class="desc" style="width:50%"><strong>CANDIDATE</strong></th>
                        <th class="unit"><strong>VOTES</strong></th>
                        <th class="desc" style="text-align:center"><strong>PERCENTAGE</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($position->top_candidates as $key=>$candidate)
                    <tr>
                        <td class="no" style="text-align:center">{{$key+1}}</td>
                        <td class="desc">
                            <h3>{{ $candidate->first_name }} {{  $candidate->other_names  }}</h3>
                        </td>
                        <td class="unit" style="text-align:center">{{ $candidate->tally }}</td>
                        <td class="desc" style="text-align:center">
                            @if($candidate->tally==0)
                            0%
                            @else
                            {{ @round(($candidate->tally/($position->votes() + $skipped) ?: 1 )*100,2) }}%
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif

        @endforeach
        {{-- End Loop through Positions --}}
        <div class="page-break"></div>

        @if ($election->skipped_votes->count() > 0)
        <h2>Skipped/No Votes</h2>
        <hr>

            <table border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
                <thead>
                    @foreach ($skipped_votes as $position=>$votes)
                    <tr>
                        <th class="no" style="text-align:left;">{{ $position }}</th>
                        <td class="desc">{{count($votes)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th class="no" style="text-align:left;">Total</th>
                        <th class="desc">{{$election->skipped_votes->count()}}</th>
                    </tr>

                </thead>
            </table>
        @endif





        <div id="notices">
            <div>Generated By:</div>
            <div class="notice">Ganyo Bright</div>
            <div class="notice">{{ date('M d, Y h:m:s a ') }}</div>
        </div>

    </main>
</body>

</html>
