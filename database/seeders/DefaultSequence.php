<?php

namespace Database\Seeders;

use App\Models\MediaOwner;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSequence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create default sequence if not exists
        $defaultSequence = DB::table('sequences')->where('name', 'Default Sequence')->first();
        if ($defaultSequence == null) {
            DB::table('sequences')->insert([
                'name' => 'Default Sequence',
                'status' => 'live',
                //default media owner id
                'media_owner_id' => Null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        $defaultSequence = DB::table('sequences')->where('name', 'Default Sequence')->first();

            // bring all days of the week from the database 
            $days = DB::table('sequence_days')->get();

            // add sequence days to the default sequence
            // for each day of the week
            foreach ($days as $day) {
                // check if the sequence day exists
                $sequenceDay = DB::table('sequence_sequence_day')->where('sequence_id', $defaultSequence->id)->where('sequence_day_id', $day->id)->first();
                if ($sequenceDay == null) {
                    // create sequence day
                    DB::table('sequence_sequence_day')->insert([
                        'sequence_id' => $defaultSequence->id,
                        'sequence_day_id' => $day->id,
                    ]);
                }
            }

            // check if the default media_sequence exists
            $defaultMediaSequence = DB::table('media_sequence')->where('sequence_id', $defaultSequence->id)->first();
            if ($defaultMediaSequence == null) {
                // create default media_sequence
                DB::table('media_sequence')->insert([
                    'sequence_id' => $defaultSequence->id,
                    'media_id' => DB::table('media')->where('name', 'default')->first()->id,
                    'order' => 0,
                    'minutes' => '10',
                    'seconds' => '30',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            
            

        
        
    }
}
