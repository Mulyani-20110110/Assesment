<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'prodi',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat',
    ];
}
