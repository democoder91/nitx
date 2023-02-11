<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Coffee',
            'image' => '',
            'icon' => 'ri-cup-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Coffee Roasters',
            'image' => '',
            'icon' => 'ri-cup-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Restaurants',
            'image' => '',
            'icon' => 'ri-restaurant-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Games',
            'image' => '',
            'icon' => 'ri-gamepad-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Books',
            'image' => '',
            'icon' => 'ri-book-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Fashion',
            'image' => '',
            'icon' => 'ri-markup-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Tools and Equipment',
            'image' => '',
            'icon' => 'ri-tools-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Medical',
            'image' => '',
            'icon' => 'ri-medicine-bottle-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Sports',
            'image' => '',
            'icon' => 'ri-riding-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Clothing',
            'image' => '',
            'icon' => 'ri-shirt-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Sports',
            'image' => '',
            'icon' => 'ri-plant-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Sports',
            'image' => '',
            'icon' => 'ri-roadster-line',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
