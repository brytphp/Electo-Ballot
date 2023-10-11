<html>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PDF</title>

<head>
    <style>
        /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }

        html {
            color: rgba(207, 206, 205, 0.93);
            /* text-transform: uppercase; */
            /* font-size: 10px; */
        }

        .db {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 13px;
        }

        td {
            padding-left: 5px;
            height: 30px;
        }

        .page-break {
            page-break-after: always;
        }


        body {
            counter-increment: pageplus1, page;
            counter-reset: pageplus1 1;
        }

        #footer {
            position: fixed;
            left: 20px;
            bottom: 0;
            text-align: center;
        }


        #watermark {
            position: fixed;
            width: 382px;
            height: 470px;
            margin-left: 28%;
            margin-top: 50%;
            opacity: .07;
            font-size: 100px;
            -webkit-transform: rotate(-30deg);
            -moz-transform: rotate(-30deg);
            /* opacity: 0.02; */
        }

        .table-text {
            text-transform: uppercase;
            text-align: left;
            border: 1px dashed #c1c2c3;
            color: {{ config('electo_settings.pdf_table_text_color') }};
            font-weight: bold;
        }

        .position {
            text-align: left;
            height: 10px;
            /* border: 1px dashed #c1c2c3; */
            /* background-color: black; */
            color: black;
            font-size: 25px;
            padding-bottom: 5px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        .candidate {
            border: 1px dashed #c1c2c3;
            color: {{ config('electo_settings.pdf_table_text_color') }};
            height: 00px;
        }


        #outer-circle {
            background: #000104;
            border-radius: 20%;
            height: 28px;
            width: 28px;
            position: relative;
            /*
    Child elements with absolute positioning will be
    positioned relative to this div
   */
        }

        #inner-circle {
            position: absolute;
            background: rgb(255, 253, 253);
            border-radius: 10%;
            height: 20px;
            width: 20px;
            /*
    Put top edge and left edge in the center
   */
            top: 50%;
            left: 50%;
            margin: -10px -10px -100px -10px;
            /*
    Offset the position correctly with
    minus half of the width and minus half of the height
   */
        }



        div.main_position {
            border-radius: 20%;
            /* border: 1px solid red; */
        }

        .circle1 {
            position: relative;
            width: 30px;
            height: 30px;
            background-color: {{ config('electo_settings.pdf_table_header_background_color') }};
        }

        .circle2 {
            transform: translate(25%, 25%);
            width: 20px;
            height: 20px;
            background-color: rgb(255, 255, 255);
        }

        .circle3 {
            transform: translate(48%, 46%);
            width: 10px;
            height: 10px;
            background-color: {{ config('electo_settings.pdf_table_header_background_color') }};
        }


        hr.style-seven {
            overflow: visible;
            /* For IE */
            padding: 0;
            border: none;
            border-top: medium double #333;
            color: #333;
            text-align: center;
        }

        hr.style-seven:after {
            /* content: "§"; */
            display: inline-block;
            position: relative;
            top: -0.7em;
            font-size: 1.5em;
            padding: 0 0.25em;
            background: white;
        }


        .table-head {
            padding-left: 5px;
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        {{-- @if (!$election->pdf_header)
                <h3 style="text-align: center">{{ $election->election }} Results</h3>
            @else
                <div style="text-align: center">
                    {!! html_entity_decode($election->pdf_header) !!}
                </div>
            @endif --}}

        {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/pdf-header.png'))) }}"
            width="100%" height="100%" /> --}}

        <table style="width:100%; background-color:{{ config('electo_settings.pdf_header_background_color') }};">
            <tr>
                <th colspan="3"
                    style="height: 80px; color:{{ config('electo_settings.pdf_header_info_color') }}; padding-top:20px;">


                    <h1>
                        {{-- <span style="text-align: center">
                            <img style="pdf_logo_height:{{ config('electo_settings.pdf_logo_pdf_logo_height') }}px; width:{{ config('electo_settings.pdf_logo_width') }}px;"
                                src="{{ base_path('public/theme/images/logo-dark.png') }}" />
                        </span>
                        <br> --}}


                        {{ $election->election }}
                        {{-- <br>
                        <small>{{ $election->election }}</small> --}}

                        <hr>
                    </h1>

                </th>
            </tr>
            <tr style="padding-bottom:100px;">
                <th
                    style="height: 40px; color:{{ config('electo_settings.pdf_header_info_color') }}; padding-bottom:10px; padding-left:50px; text-align:left">
                    Phone:{{ config('electo_settings.institution_phone') }}

                </th>
                <th
                    style="height: 40px; color:{{ config('electo_settings.pdf_header_info_color') }}; padding-bottom:10px; paddingleft:50px; text-align:center">
                    Email:{{ config('electo_settings.institution_email') }}
                    <br>Address: {{ config('electo_settings.institution_address') }}

                </th>
                <th
                    style="height: 40px; color:{{ config('electo_settings.pdf_header_info_color') }}; padding-bottom:10px; padding-right:50px; text-align:right">
                    Website: {{ config('electo_settings.institution_website') }}

                </th>
            </tr>

        </table>
    </header>

    <footer style="text-align: center; color:red">
        <div id="footer">
            <p class="page"></p>
        </div>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div class="invoice-box">

            {{-- <div id='watermark'> <img src="{{ base_path('public/theme/images/logo-dark.png') }}" /></div> --}}
            <div id='watermark'>ORIGINAL</div>


            <table>
                <tr>
                    <td>
                        <table style="width: 100%">
                            <tr>
                                <td colspan="2" style="padding-top:70px;"></td>
                            </tr>

                            <tr>
                                <td colspan="2"
                                    style="text-align:left;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:white;  ">
                                    <span class="db">General Information</span>
                                </td>
                            </tr>


                            <tr>
                                <td width="50%" class="table-text">
                                    Election
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->election }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    Positions
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->positions->count() }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    Candidates
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->contestants->count() }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    Start Date
                                </td>
                                <td width="50%" class="table-text">
                                    {{ strtoupper($election->start_date->format('d M Y h:m A')) }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    End Date
                                </td>
                                <td width="50%" class="table-text">
                                    {{ strtoupper($election->end_date->format('d M Y h:m A')) }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    Total {{ voters_name }}
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->register->count() }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    Total Verified {{ voters_name }}
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->verified_voters->count() }}
                                </td>
                            </tr>

                            <tr>
                                <td width="50%" class="table-text">
                                    {{ $election->voters_name }} Turnout
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->voted->count() }}
                                </td>
                            </tr>

                            {{-- <tr>
                                <td width="50%" class="table-text">
                                    Total Vote Cast
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->total_vote_cast->count() }}
                                </td>
                            </tr> --}}

                            <tr>
                                <td width="50%" class="table-text">
                                    Percentage Turnout
                                </td>
                                <td width="50%" class="table-text">
                                    {{ round(($election->voted->count() / $election->register->count()) * 100, 2) }}%
                                </td>
                            </tr>




                            <tr>
                                <td width="50%" class="table-text">
                                    Total Skipped Votes
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->skipped_votes->count() }}
                                </td>
                            </tr>

                            {{-- <tr>
                                <td width="50%" class="table-text">
                                    #Ref.
                                </td>
                                <td width="50%" class="table-text">
                                    {{ $election->ref }}
                                </td>
                            </tr> --}}

                            @if ($qr_code != null)
                                <tr>
                                    <td width="50%" class="table-text">
                                        QR
                                    </td>
                                    <td width="50%" class="table-text">
                                        {!! $qr_code !!}
                                    </td>
                                </tr>
                            @endif





                        </table>
                    </td>
                </tr>

                @foreach ($election->positions as $order => $position)
                    <tr style="">
                        <td>
                            <div class="page-break"></div>
                        </td>
                    </tr>

                    <div id='watermark'>ORIGINAL</div>

                    <tr>
                        <td>
                            <table style="width: 100%; padding-top:70px;">
                                <tr>
                                    <td class="position" style="width:30px;">
                                        <div class="circle1 main_position">
                                            <div class="circle2 main_position">
                                                <div class="circle3 main_position">
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <div id="outer-circle">
                                            <div id="inner-circle">
                                            </div>
                                        </div> --}}
                                    </td>
                                    <td class="position">
                                        <span
                                            style="color: {{ config('electo_settings.pdf_table_header_background_color') }}">{{ $position->position }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <hr class="style-seven">
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="2">
                                        <table style="width: 100%;  ">
                                            <tr>

                                                <td colspan="2"
                                                    style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }}; width:15px;">
                                                    <span class="table-head">#</span>
                                                </td>

                                                <td colspan="3"
                                                    style="text-align:left;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};width:500px;">
                                                    <span class="table-head">CANDIDATE</span>
                                                </td>


                                                <td colspan="2"
                                                    style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }}">
                                                    <span class="table-head">PERCENTAGE</span>
                                                </td>


                                                <td colspan="2"
                                                    style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }}">
                                                    <span class="table-head">VOTES</span>
                                                </td>



                                            </tr>

                                            @php
                                                $skipped = $position->skipped_votes->count();
                                            @endphp

                                            @foreach ($position->candidates as $key => $candidate)
                                                <tr>
                                                    <td colspan="2" style="text-align:center; width:15px;"
                                                        class="candidate">
                                                        <span class="">{{ $key + 1 }}.</span>
                                                    </td>

                                                    <td colspan="" style="text-align:left;width:30px;"
                                                        class="candidate">
                                                        <div style="height:30px; ">
                                                            <img style="width:30px; height:30px;"
                                                                src="{{ $candidate->pic }}" alt="">
                                                        </div>
                                                    </td>

                                                    <td colspan="2" style="text-align:left;width:500px;"
                                                        class="candidate">
                                                        <label>{{ $candidate->first_name }}
                                                            {{ $candidate->other_names }}</label>
                                                    </td>

                                                    <td colspan="2" style="text-align:center;" class="candidate">

                                                        @if ($candidate->tally == 0)
                                                            @php
                                                                $percentage = 0;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $percentage = @round(($candidate->tally / ($position->votes() + $skipped) ?: 1) * 100, 2);
                                                            @endphp
                                                        @endif

                                                        <div
                                                            style="width:100%; height:30px; position:relative; text-align:center;">

                                                            <div
                                                                style="width:{{ $percentage }}%; height:30px; background-color:#f7f4f4; position:absolute; left:0;">
                                                            </div>
                                                            <span
                                                                style="position:absolute;text-align:center; right:30px; top:3px">{{ $percentage }}%</span>
                                                        </div>
                                                    </td>

                                                    <td colspan="3" style="text-align:right;padding-right:10px;"
                                                        class="candidate">
                                                        <span
                                                            class="">{{ nice_number($candidate->tally) }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            @if ($skipped > 0)
                                                <tr>
                                                    <td colspan="10"
                                                        style="text-align:right;border:1px dashed #c1c2c3;  color:{{ config('electo_settings.pdf_table_header_text_color') }}; padding-right:10px">
                                                        <span class="">&nbsp;</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"
                                                        style="text-align:right;border:1px dashed #c1c2c3;  color: {{ config('electo_settings.pdf_table_text_color') }}; padding-right:10px">
                                                        <span class="table-head">NO VOTES</span>
                                                    </td>

                                                    <td colspan="2" style="text-align:center;" class="candidate">

                                                        @if ($skipped == 0)
                                                            @php
                                                                $percentage = 0;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $percentage = @round(($skipped / ($position->votes() + $skipped) ?: 1) * 100, 2);
                                                            @endphp
                                                        @endif

                                                        <div
                                                            style="width:100%; height:30px; position:relative; text-align:center;">

                                                            <div
                                                                style="width:{{ $percentage }}%; height:30px; background-color:#f7f4f4; position:absolute; left:0;">
                                                            </div>
                                                            <span
                                                                style="position:absolute;text-align:center; right:30px; top:3px">{{ $percentage }}%</span>
                                                        </div>
                                                    </td>



                                                    <td colspan="3"
                                                        style="text-align:right;padding-right:10px;border:1px dashed #c1c2c3;  color: {{ config('electo_settings.pdf_table_text_color') }};">
                                                        <span class="">{{ nice_number($skipped) }}</span>
                                                    </td>


                                                </tr>
                                            @endif


                                            @if ($election->show_total_votes_per_position)
                                                <tr>
                                                    <td colspan="10"
                                                        style="text-align:right;border:1px dashed #c1c2c3;  color:{{ config('electo_settings.pdf_table_header_text_color') }}; padding-right:10px">
                                                        <span class="">&nbsp;</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"
                                                        style="text-align:right;border:1px dashed #c1c2c3; background-color:#c1c2c31f; color:black; padding-right:10px">
                                                        <span class="table-head">TOTAL</span>
                                                    </td>

                                                    <td colspan="2"
                                                        style="text-align:center;border:1px dashed #c1c2c3; background-color:#c1c2c31f; color:black">
                                                        <span class="">&nbsp;</span>
                                                    </td>

                                                    <td colspan="3"
                                                        style="text-align:right;padding-right:10px;border:1px dashed #c1c2c3; background-color:#c1c2c31f; color:black">
                                                        <span
                                                            class="">{{ nice_number($position->votes() + $skipped) }}</span>
                                                    </td>


                                                </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>



                                <tr>
                                    <td colspan="2" style="padding-top: 50px;">
                                        <table style="width: 100%">
                                            @if ($position->top_candidates()->count() == $position->votes_per_voter)
                                                <tr>
                                                    <td colspan="2"
                                                        style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};">
                                                        <span class="">#</span>
                                                    </td>

                                                    <td colspan="3"
                                                        style="text-align:left;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};;width:500px;">
                                                        <span class="table-head">
                                                            {{ $position->top_candidates()->count() > 1 ? 'CANDIDATES' : 'CANDIDATE' }}
                                                            ELECTED</span>
                                                    </td>

                                                    <td colspan="2"
                                                        style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};">
                                                        <span class="table-head">PERCENTAGE</span>
                                                    </td>

                                                    <td colspan="2"
                                                        style="text-align:left;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};">
                                                        <span class="table-head">VOTES</span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="2"
                                                        style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};">
                                                        <span class="table-head">#</span>
                                                    </td>

                                                    <td colspan="3"
                                                        style="text-align:left;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};;width:500px;">
                                                        <span class="table-head">
                                                            RUNOFF
                                                            {{-- {{ $position->top_candidates()->count() > 1 ? 'CANDIDATES' : 'CANDIDATE' }} --}}
                                                        </span>
                                                    </td>

                                                    <td colspan="2"
                                                        style="text-align:center;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};">
                                                        <span class="table-head">PERCENTAGE</span>
                                                    </td>

                                                    <td colspan="2"
                                                        style="text-align:left;border:1px dashed #c1c2c3; background-color:{{ config('electo_settings.pdf_table_header_background_color') }}; color:{{ config('electo_settings.pdf_table_header_text_color') }};">
                                                        <span class="table-head">VOTES</span>
                                                    </td>



                                                </tr>
                                            @endif


                                            @foreach ($position->top_candidates as $key => $candidate)
                                                <tr>
                                                    <td colspan="2" style="text-align:center; width:15px;"
                                                        class="candidate">
                                                        <span class="">{{ $key + 1 }}.</span>
                                                    </td>

                                                    <td colspan="" style="text-align:left;width:30px;"
                                                        class="candidate">
                                                        <div style="height:30px;">
                                                            <img style="width:30px; height:30px;"
                                                                src="{{ $candidate->pic }}" alt="">
                                                        </div>
                                                    </td>

                                                    <td colspan="2" style="text-align:left;width:500px;"
                                                        class="candidate">
                                                        <label>{{ $candidate->first_name }}
                                                            {{ $candidate->other_names }}</label>
                                                    </td>

                                                    <td colspan="2" style="text-align:center;" class="candidate">

                                                        @if ($candidate->tally == 0)
                                                            @php
                                                                $percentage = 0;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $percentage = @round(($candidate->tally / ($position->votes() + $skipped) ?: 1) * 100, 2);
                                                            @endphp
                                                        @endif

                                                        <div
                                                            style="width:100%; height:30px; position:relative; text-align:center;">

                                                            <div
                                                                style="width:{{ $percentage }}%; height:30px; background-color:#f7f4f4; position:absolute; left:0;">
                                                            </div>
                                                            <span
                                                                style="position:absolute;text-align:center; right:30px; top:3px">{{ $percentage }}%</span>
                                                        </div>
                                                    </td>



                                                    <td colspan="2" style="text-align:right;padding-right:10px;"
                                                        class="candidate">
                                                        <span
                                                            class="">{{ nice_number($candidate->tally) }}</span>
                                                    </td>


                                                </tr>
                                            @endforeach


                                        </table>
                                    </td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                @endforeach

            </table>

        </div>
    </main>


</body>

</html>
