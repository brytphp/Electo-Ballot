<?php

namespace App\Console\Commands;

use App\Http\Controllers\Admin\Reporting\TallyController;
use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoElection extends Command
{
    protected $election;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:automatic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically run election.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->election = Election::first();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->election->is_sealed == 1 && $this->election->auto_election == 1) {
            $now = Carbon::now();
            $start = Carbon::parse($this->election->start_date);
            $end = Carbon::parse($this->election->end_date);

            if ($now->between($start, $end) && $this->election->is_active == 0) {
                $this->election->update(['is_active' => 1, 'is_sealed' => 1, 'app_start_date' => now(), 'ref' => \Uuid::generate()->string]);
                $message = $this->election->election.' Started at '.$now->format('D, d M, Y @ h:i:s a');
                // toSlack($message);
                // event(new AutomateElection($this->election, 'refresh'));

                try {
                    send_sms('0248130682', $message);
                } catch (exception $e) {
                    //code to handle the exception
                }
            }

            if ($now->isAfter($end) && $this->election->is_active == 1) {
                $this->election->update(['is_active' => 0, 'is_sealed' => 0, 'app_end_date' => now()]);
                $message = $this->election->election.' Ended at '.$now->format('D, d M, Y @ h:i:s a');
                // toSlack($message);

                // event(new AutomateElection($this->election, 'refresh'));

                try {
                    $tally = new TallyController($this->election);
                    $tally->tally();

                    send_sms('0248130682', $message);

                    // \Artisan::call('add:history');

                    \Artisan::call('backup:run');
                    send_sms('0248130682', 'System Backup successful');
                } catch (exception $e) {
                    //code to handle the exception
                }
            }

            // echo $end .  PHP_EOL;
        }

        // return toSlack('System Backup successful') .  PHP_EOL;

        return 0;
    }
}
