<?php

namespace Database\Seeders;

use App\Models\Category;
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
        // check if category dose not exist
        if (Category::where('category', 'Coffee')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Coffee',
                'image' => '',
                'icon' => 'ri-cup-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // DB::table('categories')->insert([
        //     'category' => 'Coffee',
        //     'image' => '',
        //     'icon' => 'ri-cup-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Coffee Roasters')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Coffee Roasters',
                'image' => '',
                'icon' => 'ri-cup-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // DB::table('categories')->insert([
        //     'category' => 'Coffee Roasters',
        //     'image' => '',
        //     'icon' => 'ri-cup-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
        
        // check if category dose not exist
        if (Category::where('category', 'Restaurants')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Restaurants',
                'image' => '',
                'icon' => 'ri-restaurant-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // DB::table('categories')->insert([
        //     'category' => 'Restaurants',
        //     'image' => '',
        //     'icon' => 'ri-restaurant-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Games')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Games',
                'image' => '',
                'icon' => 'ri-gamepad-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // DB::table('categories')->insert([
        //     'category' => 'Games',
        //     'image' => '',
        //     'icon' => 'ri-gamepad-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Books')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Books',
                'image' => '',
                'icon' => 'ri-book-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // DB::table('categories')->insert([
        //     'category' => 'Books',
        //     'image' => '',
        //     'icon' => 'ri-book-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Fashion')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Fashion',
                'image' => '',
                'icon' => 'ri-markup-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // DB::table('categories')->insert([
        //     'category' => 'Fashion',
        //     'image' => '',
        //     'icon' => 'ri-markup-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Tools and Equipment')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Tools and Equipment',
                'image' => '',
                'icon' => 'ri-tools-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // DB::table('categories')->insert([
        //     'category' => 'Tools and Equipment',
        //     'image' => '',
        //     'icon' => 'ri-tools-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Medical')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Medical',
                'image' => '',
                'icon' => 'ri-medicine-bottle-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // DB::table('categories')->insert([
        //     'category' => 'Medical',
        //     'image' => '',
        //     'icon' => 'ri-medicine-bottle-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Sports')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Sports',
                'image' => '',
                'icon' => 'ri-riding-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // DB::table('categories')->insert([
        //     'category' => 'Sports',
        //     'image' => '',
        //     'icon' => 'ri-riding-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        if (Category::where('category', 'Clothing')->doesntExist()) {
            DB::table('categories')->insert([
                'category' => 'Clothing',
                'image' => '',
                'icon' => 'ri-shirt-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // DB::table('categories')->insert([
        //     'category' => 'Clothing',
        //     'image' => '',
        //     'icon' => 'ri-shirt-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // check if category dose not exist
        
        // DB::table('categories')->insert([
        //     'category' => 'Sports',
        //     'image' => '',
        //     'icon' => 'ri-plant-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        // DB::table('categories')->insert([
        //     'category' => 'Sports',
        //     'image' => '',
        //     'icon' => 'ri-roadster-line',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);
    }
}
