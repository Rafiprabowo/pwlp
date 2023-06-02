<?php

namespace App\Models;

use App\Models\MahasiswaMataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'id';



    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class,'mahasiswa_matakuliah','mahasiswa_id','matakuliah_id');
    }
}
