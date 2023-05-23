<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mahasiswas = [
            'nim'=>'2141720236',
            'nama'=>'Fadilah',
            'jurusan'=>'Teknik Informatika',
            'no_handphone'=>'021946708731',
            'email'=>'fadilah@gmail.com',
            'kelas_id'=>1,
        ];
        DB::table('mahasiswas')->insert($mahasiswas);
    }
}
