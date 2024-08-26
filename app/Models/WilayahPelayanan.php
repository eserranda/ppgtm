<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WilayahPelayanan extends Model
{
    protected $fillable = [
        'id_klasis',
        'wilayah',
        'koordinator',
        'no_telp',
        'tanggal',
    ];

    public function klasis(): BelongsTo
    {
        return $this->belongsTo(Klasis::class, 'id_klasis', 'id');
    }

    use HasFactory;
}
