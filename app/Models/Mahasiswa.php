<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswas";
    public $timestamps = false;
    protected $primaryKey = 'nim';

    protected $fillable= [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'no_handphone',
        'email',
        'tanggal_lahir'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
