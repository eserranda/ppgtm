<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPemudaJemaat extends Model
{
    protected $fillable = [
        'id_jemaat',
        'dapel',
        'nama_anggota',
        'tgl_lahir',
        'alamat',
        'no_telp',
        'keterangan',
        'data_time',
    ];

    use HasFactory;
}
