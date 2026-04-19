<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::latest()->first();
        return view('user.kontak', compact('kontak'));
    }
}