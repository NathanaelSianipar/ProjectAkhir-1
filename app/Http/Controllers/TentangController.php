<?php

namespace App\Http\Controllers;
use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        $Tentang = Tentang::all();
        return view('admin.tentang.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tentang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header_title' => 'required',
            'header_description' => 'nullable',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'gembala_nama' => 'required',
            'gembala_jabatan' => 'nullable',
            'gembala_deskripsi' => 'nullable',
            'gembala_foto' => 'nullable|image'
        ]);

        Tentang::create($request->all());

        return redirect()->route('tentang.index')
            ->with('success','Data Tentang berhasil ditambahkan');
    }

    public function show(Tentang $Tentang)
    {
        return view('admin.tentang.show', compact('Tentang'));
    }

    public function edit(Tentang $Tentang)
    {
        return view('admin.tentang.edit', compact('Tentang'));
    }

    public function update(Request $request, Tentang $Tentang)
    {
        $request->validate([
            'header_title' => 'required',
            'header_description' => 'nullable',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'gembala_nama' => 'required',
            'gembala_jabatan' => 'nullable',
            'gembala_deskripsi' => 'nullable',
            'gembala_foto' => 'nullable|image'
        ]);

        $Tentang->update($request->all());

        return redirect()->route('Tentang.index')
            ->with('success','Data Tentang berhasil diperbarui');
    }

    public function destroy(Tentang $Tentang)
    {
        $Tentang->delete();

        return redirect()->route('tentang.index')
            ->with('success','Data Tentang berhasil dihapus');
    }
}