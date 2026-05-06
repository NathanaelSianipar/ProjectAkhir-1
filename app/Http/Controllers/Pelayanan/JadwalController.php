<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::orderByRaw("
            CASE day
                WHEN 'Senin' THEN 1
                WHEN 'Selasa' THEN 2
                WHEN 'Rabu' THEN 3
                WHEN 'Kamis' THEN 4
                WHEN 'Jumat' THEN 5
                WHEN 'Sabtu' THEN 6
                WHEN 'Minggu' THEN 7
                ELSE 8
            END
        ")->orderBy('start_time')->get();

        $jadwalMingguan = $jadwals->where('category', 'mingguan')->groupBy('day');
        $acaraKhusus = $jadwals->where('category', 'acara_khusus')->values();

        return view('Pelayanan.Jadwal.Jadwal', compact('jadwalMingguan', 'acaraKhusus'));
    }
}