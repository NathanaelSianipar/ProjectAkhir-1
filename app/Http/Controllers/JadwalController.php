<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $Jadwal = Jadwal::all();
        return view('admin.jadwals.index', compact('Jadwal'));
    }

    public function create()
    {
        return view('admin.jadwals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'nullable',
            'description' => 'nullable',
            'category' => 'required',
            'icon' => 'nullable'
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwals.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show(Jadwal $Jadwal)
    {
        return view('admin.jadwals.show', compact('Jadwal'));
    }

    public function edit(Jadwal $Jadwal)
    {
        return view('admin.jadwals.edit', compact('Jadwal'));
    }

    public function update(Request $request, Jadwal $Jadwal)
    {
        $request->validate([
            'title' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'nullable',
            'description' => 'nullable',
            'category' => 'required',
            'icon' => 'nullable'
        ]);

        $Jadwal->update($request->all());

        return redirect()->route('jadwals.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Jadwal $Jadwal)
    {
        $Jadwal->delete();

        return redirect()->route('jadwals.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}