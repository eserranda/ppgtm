<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusJemaat extends Model
{
    protected $fillable = [
        'id_jemaat',
        'nama',
        'bidang',
        'jabatan',
        'tahun_mulai',
        'tahun_selesai',
        'tanggal',
    ];
    use HasFactory;
}
