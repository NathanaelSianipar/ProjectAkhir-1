<?php

namespace App\Http\Controllers;

use App\Models\Khotbah;
use Illuminate\Http\Request;

class KhotbahController extends Controller
{
    public function index()
    {
        $khotbah = Khotbah::latest()->get();
        return view('admin.khotbah.index', compact('khotbah'));
    }

    public function create()
    {
        return view('admin.khotbah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required', // link youtube atau video
            'description' => 'nullable',
            'thumbnail' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('khotbah', 'public');
        }

        Khotbah::create($data);

        return redirect()->route('khotbah.index')
            ->with('success', 'Khotbah berhasil ditambahkan');
    }

    public function show(Khotbah $khotbah)
    {
        return view('admin.khotbah.show', compact('khotbah'));
    }

    public function edit(Khotbah $khotbah)
    {
        return view('admin.khotbah.edit', compact('khotbah'));
    }

    public function update(Request $request, Khotbah $khotbah)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required',
            'description' => 'nullable',
            'thumbnail' => 'nullable|image'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('khotbah', 'public');
        }

        $khotbah->update($data);

        return redirect()->route('khotbah.index')
            ->with('success', 'Khotbah berhasil diperbarui');
    }

    public function destroy(Khotbah $khotbah)
    {
        $khotbah->delete();

        return redirect()->route('khotbah.index')
            ->with('success', 'Khotbah berhasil dihapus');
    }
}