<?php


namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultMediaOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create default media owner if not exists
        $defaultMediaOwner = DB::table('media_owners')->where('name', 'Default Media Owner')->first();
        if ($defaultMediaOwner == null) {
            DB::table('media_owners')->insert([
                'name' => 'Default Media Owner',
                'commercial_record' => '123456789',
                'email' => 'Default@mail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123456789'),
                'referral_code' => 'ABC123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
