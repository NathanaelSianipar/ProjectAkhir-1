<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = [
        'address',
        'phone',
        'email',
        'office_hours',
        'map_embed',
    ];
}