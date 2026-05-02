<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Khotbah extends Model
{
    use HasFactory;

    protected $table = 'khotbah';

    protected $fillable = [
        'title',
        'video',
        'description',
        'thumbnail',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : null;
    }
}