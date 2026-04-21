<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';

    protected $fillable = [
        'title',
        'content',
        'publish_date',
        'image',
        'is_active',
    ];
}