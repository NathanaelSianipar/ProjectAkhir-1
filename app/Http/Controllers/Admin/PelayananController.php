<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelayananController extends Controller
{
    public function index()
    {
        $pelayanan = Pelayanan::all();
        return view('admin.pelayanan.index', compact('pelayanan'));
    }

    public function create()
    {
        return view('admin.pelayanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'leader' => 'nullable',
            'description' => 'nullable',
            'icon' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('Pelayanan', 'public');
        }

        Pelayanan::create($data);

        return redirect()->route('admin.pelayanan.index')
            ->with('success', 'Data Pelayanan berhasil ditambahkan');
    }

    public function show(Pelayanan $Pelayanan)
    {
        return view('admin.pelayanan.show', compact('Pelayanan'));
    }

    public function edit(Pelayanan $Pelayanan)
    {
        return view('admin.pelayanan.edit', compact('Pelayanan'));
    }

    public function update(Request $request, Pelayanan $Pelayanan)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'leader' => 'nullable',
            'description' => 'nullable',
            'icon' => 'nullable',
            'photo' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($Pelayanan->photo) {
                Storage::disk('public')->delete($Pelayanan->photo);
            }

            $data['photo'] = $request->file('photo')->store('Pelayanan', 'public');
        }

        $Pelayanan->update($data);

        return redirect()->route('admin.pelayanan.index')
            ->with('success', 'Data Pelayanan berhasil diperbarui');
    }

    public function destroy(Pelayanan $Pelayanan)
    {
        if ($Pelayanan->photo) {
            Storage::disk('public')->delete($Pelayanan->photo);
        }

        $Pelayanan->delete();

        return redirect()->route('admin.pelayanan.index')
            ->with('success', 'Data Pelayanan berhasil dihapus');
    }
}