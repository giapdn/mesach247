<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('don_hangs')->insert([
                'sach_id' => rand(1,10),
                'user_id' => rand(1,10),
                'phuong_thuc_thanh_toan_id' => rand(1,10),
                'ma_don_hang' =>fake()->bothify('??-####'),
                'so_tien_thanh_toan' => fake()->numberBetween(10000,1000000),
                'trang_thai'=>fake()->randomElement(['thanh_cong','dang_xu_ly','that_bai']),
                'mo_ta' => fake()->text(200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}






