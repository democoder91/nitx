<?php

namespace App\Console\Commands;

use App\Events\BroadcastScreenMedia;
use Illuminate\Console\Command;

use App\Events\ScreenAds;
use App\Jobs\CheckForExpiredSequences;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use App\Services\SequenceService;

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
        // fetch  screen groups where is_active = 1 and sequence_id is not null
        $screenGroups = ScreenGroup::where('is_active', 1)->whereNotNull('sequence_id')->get();

        foreach ($screenGroups as $screenGroup) {
            $sequence = Sequence::find($screenGroup->sequence_id);
            SequenceService::updateSequenceScreenGroupsAndScreens($sequence);
        }
            
            
    }
}
