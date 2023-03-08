<?php
namespace App\Services;

use App\Constants\Status;
use App\Events\BroadcastScreenMedia;
use App\Models\ScreenGroup;
use App\Models\Sequence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;

class SequenceService
{
    public static function updateSequenceStatus($sequence)
    {
        // if the sequence start date is before now and the end date is after now or the end date is null then the sequence is ready
        if (( $sequence->start_date < now() && $sequence->end_date >= now()) || ($sequence->start_date < now() && $sequence->end_date == null)){
            // chek if the sequence is assigned to any screen group
            $screenGroups = ScreenGroup::where('sequence_id', $sequence->id)->get();
            if (count($screenGroups) > 0) {
                $sequence->status = Status::Live->value;
            } else {
            $sequence->status = Status::Ready->value;
            }
        } else if ($sequence->end_date != Null && $sequence->end_date < now()) {

            $sequence->status = Status::Ended->value;
        }else if ($sequence->start_date > now()){
            $sequence->status = Status::NotReady->value;
        }

        
        // return the updated sequence
        return $sequence;
    }

    // a function to update sequence screengroups and screens

    public static function updateSequenceScreenGroupsAndScreens($sequence)
    {
        if ($sequence->status == Status::NotReady->value || $sequence->status == Status::Ended->value) {
            $screenGroups = ScreenGroup::where('sequence_id', $sequence->id)->get();
            foreach ($screenGroups as $screenGroup) {
                // change the sequence id to the default sequence
                $screenGroup->sequence_id = Sequence::where('name', 'Default Sequence')->first()->id;
                $screenGroup->save();

                $media = ScreenGroup::fetchScreenGroupSequenceMediaWithTheirDuration($screenGroup->sequence_id);
                $screens = ScreenGroup::getAllScreensByScreenGroup($screenGroup->id);
                foreach ($screens as $screen) {
                    if ($screen->sequence_id != $screenGroup->sequence_id) {
                        // update screen sequence id in the database using query builder
                        DB::table('screens')
                        ->where('id', $screen->id)
                        ->update([
                            'sequence_id' => $screenGroup->sequence_id,
                            'updated_at' => Carbon::now(),
                        ]);         
                        event(new BroadcastScreenMedia($screen->id, $media));
                    }
                }

            }

            
        }
    }

}