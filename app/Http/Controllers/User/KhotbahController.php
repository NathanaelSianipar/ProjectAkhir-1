<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Khotbah;

class KhotbahController extends Controller
{
    public function index()
    {
        $khotbah = Khotbah::latest()->get();
        return view('user.khotbah.khotbah', compact('khotbah'));
    }

    public function show(Khotbah $khotbah)
    {
        return view('user.khotbah-detail', compact('khotbah'));
    }
}