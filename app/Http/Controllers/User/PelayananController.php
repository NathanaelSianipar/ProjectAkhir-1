<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanans = Pelayanan::latest()->get();

        $kepemimpinan = $pelayanans->where('category', 'kepemimpinan')->values();
        $timPelayanan = $pelayanans->where('category', 'tim')->values();
        $fotoPelayanan = $pelayanans->where('category', 'aksi')->values();

        return view('User.Pelayanan.Pelayanan', compact(
            'kepemimpinan',
            'timPelayanan',
            'fotoPelayanan'
        ));
    }
}