<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'phone',
        'alamat',
        'jabatan',
        'foto',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'foto_url',
        'role_label',
        'initials',
    ];

    public function getFotoUrlAttribute()
    {
        if (!empty($this->foto) && Storage::disk('public')->exists($this->foto)) {
            return Storage::url($this->foto);
        }

        return asset('images/default-user.png');
    }

    public function getRoleLabelAttribute()
    {
        return match ($this->role) {
            'super_admin' => 'Super Admin',
            'admin' => 'Admin',
            'pelayanan' => 'Pelayanan',
            default => 'Administrator',
        };
    }

    public function getInitialsAttribute()
    {
        $name = trim($this->name ?? 'A');
        $words = preg_split('/\s+/', $name);
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }

            if (strlen($initials) >= 2) {
                break;
            }
        }

        return $initials ?: 'A';
    }
}