<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasis extends Model
{

    protected $fillable = [
        'nama_klasis',
        'wilayah',
    ];

    use HasFactory;
}
