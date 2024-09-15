<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('thanh_toans')->insert([
                'sach_id' => rand(1,10),
                'user_id' => rand(1,10),
                'phuong_thuc_thanh_toan_id' => rand(1,10),
                'ma_giam_gia_id' => rand(1,10),
                'gia_cuoi_cung' => fake()->numberBetween(10000,1000000),
                'tong_gia' => fake()->numberBetween(10000,1000000),
            ]);
        }
    }
}
