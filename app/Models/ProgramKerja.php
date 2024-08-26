<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{

    protected $fillable = [
        'program_kerja',
        'sasaran',
        'tujuan',
        'waktu_dan_tempat',
        'bidang',
        'tanggal',
    ];

    use HasFactory;
}
