<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khotbah extends Model
{
    use HasFactory;

    protected $table = 'khotbah';

    protected $fillable = [
        'title',
        'video',
        'description',
        'thumbnail',
        'tanggal'
    ];

    public $timestamps = true;
}