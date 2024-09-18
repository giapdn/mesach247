<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('chuyen_mucs')->insert([
                'ten_chuyen_muc' => fake()->text(20),
                'chuyen_muc_cha_id' => rand(1, 10),
                'trang_thai'=>fake()->randomElement(['an','hien']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
