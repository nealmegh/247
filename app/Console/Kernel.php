<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

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
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('inspire')->hourly();
        $schedule->command('upload:cleanup')
            ->dailyAt('01:00')
            ->emailOutputTo('bipon.abrar@gmail.com');
        $schedule->command('remind:trips')
            ->twiceDailyAt('1', '9')
//                ->everyMinute()
            ->emailOutputTo('bipon.abrar@gmail.com');
        $schedule->command('remind:customers')
            ->twiceDailyAt('01', '9')
//            ->everyMinute()
            ->emailOutputTo('bipon.abrar@gmail.com');
//        $schedule->command('check:drivers')
////            ->Daily('01:00')
//            ->everyMinute()
//            ->emailOutputTo('bipon.abrar@gmail.com');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
