<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $Kontaks = Kontak::all();
        return view('admin.kontaks.index', compact('Kontaks'));
    }

    public function create()
    {
        return view('admin.kontaks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Kontak_name' => 'required',
            'Kontak_description' => 'required',
            'price' => 'required|numeric',
        ]);

        Kontak::create($request->all());
        return redirect()->route('kontaks.index')->with('success', 'Kontak created successfully.');
    }

    public function show(Kontak $kontak)
    {
        return view('admin.kontaks.show', compact('Kontak'));
    }

    public function edit(Kontak $kontak)
    {
        return view('admin.kontaks.edit', compact('Kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'office_hours' => 'nullable'
            ]);

        $Kontak->update($request->all());
        return redirect()->route('kontaks.index')->with('success', 'Kontak updated successfully.');
    }

    public function destroy(Kontak $Kontak)
    {
        $Kontak->delete();
        return redirect()->route('kontaks.index')->with('success', 'Kontak deleted successfully.');
    }
}