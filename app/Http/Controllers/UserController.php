<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;
use App\Models\Galeri;
use App\Models\Khotbah;
use App\Models\Jadwal;
use App\Models\Jemaat;
use App\Models\Kontak;
use App\Models\Pelayanan;   

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function tentang()
    {
        $tentang = Tentang::all();
        return view('user.tentang',compact('tentang'));
    }

    public function galeri()
    {
        $galeri = Galeri::all();
        return view('user.galeri',compact('galeri'));
    }

    public function khotbah()
    {
        $khotbah = Khotbah::all();
        return view('user.khotbah',compact('khotbah'));
    }

    public function jadwal()
    {
        $jadwal = Jadwal::all();
        return view('user.jadwal',compact('jadwal'));
    }

    public function jemaat()
    {
        $jemaat = Jemaat::all();
        return view('user.jemaat',compact('jemaat'));
    }

    public function kontak()
    {
        $kontak = Kontak::all();
        return view('user.kontak',compact('kontak'));
    }

    public function pelayanan()
    {
        $pelayanan = Pelayanan::all();
        return view('user.pelayanan',compact('pelayanan'));
    }
}
