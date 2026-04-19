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
        $pelayanan = Pelayanan::latest()->get();
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
        ]);

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

        Pelayanan::create($data);

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil ditambahkan');
    }

    public function edit(Pelayanan $pelayanan)
    {
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
        ]);

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

        return redirect()->route('pelayanan.index')
            ->with('success', 'Data pelayanan berhasil diperbarui');
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