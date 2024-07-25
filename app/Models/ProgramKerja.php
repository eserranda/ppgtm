<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerja extends Model
{

    protected $fillable = [
        'program_kerja',
        'sasaran',
        'waktu_dan_tempat',
    ];

    use HasFactory;
}
