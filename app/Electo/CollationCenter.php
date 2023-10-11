<?php

namespace App\Electo;

use App\Models\Election;
use App\Models\Position;

class CollationCenter
{
    protected $election;

    public function __construct()
    {
        $this->election = Election::first();
    }

    public function statistics()
    {
        return [
            'verified' => $this->election->verified_voters->count(),
            'voted' => $this->election->voted->count(),
            'voters' => $this->election->register->count(),
        ];
    }

    public function seriesChart()
    {
        // return Position::with('election')->get();
        if ($this->positions()->count()) {
            $series = [
                'name' => 'Position',
                'colorByPoint' => true,
                'data' => [],
            ];

            foreach ($this->positions() as $key => $position) {
                $series['data'][] = [
                    'name' => $position->position,
                    'y' => $position->votes(),
                    'color' => $position->color,
                    'drilldown' => $this->election->is_active == 0 ? $position->position : null,
                    //  'drilldown' => auth()->user()->hasAnyRole(['superuser']) ?  $position->position :  ($this->election->status == 0 ? $position->position : null),
                    // 'drilldown' => $position->position ,
                ];

                $drilldown['series'][] = [
                    'name' => $position->position,
                    'id' => $position->position,
                    'data' => $this->drillDownSeries($position->id)['drillSeries'],
                    // 'zones' => $this->drillDownSeries($position->id)['zones']
                ];
            }

            return [
                'series' => $series,
                'drilldown' => $drilldown,
                'votes' => $this->election->votes(),
            ];

            return [];
        }
    }

    private function drillDownSeries($position)
    {
        $position = Position::findOrFail($position);
        $candidates = $position->candidates;

        if ($candidates->count()) {
            foreach ($candidates as $key => $drill) {
                $drillSeries[] = [
                    $drill->first_name.' '.$drill->other_names,
                    (int) $drill->votes(),

                ];
                $zones[] = [
                    'value' => (int) $drill->votes(),
                    'color' => $drill->color,
                ];
            }

            return [
                'drillSeries' => $drillSeries,
                'zones' => $zones,
            ];

            return $drillSeries;
        }

        return [];
    }

    private function positions()
    {
        return $this->election->positions;
    }

    public function tally()
    {
        foreach ($this->election->positions()->get() as $position) {
            foreach ($position->candidates()->get() as $candidate) {
                $candidate->update([
                    'tally' => $candidate->votes(),
                ]);
            }
        }
    }
}
