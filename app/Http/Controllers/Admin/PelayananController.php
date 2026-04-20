<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use App\Models\PelayananAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PelayananController extends Controller
{
    public function index()
{
    $pelayanan = Pelayanan::with('anggotas')->latest()->get();
    return view('admin.pelayanan.index', compact('pelayanan'));
}
    public function create()
    {
        return view('admin.pelayanan.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|in:kepemimpinan,tim,aksi',
        'leader' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'icon' => 'nullable|string|max:50',
        'photo' => 'nullable|image|max:2048',

        'anggota_nama.*' => 'nullable|string|max:255',
        'anggota_bagian.*' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();

    try {
        $data = $request->only([
            'title',
            'category',
            'leader',
            'description',
            'icon',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('pelayanan', 'public');
        }

        $pelayanan = Pelayanan::create($data);

        if ($request->has('anggota_nama')) {
            foreach ($request->anggota_nama as $index => $nama) {
                $bagian = $request->anggota_bagian[$index] ?? null;

                if (!empty($nama)) {
                    PelayananAnggota::create([
                        'pelayanan_id' => $pelayanan->id,
                        'nama' => $nama,
                        'bagian' => $bagian,
                    ]);
                }
            }
        }

        DB::commit();

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil ditambahkan');
    } catch (\Throwable $e) {
        DB::rollBack();
        throw $e;
    }
}

    public function edit(Pelayanan $pelayanan)
{
    $pelayanan->load('anggotas');
    return view('admin.pelayanan.edit', compact('pelayanan'));
}

    public function update(Request $request, Pelayanan $pelayanan)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|in:kepemimpinan,tim,aksi',
        'leader' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'icon' => 'nullable|string|max:50',
        'photo' => 'nullable|image|max:2048',

        'anggota_nama.*' => 'nullable|string|max:255',
        'anggota_bagian.*' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();

    try {
        $data = $request->only([
            'title',
            'category',
            'leader',
            'description',
            'icon',
        ]);

        if ($request->hasFile('photo')) {
            if ($pelayanan->photo && Storage::disk('public')->exists($pelayanan->photo)) {
                Storage::disk('public')->delete($pelayanan->photo);
            }

            $data['photo'] = $request->file('photo')->store('pelayanan', 'public');
        }

        $pelayanan->update($data);

        $pelayanan->anggotas()->delete();

        if ($request->has('anggota_nama')) {
            foreach ($request->anggota_nama as $index => $nama) {
                $bagian = $request->anggota_bagian[$index] ?? null;

                if (!empty($nama)) {
                    PelayananAnggota::create([
                        'pelayanan_id' => $pelayanan->id,
                        'nama' => $nama,
                        'bagian' => $bagian,
                    ]);
                }
            }
        }

        DB::commit();

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil diperbarui');
    } catch (\Throwable $e) {
        DB::rollBack();
        throw $e;
    }
}

    public function destroy(Pelayanan $pelayanan)
    {
        if ($pelayanan->photo && Storage::disk('public')->exists($pelayanan->photo)) {
            Storage::disk('public')->delete($pelayanan->photo);
        }

        $pelayanan->delete();

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil dihapus');
    }
}