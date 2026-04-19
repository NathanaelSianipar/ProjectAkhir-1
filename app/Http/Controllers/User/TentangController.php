<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $data = Tentang::latest()->first(); // ambil data terbaru dari admin
        return view('User.Tentang.TentangKami', compact('data'));
    }
}