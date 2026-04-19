<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanan = Pelayanan::all();
        return view('user.pelayanan.pelayanan', compact('pelayanan'));
    }

    public function show(Pelayanan $Pelayanan)
    {
        return view('user.pelayanan.pelayanan', compact('Pelayanan'));
    }
}