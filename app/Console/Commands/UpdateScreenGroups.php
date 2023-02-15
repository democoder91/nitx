<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Events\ScreenAds;
use App\Jobs\CheckForExpiredSequences;
use App\Models\ScreenGroup;
use App\Models\Sequence;
class UpdateScreenGroups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'screenGroups:updateExpieredSequences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'updates screen groups to the default sequence when the sequence is expired';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $screenGroups = ScreenGroup::all();
            foreach ($screenGroups as $screenGroup) {
                $sequence = Sequence::find($screenGroup->sequence_id);
                if ($sequence != null) {
                    if ($sequence->end_date < now() && $sequence->name != 'Default Sequence'){
                        
                        $screenGroup->sequence_id = Sequence::where('name', 'Default Sequence')->first()->id;
                        $screenGroup->update();
                    }
                }
                
            }
    }
}
