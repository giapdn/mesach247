<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanHoiKiemDuyetVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_ids = DB::table('users')->pluck('id');
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('phan_hoi_kiem_duyet_viens')->insert([
                'user_id' => $faker->randomElement($user_ids),
                'sach_id' => rand(1, 10),
                'chu_de' => fake()->text(30),
                'noi_dung' => fake()->text(200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
