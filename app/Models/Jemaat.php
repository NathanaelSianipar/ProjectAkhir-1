<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $fillable = [
        'no_kk',
        'nama_keluarga',
        'alamat_domisili',
        'alamat_ktp',
        'kolom',
        'nama_lengkap',
        'nik',
        'hubungan_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'baptis',
        'sidi',
        'handphone',
        'pekerjaan',
        'tanggal_nikah',
        'tanggal_domisili',
        'surat_attestasi',
    ];
}