<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'tentang';

    protected $fillable = [
        'header_title',
        'header_description',
        'sejarah',
        'visi',
        'misi',
        'gembala_nama',
        'gembala_jabatan',
        'gembala_deskripsi',
        'gembala_foto',
    ];
}