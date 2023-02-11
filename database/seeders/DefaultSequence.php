<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultSequence extends Seeder
{
    public function run()
    {
        DB::table('sequences')->insert([
            'name' => 'Default',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'start_date' => null,
            'end_date' => null,
            'status' => 'live',
            'run_for_ever' => 1,
            'media_owner_id' => null
        ]);

        DB::table('media_sequence')->insert([
            'media_id' => 1,
            'sequence_id' => 1,
            'order' => 0,
            'minutes' => 0,
            'seconds' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}