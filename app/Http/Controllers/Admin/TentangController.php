<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::latest()->first();
        return view('admin.tentang.index', compact('tentang'));
    }

    public function create()
    {
        $tentang = Tentang::latest()->first();

        if ($tentang) {
            return redirect()->route('tentang.edit', $tentang->id)
                ->with('error', 'Data Tentang sudah ada. Silakan edit data yang ada.');
        }

        return view('admin.tentang.create');
    }

    public function store(Request $request)
{
    $data = Tentang::first(); // ambil 1 data saja

    $input = $request->all();

    if ($request->hasFile('gembala_foto')) {
        $input['gembala_foto'] = $request->file('gembala_foto')->store('tentang', 'public');
    }

    if ($data) {
        $data->update($input);
    } else {
        Tentang::create($input);
    }

    return redirect()->back()->with('success', 'Data berhasil disimpan');
}

    public function edit(Tentang $tentang)
    {
        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request, Tentang $tentang)
    {
        $request->validate([
            'header_title' => 'required|string|max:255',
            'header_description' => 'nullable|string',
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'gembala_nama' => 'required|string|max:255',
            'gembala_jabatan' => 'nullable|string|max:255',
            'gembala_deskripsi' => 'nullable|string',
            'gembala_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'header_title',
            'header_description',
            'sejarah',
            'visi',
            'misi',
            'gembala_nama',
            'gembala_jabatan',
            'gembala_deskripsi',
        ]);

        if ($request->hasFile('gembala_foto')) {
            if ($tentang->gembala_foto && Storage::disk('public')->exists($tentang->gembala_foto)) {
                Storage::disk('public')->delete($tentang->gembala_foto);
            }

            $data['gembala_foto'] = $request->file('gembala_foto')->store('tentang', 'public');
        }

        $tentang->update($data);

        return redirect()->route('tentang.index')->with('success', 'Data Tentang berhasil diperbarui.');
    }

    public function destroy(Tentang $tentang)
    {
        if ($tentang->gembala_foto && Storage::disk('public')->exists($tentang->gembala_foto)) {
            Storage::disk('public')->delete($tentang->gembala_foto);
        }

        $tentang->delete();

        return redirect()->route('tentang.index')->with('success', 'Data Tentang berhasil dihapus.');
    }
}