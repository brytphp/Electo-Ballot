<?php

namespace App\Console\Commands;

use App\Events\ImportEvent;
use App\Mail\RemainderMail;
use App\Models\Election;
use App\Models\Reminder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kutia\Larafirebase\Facades\Larafirebase;
use PragmaRX\Countries\Package\Countries;

class TestElecto extends Command
{
    protected $settings;

    protected $election;

    protected $notification;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'electo:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->settings = $settings;
        // $this->election = Election::first();
        $this->notification = Firebase::messaging();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        // $tag = exec('npm -v');

        // die($tag);

        $tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

        $message = CloudMessage::fromArray([
            'token' => $tokens[0],
            'notification' => [
                'title' => 'Electo',
                'body' => 'Hello World',
            ],
        ]);

        $this->notification->send($message);

        // Larafirebase::withTitle('Test')
        //     ->withBody('Test body')
        //     ->sendMessage($tokens);

        // Larafirebase::withTitle('Test Title')
        //     ->withBody('Test body')
        //     ->sendNotification($tokens);

        dd($tokens[0]);

        dd(sms_deliverability());

        $countries = new Countries();
        $all = $countries->all();
        dd($all);

        event(new ImportEvent('Register Import Completed'));

        return true;
        exit();

        Mail::raw('Hello Electo!', function ($msg) {
            $msg->to('brytphp@gmail.com')->subject('Test Electo Email');
            // $msg->to('brytphp@gmail.com')->subject('Test Electo Email');
        });

        return true;
        exit();

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

                if (! empty($message->sms)) {
                    send_sms($message->phone, $message->sms);
                }

                if (! empty($message->mail)) {
                    Mail::to($message->email)->send(new RemainderMail($message));
                }

                $message->update([
                    'status' => 1,
                ]);
                // sleep(1);
                usleep(500000);
                // echo Carbon::now() .  PHP_EOL;
            }
        }

        exit();
    }
}
