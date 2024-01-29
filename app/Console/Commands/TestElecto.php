<?php

namespace App\Console\Commands;

use App\Models\Election;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kutia\Larafirebase\Facades\Larafirebase;

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

        Mail::raw('Hello Electo!', function ($msg) {
            $msg->to('brytphp@gmail.com')->subject('Test Electo Email');
            // $msg->to('brytphp@gmail.com')->subject('Test Electo Email');
        });

        return true;
        exit();
    }
}
