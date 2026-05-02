<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;

class PelayananController extends Controller
{
    /**
     * Untuk USER / JEMAAT (tanpa login).
     * Route: GET /Pelayanan  → name: user.pelayanan
     */
    public function indexUser()
    {
        $pelayanans = Pelayanan::with('anggotas')->latest()->get();

        $kepemimpinan  = $pelayanans->where('category', 'kepemimpinan')->values();
        $timPelayanan  = $pelayanans->where('category', 'tim')->values();
        $fotoPelayanan = $pelayanans->where('category', 'aksi')->values();

        // View untuk jemaat/publik
        return view('Pelayanan.Pelayanan.pelayanan', compact('kepemimpinan', 'timPelayanan', 'fotoPelayanan'));
    }
}