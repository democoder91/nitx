<?php

namespace App\Console\Commands;

use App\Models\Sequence;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
        foreach ($sequences as $sequence) {
            if (!$sequence->run_for_ever) {
                $date1 = Carbon::createFromFormat('Y-m-d', $sequence->end_date)->startOfDay();
                $date2 = Carbon::now()->endOfDay();
                if ($date1->lte($date2)) {
                    $sequence->update([
                        'status' => 'ended'
                    ]);
                }
            }
        }
    }
}
