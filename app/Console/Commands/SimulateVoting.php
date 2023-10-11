<?php

namespace App\Console\Commands;

use App\Events\DrawChart;
use App\Events\TotalVotesCast;
use App\Models\Election;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SimulateVoting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'electo:simulate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulate election';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $voters = User::whereAccess_role('user')->inRandomOrder()->limit(rand(1, 50))->whereNull('voted_at')->get();
        $election = Election::first();

        foreach ($voters as $voter) {
            $status = [0, 1][rand(0, 1)];

            foreach ($election->positions as $key => $position) {
                $votes = $position->candidates()->inRandomOrder()->pluck('id');
                $votes = collect($votes)->random($position->votes_per_voter)->toArray();

                foreach ($votes as $candidate) {

                    Vote::updateOrCreate([
                        'user_id' => $voter->id,
                        'position_id' => $position->id,
                        'candidate_id' => $candidate,
                        'election_id' => $election->id,
                    ], [
                        'confirmed' => 1,
                        'status' => $status,

                    ]);

                    // echo $position->position . '. ' . $candidate->first_name . PHP_EOL;
                }
                echo $position->position.'. '.$position->votes_per_voter.PHP_EOL;
            }

            if ($status == 1) {
                $voter->update([
                    'voted_at' => Carbon::now(),
                ]);
            }
        }

        try {
            event(new TotalVotesCast($election));
            event(new DrawChart($election));
        } catch (\Throwable $th) {
            //throw $th;
        }

        return 0;
    }
}
