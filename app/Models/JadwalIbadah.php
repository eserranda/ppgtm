<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    protected $fillable = [
        'id_jemaat',
        'tanggal',
        'nama',
        'tempat',
        'liturgis',
        'pelayan_firman',
        'tahun'
    ];

    use HasFactory;
}
