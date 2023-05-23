<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $matkul = [
            [
            'nama_matkul'=>'Pemrograman Berorientasi Objek',
            'sks'=> 3,
            'jam'=> 6,
            'semester'=>4,
            ],
            [
                'nama_matkul'=> 'Pemrograman Web Lanjut',
                'sks'=>3,
                'jam'=>6,
                'semester'=>4,
                ],
                [
                    'nama_matkul'=> 'Basis Data Lanjut',
                    'sks'=>3,
                    'jam'=>6,
                    'semester'=>4,
                    ],
        ];

        DB::table('matakuliah')->insert($matkul);
    }
}
