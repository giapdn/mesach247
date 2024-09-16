<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LienHeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('lien_hes')->insert([
                'user_id' => rand(1, 10),
                'ten_khach_hang' => fake()->text(30),
                'email' => fake()->email(),
                'chu_de' => fake()->text(50),
                'noi_dung' => fake()->text(200),
                'anh' => fake()->imageUrl(20),
                'trang_thai' => fake()->randomElement(['open', 'closed','pending']),
            ]);
        }
    }
}
