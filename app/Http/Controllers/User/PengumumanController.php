<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('is_active', true)
            ->latest()
            ->get();

        return view('User.Pengumuman.Pengumuman', compact('pengumuman'));
    }

    public function show(Pengumuman $pengumuman)
    {
        if (!$pengumuman->is_active) {
            abort(404);
        }

        return view('User.Pengumuman.show', compact('pengumuman'));
    }
}