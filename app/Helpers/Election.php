<?php

use App\Models\Election;
use Carbon\Carbon;

function election_status($election)
{
    $now = Carbon::now();
    $start = Carbon::parse($election->start_date);
    $end = Carbon::parse($election->end_date);

    if ($now->isBefore($start)) {
        return [
            'status' => 'Upcoming',
            'class' => 'info',
            'date' => $end,
        ];
    }

    if ($now->between($start, $end) && $election->is_sealed == 1 && $election->is_active == 1) {
        return [
            'status' => 'Ongoing',
            'class' => 'success',
            'date' => $end,
        ];
    }

    if ($now->between($start, $end) && ($election->is_sealed == 0 || $election->is_active == 0)) {
        return [
            'status' => 'Pending',
            'class' => 'warning',
            'date' => $end,
        ];
    }

    if ($now->isAfter($end)) {
        return [
            'status' => 'Ended',
            'class' => 'danger',
            'date' => $end,
        ];
    }
}

function setup_progress()
{
    $election = Election::first();
    if ($election->positions->count() == 0) {
        $progress = [
            'percentage' => [20],
            'color' => ['#B20600'],
            'url' => route('admin.ballot.position.index'),
            'text' => 'Add Positions',
        ];
    } elseif ($election->contestants->count() == 0) {
        $progress = [
            'percentage' => [40],
            'color' => ['#FF6000'],
            'url' => route('admin.ballot.candidate.index'),
            'text' => 'Add Contestants',
        ];
    } elseif ($election->register->count() == 0) {
        $progress = [
            'percentage' => [60],
            'color' => ['#25316D'],
            'url' => route('admin.register'),
            'text' => 'Add '.ucwords($election->voters_name),
        ];
    } else {
        $progress = [
            'percentage' => [100],
            'color' => ['#227004'],
            'url' => route('admin.ballot.election.index'),
            'text' => 'Go Live',
        ];
    }

    return $progress;
}
