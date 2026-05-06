<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $data = Tentang::latest()->first(); // ambil data terbaru dari admin
        return view('Pelayanan.Metaprofil.Meta', compact('data'));
    }
}