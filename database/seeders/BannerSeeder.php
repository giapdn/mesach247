<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 100; $i ++){
            DB::table('banners')->insert([
                'hinh_anh'=>fake()->imageUrl(20),
                'noi_dung'=>fake()->text(100),
                'loai_banner'=>fake()->randomElement(['Slideshow','Footer']),
            ]);
        }
    }
}
