<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('plans')->insert([
            'price' => 0,
            'name' => 'Basic Monthly',
            'number_of_screens' => 1,
            'currency' => 'SAR',
            'storage_unit' => 'GB',
            'number_of_groups' => 1,
            'number_of_sequences' => 1,
            'storage_capacity' => 0.5,
            'discount_percentage' => 0,
            'is_best_price' => false,
            'is_having_user_on_boarding' => true,
            'is_having_full_control_of_screens' => true,
            'is_having_access_to_e_manual' => false,
            'is_having_support_via_email_and_call' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'price' => 0,
            'name' => 'Basic Yearly',
            'number_of_screens' => 1,
            'currency' => 'SAR',
            'storage_unit' => 'GB',
            'number_of_groups' => 1,
            'number_of_sequences' => 1,
            'storage_capacity' => 0.5,
            'discount_percentage' => 0,
            'is_best_price' => false,
            'is_having_user_on_boarding' => true,
            'is_having_full_control_of_screens' => true,
            'is_having_access_to_e_manual' => false,
            'is_having_support_via_email_and_call' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'price' => 24,
            'name' => 'Standard Monthly',
            'number_of_screens' => -1,
            'currency' => 'SAR',
            'storage_unit' => 'GB',
            'number_of_groups' => 10,
            'number_of_sequences' => 10,
            'storage_capacity' => 1,
            'discount_percentage' => 10,
            'is_best_price' => true,
            'is_having_user_on_boarding' => true,
            'is_having_full_control_of_screens' => true,
            'is_having_access_to_e_manual' => true,
            'is_having_support_via_email_and_call' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'price' => 260,
            'name' => 'Standard Yearly',
            'number_of_screens' => -1,
            'currency' => 'SAR',
            'storage_unit' => 'GB',
            'number_of_groups' => 10,
            'number_of_sequences' => 10,
            'storage_capacity' => 1,
            'discount_percentage' => 10,
            'is_best_price' => true,
            'is_having_user_on_boarding' => true,
            'is_having_full_control_of_screens' => true,
            'is_having_access_to_e_manual' => true,
            'is_having_support_via_email_and_call' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'price' => 35,
            'name' => 'Premium Monthly',
            'number_of_screens' => -1,
            'currency' => 'SAR',
            'storage_unit' => 'GB',
            'number_of_groups' => -1,
            'number_of_sequences' => -1,
            'storage_capacity' => 5,
            'discount_percentage' => 10,
            'is_best_price' => false,
            'is_having_user_on_boarding' => true,
            'is_having_full_control_of_screens' => true,
            'is_having_access_to_e_manual' => true,
            'is_having_support_via_email_and_call' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'price' => 378,
            'name' => 'Premium Yearly',
            'number_of_screens' => -1,
            'currency' => 'SAR',
            'storage_unit' => 'GB',
            'number_of_groups' => -1,
            'number_of_sequences' => -1,
            'storage_capacity' => 5,
            'discount_percentage' => 10,
            'is_best_price' => false,
            'is_having_user_on_boarding' => true,
            'is_having_full_control_of_screens' => true,
            'is_having_access_to_e_manual' => true,
            'is_having_support_via_email_and_call' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
