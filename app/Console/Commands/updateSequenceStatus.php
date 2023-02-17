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
        $sequences = Sequence::all();
            foreach ($sequences as $sequence) {
                if ($sequence->end_date < now() && $sequence->end_date != Null){
                    $sequence->status = 'Ended';
                    $sequence->update();
                } else if ($sequence->end_date > now()){
                    $sequence->status = 'Ready';
                    $sequence->update();
                }
            }
    }
}
