<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Khotbah;

class KhotbahController extends Controller
{
    public function index()
    {
        $khotbah = Khotbah::latest()->get();
        return view('Pelayanan.Khotbah.Khotbah', compact('khotbah'));
    }

    public function show(Khotbah $khotbah)
    {
        return view('Pelayanan.khotbah-detai', compact('khotbah'));
    }
}