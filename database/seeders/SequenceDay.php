<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SequenceDay extends Seeder
{
    public function run()
    {
        DB::table('sequence_days')->insert([
            'name' => 'Sunday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sequence_days')->insert([
            'name' => 'Monday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sequence_days')->insert([
            'name' => 'Tuesday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sequence_days')->insert([
            'name' => 'Wednesday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sequence_days')->insert([
            'name' => 'Thursday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sequence_days')->insert([
            'name' => 'Friday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('sequence_days')->insert([
            'name' => 'Saturday',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
