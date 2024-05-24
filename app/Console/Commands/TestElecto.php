<?php

namespace App\Console\Commands;

use App\Models\Election;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $to = '0248130682';
        send_sms($to, 'test');

        exit('sent');

        $tokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();


        Mail::raw('Hello Electo!', function ($msg) {
            $msg->to('brytphp@gmail.com')->subject('Test Electo Email');
            // $msg->to('brytphp@gmail.com')->subject('Test Electo Email');
        });

        return true;
        exit();
    }
}
