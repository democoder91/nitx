<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SequenceDay extends Seeder
{
    public function run()
    {
        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Sunday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Sunday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Monday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Monday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Tuesday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Tuesday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Wednesday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Wednesday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Thursday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Thursday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Friday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Friday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // check if sequence_day dose not exist
        if (DB::table('sequence_days')->where('name', 'Saturday')->doesntExist()) {
            DB::table('sequence_days')->insert([
                'name' => 'Saturday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }


        
    }
}
