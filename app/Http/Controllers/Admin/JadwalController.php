<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.Jadwals.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.Jadwals.create');
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

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show(Jadwal $Jadwal)
    {
        return view('admin.Jadwals.show', compact('Jadwal'));
    }

    public function edit(Jadwal $Jadwal)
    {
        return view('admin.Jadwals.edit', compact('Jadwal'));
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

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Jadwal $Jadwal)
    {
        $Jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}