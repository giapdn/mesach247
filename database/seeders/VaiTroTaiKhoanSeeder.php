<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        for ($i = 1; $i <= 10; $i++) {
            $userId = rand(1, 10);
            $vaiTroId = rand(1, 10);


            $exists = DB::table('vai_tro_tai_khoans')
                ->where('user_id', $userId)
                ->where('vai_tro_id', $vaiTroId)
                ->exists();

            if (!$exists) {
                DB::table('vai_tro_tai_khoans')->insert([
                    'user_id' => $userId,
                    'vai_tro_id' => $vaiTroId,
                ]);
            }
        }
    }
}
