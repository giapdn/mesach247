<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaGiamGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('ma_giam_gias')->insert([
                'user_id' => rand(1, 10),
                'the_loai_id' => rand(1, 10),
                'sach_id' => rand(1, 10),
                'ten_ma' => fake()->text(30),
                'mo_ta' => fake()->text(200),
                'giam_gia' => fake()->numberBetween(10000,1000000),
                'so_luong' => fake()->numberBetween(10, 100),
                'ngay_bat_dau' => fake()->date(),
                'ngay_ket_thuc' => now(),
                'loai_giam_gia' => fake()->randomElement(['Phần trăm', 'Giá Giảm']),
            ]);
        }
    }
}
