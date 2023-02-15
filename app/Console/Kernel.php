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
        $schedule->command('updateSequenceStatus')->everyMinute();

        // echo "Schedule is running" every minute
        $schedule->call(function () {
            // retreive all screens
            $screenGroups = ScreenGroup::all();
            foreach ($screenGroups as $screenGroup) {
                $sequence = Sequence::find($screenGroup->sequence_id);
                if ($sequence != null) {
                    if ($sequence->end_date < now()){
                        // change screen group sequence id to the default sequence id
                        $sequence->status = 'Not Active';
                        $sequence->update();
                        $screenGroup->sequence_id = Sequence::where('name', 'Default Sequence')->first()->id;
                        $screenGroup->update();
                    }
                }
                
            }
            // get all sequences
            // foreach sequence
            // if sequence end date is less than now
            // change sequence status to not active
            // else if sequence end date is greater than now
            // change sequence status to ready
            
            $sequences = Sequence::all();
            foreach ($sequences as $sequence) {
                if ($sequence != null) {
                    if ($sequence->end_date < now() && $sequence->name != 'Default Sequence'){
                        // change screen group sequence id to the default sequence id
                        $sequence->status = 'Not Active';
                        $sequence->update();
                    }else if ($sequence->end_date >= now()->date()){
                        // change screen group sequence id to the default sequence id
                        $sequence->status = 'Ready';
                        $sequence->update();
                }
                
            }
        }
        })->everyMinute();



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
