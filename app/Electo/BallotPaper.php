<?php

namespace App\Electo;

use App\Models\Election;
use App\Models\Position;
use Illuminate\Support\Facades\Cache;

class BallotPaper
{
    protected $election;

    public function __construct()
    {
        $this->election = Cache::remember('election', 2700, function () {
            return Election::first();
        });
        // $this->election = Election::first();
    }

    public function ballotPaper()
    {
        $data = $this->election
            ->select($this->fields()['election'])
            ->first();

        $first_position = $position = $this->election->positions()
            ->select($this->fields()['position'])
            ->where('is_active', 1)
            ->first();

        $candidates = $this->election->positions()->first()->candidates()
            ->select($this->fields()['candidate'])
            ->where('is_active', 1)
            ->get();

        if (request()->position != $position->pid) {
            $position = Position::select($this->fields()['position'])->findOrFail(request()->position);
            $candidates = Position::findOrFail(request()->position)->candidates()->select($this->fields()['candidate'])->get();
        }

        $data = [
            'election' => $data,
            'position' => $position,
            'positions' => $this->election->positions()->select($this->fields()['position'])->get(),
            'candidates' => $candidates,
            'first' => $first_position,
        ];

        $next = $this->nextPosition($data['positions'], $data['position']->pid);
        $back = $this->previousPosition($data['positions'], $data['position']->pid);

        return [
            'data' => $data,
            'next' => $next,
            'back' => $back,
        ];
    }

    public function nextPosition($positions, $currentPosition)
    {
        $nextPosition = $currentPosition;

        for ($i = 0; $i < count($positions); $i++) {
            if ($positions[$i]['pid'] == $currentPosition) {
                $index = $i + 1;
                if (count($positions) != $index) {
                    $nextPosition = $positions[$index]['pid'];
                } else {
                    $nextPosition = 'confirm';
                }
            }
        }

        return $nextPosition;
    }

    public function previousPosition($positions, $currentPosition)
    {
        $nextPosition = $currentPosition;

        for ($i = 0; $i < count($positions); $i++) {
            if ($positions[$i]['pid'] == $currentPosition) {
                if ($i > 0) {
                    $index = $i - 1;
                    if (count($positions) != $index) {
                        $nextPosition = $positions[$index]['pid'];
                    } else {
                        $nextPosition = 'confirm';
                    }
                }
            }
        }

        return $nextPosition;
    }

    protected function fields()
    {
        return [
            'election' => [
                'id as eid',
                'election',
                'start_date as start',
                'end_date as end',
            ],
            'position' => [
                'id as pid',
                'election_id as eid',
                'position',
                'slug',
                'can_skip',
                'votes_per_voter as chances',
                'unopposed',
                'next',
                'skip',
                'previous',
                'unopposed',
            ],
            'candidate' => [
                'id',
                'election_id as eid',
                'position_id as pid',
                'first_name',
                'other_names',
            ],
        ];
    }
}
