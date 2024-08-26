<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerjaJemaat extends Model
{
    protected $fillable = [
        'id_jemaat',
        'bidang',
        'ketua_bidang',
        'anggota',
        'program',
        'tujuan',
        'sasaran',
        'bentuk_kegiatan',
        'waktu',
        'pelaksana',
        'sumber_dana',
        'implementasi',
        'tanggal',
    ];

    use HasFactory;
}
