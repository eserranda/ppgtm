<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerjaKlasis extends Model
{
    protected $fillable = [
        'id_klasis',
        'bidang',
        'ketua_bidang',
        'anggota',
        'program',
        'dasar_pemikiran',
        'kegiatan',
        'tujuan',
        'sasaran',
        'penanggung_jawab',
        'waktu_pelaksana',
        'pelaksana',
        'biaya',
        'data_time',
        'tanggal',
    ];

    use HasFactory;
}
