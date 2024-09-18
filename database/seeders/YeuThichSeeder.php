<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YeuThichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i ++){
            DB::table('yeu_thiches')->insert([
                'user_id'=>rand(1,10),
                'sach_id'=>rand(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
