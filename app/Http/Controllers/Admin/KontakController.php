<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::latest()->get();
        return view('admin.kontaks.index', compact('kontak'));
    }

    public function create()
    {
        return view('admin.kontaks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'office_hours' => 'nullable|string',
            'map_embed' => 'nullable|string'
        ]);

        $data = $request->only([
            'address',
            'phone',
            'email',
            'office_hours',
            'map_embed'
        ]);

        Kontak::create($data);

        return redirect()->route('admin.kontaks.index')
            ->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(Kontak $kontak)
    {
        return view('admin.kontaks.edit', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'office_hours' => 'nullable|string',
            'map_embed' => 'nullable|string'
        ]);

        $data = $request->only([
            'address',
            'phone',
            'email',
            'office_hours',
            'map_embed'
        ]);

        $kontak->update($data);

        return redirect()->route('admin.kontaks.index')
            ->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()->route('admin.kontak.index')
            ->with('success', 'Kontak berhasil dihapus.');
    }
}