<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('queue:restart')->hourly();
        // $schedule->command('queue:work --tries=3')->runInBackground()->withoutOverlapping()->everyMinute();

        $schedule->command('pusher:push')->runInBackground()->withoutOverlapping()->everyMinute();

        $schedule->command('election:automatic')->runInBackground()->withoutOverlapping()->everyMinute();
        $schedule->command('remind:voters')->runInBackground()->withoutOverlapping()->everyMinute();

        // $schedule->command('inspire')->hourly();
    }

    protected function shortSchedule(\Spatie\ShortSchedule\ShortSchedule $shortSchedule)
    {
        $shortSchedule->command('check:phone')->everySeconds(5);
        // $shortSchedule->command('electo:simulate')->everySeconds(5);
        $shortSchedule->command('election:automatic')->everySecond();

        // // this artisan command will run every second
        // $shortSchedule->command('pusher:push')->everySecond();
        // $shortSchedule->command('remind:voters')->everySecond();
        // this artisan command will run every second, its signature will be resolved from container
        // $shortSchedule->command(\Spatie\ShortSchedule\Tests\Unit\TestCommand::class)->everySecond();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
