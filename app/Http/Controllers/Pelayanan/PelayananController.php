<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;

class PelayananController extends Controller
{
    public function index()
{
    $pelayanans = Pelayanan::with('anggotas')->latest()->get();

    $kepemimpinan = $pelayanans->where('category', 'kepemimpinan')->values();
    $timPelayanan = $pelayanans->where('category', 'tim')->values();
    $fotoPelayanan = $pelayanans->where('category', 'aksi')->values();

    return view('Pelayanan.beranda', compact('kepemimpinan', 'timPelayanan', 'fotoPelayanan'));
}
}