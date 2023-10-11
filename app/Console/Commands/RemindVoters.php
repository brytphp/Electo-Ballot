<?php

namespace App\Console\Commands;

ini_set('memory_limit', '2048M');

use App\Mail\RemainderMail;
use App\Models\Election;
use App\Models\Reminder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RemindVoters extends Command
{
    protected $election;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:voters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms and emails reminder to voters';

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
        if ($this->election->is_sealed == 1) {
            $messages = Reminder::whereRaw('(now() between from_date and to_date)')
                ->where(function ($query) {
                    return $query->where('sms', '!=', '')
                        ->where('mail', '!=', '');
                })
                ->whereNull('status')
                ->take(500)
                ->get();

            if ($messages->count() > 0) {
                foreach ($messages as $key => $message) {
                    // echo $key . PHP_EOL;
                    // echo Carbon::now() .  PHP_EOL;
                    // echo count($messages) . PHP_EOL;

                    try {
                        if (! empty($message->sms) && strlen($message->phone) == 10) {
                            send_sms($message->phone, $message->sms);
                        }

                        if (! empty($message->mail)) {
                            if (filter_var($message->email, FILTER_VALIDATE_EMAIL)) {
                                Mail::to($message->email)->send(new RemainderMail($message));
                            }
                        }

                        $message->update([
                            'status' => 1,
                        ]);
                        // sleep(1);
                        usleep(700000);
                    } catch (exception $e) {
                        //code to handle the exception
                    }

                    // echo Carbon::now() .  PHP_EOL;
                }
            }
        }

        return 0;
    }
}
