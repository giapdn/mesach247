<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuyenVaiTro extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i = 1; $i <= 10; $i ++){
        //     DB::table('quyen_vai_tros')->insert([
        //         'quyen_id'=> rand(1,10),
        //         'vai_tro_id'=>rand(1,10),
        //     ]);
        // }

        for ($i = 1; $i <= 10; $i++) {
            $quyenId = rand(1, 10);
            $vaiTroId = rand(1, 10);


            $exists = DB::table('quyen_vai_tros')
                ->where('quyen_id', $quyenId)
                ->where('vai_tro_id', $vaiTroId)
                ->exists();

            if (!$exists) {
                DB::table('quyen_vai_tros')->insert([
                    'quyen_id' => $quyenId,
                    'vai_tro_id' => $vaiTroId,
                    
                ]);
            }
        }
    }
}
