<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function index()
    {
        $Pelayanan = Pelayanan::all();
        return view('admin.pelayanan.index', compact('Pelayanan'));
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

        return redirect()->route('pelayanan.index')
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
            $data['photo'] = $request->file('photo')->store('Pelayanan', 'public');
        }

        $Pelayanan->update($data);

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data Pelayanan berhasil diperbarui');
    }

    public function destroy(Pelayanan $Pelayanan)
    {
        $Pelayanan->delete();

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data Pelayanan berhasil dihapus');
    }
}