<?php

namespace Database\Seeders;

use App\Models\MediaOwner;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sequence extends Seeder
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
                'media_owner_id' => MediaOwner::where('name', 'Default Media Owner')->first()->id,
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
            // // for each day of the week
            // foreach ($days as $day) {
            //     ddd($day);
            //     // check if the sequence day exists
            //     $sequenceDay = DB::table('sequence_sequence_day')->where('sequence_id', $defaultSequence->id)->where('sequence_day_id', $day->id)->first();
            //         // create sequence day
            //         DB::table('sequence_sequence_day')->insert([
            //             'sequence_id' => $defaultSequence->id,
            //             'sequence_day_id ' => $day->id,
            //         ]);
            // }
            

        
        
    }
}
