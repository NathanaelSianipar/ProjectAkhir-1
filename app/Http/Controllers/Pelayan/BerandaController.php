<?php

namespace App\Http\Controllers\Pelayan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;

class BerandaController extends Controller
{
    /**
     * Halaman beranda khusus untuk user dengan role Pelayan.
     * Route: GET /pelayanan/beranda
     * Middleware: auth, role:Pelayan
     */
    public function index()
    {
        $pelayanans = Pelayanan::with('anggotas')->latest()->get();

        $kepemimpinan  = $pelayanans->where('category', 'kepemimpinan')->values();
        $timPelayanan  = $pelayanans->where('category', 'tim')->values();
        $fotoPelayanan = $pelayanans->where('category', 'aksi')->values();

        // View khusus pelayan → resources/views/Pelayanan/beranda.blade.php
        return view('Pelayanan.beranda', compact('kepemimpinan', 'timPelayanan', 'fotoPelayanan'));
    }
}