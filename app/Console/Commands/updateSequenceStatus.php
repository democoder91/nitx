<?php

namespace App\Console\Commands;

use App\Constants\Status;
use App\Events\BroadcastScreenMedia;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use App\Services\SequenceService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class updateSequenceStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sequence:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update sequence status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sequences = Sequence::all();
        $sequences = Sequence::all();
            foreach ($sequences as $sequence) {
                SequenceService::updateSequenceStatus($sequence);
                $sequence->update();

                
            }
    }
}
