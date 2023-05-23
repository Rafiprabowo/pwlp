<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswas";
    public $timestamps = false;
    protected $primaryKey = 'nim';

    protected $fillable= [
        'nim',
        'nama',
        'kelas',
        'jurusan',
        'no_handphone',
        'email',
        'tanggal_lahir'
    ];
}