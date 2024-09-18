<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('binh_luans')->insert([
                'user_id' => rand(1, 10),
                'bai_viet_id' => rand(1, 10),
                'noi_dung' => fake()->text(200),
                'ngay_binh_luan' => fake()->date(),
                'trang_thai'=>fake()->randomElement(['an','hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
