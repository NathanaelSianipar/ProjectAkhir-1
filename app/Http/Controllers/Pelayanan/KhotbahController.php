<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KhotbahController extends Controller
{
    public function index()
    {
        return view('Pelayanan.Khotbah.Khotbah');
    }
}