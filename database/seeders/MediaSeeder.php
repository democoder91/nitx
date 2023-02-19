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
                'compressed_media_path' => 'https://nitx-s3-uploder.s3.me-south-1.amazonaws.com/local/user-1/compressed-images/image-png/2023-02-11/3c75af7eb6a279a8f62209b1bcf60423.png',
                'media_aws_s3_url' => 'https://nitx-s3-uploder.s3.me-south-1.amazonaws.com/local/user-1/compressed-images/image-png/2023-02-11/3c75af7eb6a279a8f62209b1bcf60423.png',
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
