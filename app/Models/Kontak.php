<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'Kontaks';
    protected $primaryKey = 'id';
    public $incrementing = false; // true if autoincrement primay key

    protected $fillable = [
        'address',
        'phone',
        'email',
        'office_hours'
    ];

    protected $nullable = [
        'created_at',
        'updated_at'
    ];
}