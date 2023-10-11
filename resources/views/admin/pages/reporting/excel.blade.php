@if (!$election->pdf_header)
    <h3>
        {{ $election->election }} Results</h3>
@else
    <div>
        {!! html_entity_decode($election->pdf_header) !!}
    </div>
@endif



<table style="padding-top:20px;">
    <thead>
        <tr>
            <th>Election</th>
            <td>{{ $election->election }}</td>
        </tr>
        <tr>
            <th>No. Positions</th>
            <td>{{ $election->positions->count() }}</td>
        </tr>
        <tr>
            <th>No. Candidates</th>
            <td>{{ $election->contestants->count() }}</td>
        </tr>
        <tr>
            <th>Duration</th>
            <td>{{ $election->start_date->format('d M Y h:m:s a') }} -
                {{ $election->end_date->format('d M Y h:m:s a') }}</td>
        </tr>
        <!-- <tr>
                    <th>System Duration</th>
                    <td >{{ $election->app_start_date->format('d M Y h:m:s a') }} - {{ $election->app_end_date->format('d M Y h:m:s a') }}</td>
                </tr> -->
        <tr>
            <th>Total {{ $election->voters_name }}</th>
            <td>{{ $election->register->count() }}</td>
        </tr>
        <tr>
            <th>Total Verified {{ $election->voters_name }}</th>
            <td>{{ $election->verified_voters->count() }}</td>
        </tr>
        <tr>
            <th>Total {{ $election->voters_name }} Turnout</th>
            <td>{{ $election->voted->count() }}</td>
        </tr>
        <tr>
            <th>Total Vote Cast</th>
            <td>{{ $election->total_vote_cast->count() }} </td>
        </tr>
        <tr>
            <th>Percentage Turnout</th>
            <td>{{ round(($election->voted->count() / $election->register->count()) * 100, 2) }}% </td>
        </tr>

        <tr>
            <th>Total No Votes</th>
            <td>{{ $election->skipped_votes->count() }}</td>
        </tr>

        <tr>
            <th>#Ref.</th>
            <td>{{ $election->ref }}</td>
        </tr>
    </thead>
</table>





{{-- Loop through Positions --}}
@foreach ($election->positions as $position)
    <h2>{{ $position->position }}</h2>


    @php
        $skipped = $position->skipped_votes->count();
    @endphp


    <table>
        <thead>
            <tr>
                <th><strong>#</strong></th>
                <th><strong>CANDIDATE</strong></th>
                <th><strong>VOTES</strong></th>
                <th><strong>PERCENTAGE</strong></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($position->candidates as $key => $candidate)
                <tr>
                    <td class="no" style="text-align:center">{{ $key + 1 }}</td>
                    <td>
                        <h3>{{ $candidate->first_name }} {{ $candidate->other_names }}</h3>
                    </td>
                    <td class="unit" style="text-align:center">{{ $candidate->tally }}</td>
                    <td style="text-align:center">

                        @if ($candidate->tally == 0)
                            0%
                        @else
                            {{ @round(($candidate->tally / ($position->votes() + $skipped) ?: 1) * 100, 2) }}%
                        @endif


                    </td>
                </tr>
            @endforeach

            @if ($skipped > 0)
                <tr>
                    <td class="no" style="text-align:center"><strong>No</strong></td>
                    <td class="desc"> &nbsp; </td>
                    <td class="unit" style="text-align:center"><strong>{{ $skipped }}</strong></td>
                    <td class="desc" style="text-align:center">
                        @if ($skipped == 0)
                            0%
                        @else
                            {{ @round(($skipped / ($position->votes() + $skipped) ?: 1) * 100, 2) }}%
                        @endif
                    </td>
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


    @if ($position->top_candidates()->count() == $position->votes_per_voter)
        <table>
            <thead>
                <tr>
                    <th>
                        {{ $position->top_candidates()->count() > 1 ? 'CANDIDATES' : 'CANDIDATE' }} ELECT</th>
                </tr>
            </thead>
        </table>

        <table>
            <thead>
                <tr>
                    <th class="no"><strong>#</strong> </th>
                    <th style="width:50%"><strong>CANDIDATE</strong></th>
                    <th class="unit"><strong>VOTES</strong></th>
                    <th style="text-align:center"><strong>PERCENTAGE</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($position->top_candidates as $key => $candidate)
                    <tr>
                        <td class="no" style="text-align:center">{{ $key + 1 }}</td>
                        <td>
                            <h3>{{ $candidate->first_name }} {{ $candidate->other_names }}</h3>
                        </td>
                        <td class="unit" style="text-align:center">{{ $candidate->tally }}</td>
                        <td style="text-align:center">

                            @if ($candidate->tally == 0)
                                0%
                            @else
                                {{ @round(($candidate->tally / $position->votes()) * 100, 2) }}%
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <table>
            <thead>
                <tr>
                    <th class="no" style="text-align:left;"><strong>
                            {{ $position->top_candidates()->count() > 1 ? 'CANDIDATES' : 'CANDIDATE' }} ELECTED
                        </strong>
                        <span style="text-align:right; color:red">(Runoff)</span>
                    </th>
                </tr>
            </thead>
        </table>

        <table>
            <thead>
                <tr>
                    <th class="no"><strong>#</strong></th>
                    <th style="width:50%"><strong>CANDIDATE</strong></th>
                    <th class="unit"><strong>VOTES</strong></th>
                    <th style="text-align:center"><strong>PERCENTAGE</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($position->top_candidates as $key => $candidate)
                    <tr>
                        <td class="no" style="text-align:center">{{ $key + 1 }}</td>
                        <td>
                            <h3>{{ $candidate->first_name }} {{ $candidate->other_names }}</h3>
                        </td>
                        <td class="unit" style="text-align:center">{{ $candidate->tally }}</td>
                        <td class="desc" style="text-align:center">
                            @if ($candidate->tally == 0)
                                0%
                            @else
                                {{ @round(($candidate->tally / ($position->votes() + $skipped) ?: 1) * 100, 2) }}%
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endforeach
