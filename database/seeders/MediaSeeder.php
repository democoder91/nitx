<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    public function run()
    {
        // check if the default media exists
        $defaultMedia = DB::table('media')->where('name', 'default')->first();
        if ($defaultMedia == null) {
            // create default media
            DB::table('media')->insert([
                'name' => 'default',
                'path' => 'img/ad/NoScreenMedia.png',
                'size' => '26500',
                'width' => '1920',
                'height' => '1080',
                'type' => 'image',
                'mime' => 'png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'system_media_name' => md5('default' . Carbon::now())
            ]);
        }

    }
}
