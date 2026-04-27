<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class JemaatController extends Controller
{
    public function create()
    {
        return view('User.Jemaat.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|string|max:255',
            'nama_keluarga' => 'required|string|max:255',
            'alamat_domisili' => 'required|string',
            'alamat_ktp' => 'nullable|string',
            'kolom' => 'nullable|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:255',
            'hubungan_keluarga' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:Laki,Perempuan',
            'baptis' => 'required|in:Sudah,Belum',
            'sidi' => 'required|in:Sudah,Belum',
            'handphone' => 'nullable|string|max:20',
            'pekerjaan' => 'nullable|string|max:255',
            'tanggal_nikah' => 'nullable|date',
            'tanggal_domisili' => 'nullable|date',
            'surat_attestasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $data = $request->except('surat_attestasi');

            if ($request->hasFile('surat_attestasi')) {
                $data['surat_attestasi'] = $request->file('surat_attestasi')->store('attestasi', 'public');
            }

            $jemaat = Jemaat::create($data);

            DB::commit();

            $noAdmin = '6285261520267';

            $pesan = urlencode(
                "=== PENDAFTARAN JEMAAT BARU ===\n\n" .

                "--- DATA KELUARGA ---\n" .
                "No KK: {$jemaat->no_kk}\n" .
                "Nama Keluarga: {$jemaat->nama_keluarga}\n" .
                "Alamat Domisili: {$jemaat->alamat_domisili}\n" .
                "Alamat KTP: " . ($jemaat->alamat_ktp ?: '-') . "\n" .
                "Kolom: " . ($jemaat->kolom ?: '-') . "\n\n" .

                "--- DATA PRIBADI ---\n" .
                "Nama Lengkap: {$jemaat->nama_lengkap}\n" .
                "NIK: " . ($jemaat->nik ?: '-') . "\n" .
                "Hubungan: " . ($jemaat->hubungan_keluarga ?: '-') . "\n" .
                "Tempat Lahir: " . ($jemaat->tempat_lahir ?: '-') . "\n" .
                "Tanggal Lahir: " . ($jemaat->tanggal_lahir ? Carbon::parse($jemaat->tanggal_lahir)->format('d-m-Y') : '-') . "\n" .
                "Jenis Kelamin: " . ($jemaat->jenis_kelamin ?: '-') . "\n\n" .
                "--- DATA GEREJA ---\n" .
                "Baptis: {$jemaat->baptis}\n" .
                "Sidi: {$jemaat->sidi}\n\n" .

                "--- KONTAK ---\n" .
                "Handphone: " . ($jemaat->handphone ?: '-') . "\n" .
                "Pekerjaan: " . ($jemaat->pekerjaan ?: '-') . "\n" .
                "Tanggal Nikah: " . ($jemaat->tanggal_nikah ? Carbon::parse($jemaat->tanggal_nikah)->format('d-m-Y') : '-') . "\n" .
                "Tanggal Domisili: " . ($jemaat->tanggal_domisili ? Carbon::parse($jemaat->tanggal_domisili)->format('d-m-Y') : '-') . "\n"
            );

            return redirect()->away("https://wa.me/{$noAdmin}?text={$pesan}");
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Gagal simpan jemaat: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Data gagal disimpan. Silakan coba lagi.');
        }
    }
}