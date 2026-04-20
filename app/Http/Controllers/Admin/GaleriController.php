<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.Galeris.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.Galeris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image',
            'event_date' => 'nullable|date'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('Galeri', 'public');
        }

        Galeri::create($data);

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function show(Galeri $Galeri)
    {
        return view('admin.Galeris.show', compact('Galeri'));
    }

    public function edit(Galeri $Galeri)
    {
        return view('admin.Galeris.edit', compact('Galeri'));
    }

    public function update(Request $request, Galeri $Galeri)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'event_date' => 'nullable|date'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($Galeri->image) {
                Storage::disk('public')->delete($Galeri->image);
            }

            $data['image'] = $request->file('image')->store('Galeri', 'public');
        }

        $Galeri->update($data);

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(Galeri $Galeri)
    {
        if ($Galeri->image) {
            Storage::disk('public')->delete($Galeri->image);
        }

        $Galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }
}