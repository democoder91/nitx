<?php

namespace App\Console\Commands;

use App\Events\ScreenAds;
use App\Models\Screen;
use Illuminate\Console\Command;

class updateAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateAds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $screens = Screen::all();
        $today = date('Y-m-d');

        foreach ($screens as $screen) {
            return event(new ScreenAds($screen->id,Screen::find($screen->id)->ads()->wherePivot("status", "Active")->wherePivot('from', '<=', $today)->wherePivot('to', '>=', $today)->get()));
        }
    }
}
