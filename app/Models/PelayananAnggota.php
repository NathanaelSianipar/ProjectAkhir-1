<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelayananAnggota extends Model
{
    protected $fillable = [
        'pelayanan_id',
        'nama',
        'bagian',
    ];

    public function pelayanan()
    {
        return $this->belongsTo(Pelayanan::class);
    }
}