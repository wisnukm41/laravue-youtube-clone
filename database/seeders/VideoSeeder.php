<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videos')->insert([
            'title' => 'Beautiful Sky',
            'thumbnail' => '/videos/thumbnails/sky.png',
            'video' => '/videos/sky.mp4',
            'user' => 'Whis',
            'views' => '34k views - 12 days ago',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('videos')->insert([
            'title' => 'Cute little bird',
            'thumbnail' => '/videos/thumbnails/bird.png',
            'video' => '/videos/bird.mp4',
            'user' => 'Whis',
            'views' => '89k views - 2 months ago',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('videos')->insert([
            'title' => 'Sun flower dancing',
            'thumbnail' => '/videos/thumbnails/flower.png',
            'video' => '/videos/flower.mp4',
            'user' => 'Whis',
            'views' => '4k views - 6 days ago',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
