<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if (App::environment('local')) {
            $this->call([
                CategorySeeder::class,
                SequenceDay::class,
                MediaSeeder::class,
                DefaultMediaOwnerSeeder::class,
                DefaultSequence::class,
                PlanSeeder::class,
            ]);
        }
    }
}


