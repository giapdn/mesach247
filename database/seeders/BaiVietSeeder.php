<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('bai_viets')->insert([
                'user_id' => rand(1, 10),
                'chuyen_muc_id' => rand(1, 10),
                'hinh_anh' => fake()->imageUrl(),
                'tieu_de' => fake()->text(50),
                'noi_dung' => fake()->text(200),
                'ngay_dang' => fake()->date(),
                'trang_thai'=>fake()->randomElement(['an','hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
