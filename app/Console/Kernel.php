<?php

namespace App\Console;

use App\Events\ScreenAds;
use App\Jobs\CheckForExpiredSequences;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('updateAds')->everyMinute();
        $schedule->command('sequence:update')->everyMinute();
        $schedule->command('screenGroups:updateExpieredSequences')->everyMinute();
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
