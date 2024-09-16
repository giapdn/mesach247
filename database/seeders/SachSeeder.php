<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i ++){
            DB::table('saches')->insert([
                'user_id'=>rand(1,10),
                'the_loai_id'=>rand(1,10),
                'ten_sach'=>fake()->text(30),
                'anh_bia_sach'=>fake()->imageUrl(),
                'gia_goc'=>fake()->numberBetween(10000,1000000),
                'tom_tat' => fake()->text(200),
                'ngay_dang'=>fake()->date(),
                'gia_khuyen_mai'=>fake()->numberBetween(10000,1000000),
                'so_luong_da_ban'=>fake()->numberBetween(1,100),
                'kiem_duyet'=>fake()->randomElement(['Chờ xác nhận','Từ chối','Duyệt']),
                'trang_thai'=>fake()->randomElement(['Ẩn','Hiện']),
            ]);
        }
    }
}
