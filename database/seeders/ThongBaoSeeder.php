<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = DB::table('users')->pluck('id')->toArray();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('thong_baos')->insert([
                'tieu_de' => fake()->text(30),
                'noi_dung' => fake()->text(200),
                'trang_thai' => fake()->randomElement(['da_xem', 'chua_xem']),
                'user_id' => rand(1, 10),
                'url' => fake()->url(),
                'type' => fake()->randomElement(['sach', 'tien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
