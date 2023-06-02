<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $mahasiswaMatakuliah = [
            [
                'mahasiswas_id' => 2141720232,
                'matakuliah_id'=> 1,
                'nilai'=> 90
            ],
            [
                'mahasiswas_id' => 2141720232,
                'matakuliah_id'=> 2,
                'nilai'=> 80
            ],
            [
                'mahasiswas_id' => 2141720232,
                'matakuliah_id'=> 3,
                'nilai'=> 70
            ],
        ];


        DB::table('mahasiswas_matakuliah')->insert($mahasiswaMatakuliah);
    }
}
