<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->only([
            'title',
            'content',
            'publish_date',
            'is_active',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pengumuman', 'public');
        }

        Pengumuman::create($data);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->only([
            'title',
            'content',
            'publish_date',
            'is_active',
        ]);

        if ($request->hasFile('image')) {
            if ($pengumuman->image && Storage::disk('public')->exists($pengumuman->image)) {
                Storage::disk('public')->delete($pengumuman->image);
            }

            $data['image'] = $request->file('image')->store('pengumuman', 'public');
        }

        $pengumuman->update($data);

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->image && Storage::disk('public')->exists($pengumuman->image)) {
            Storage::disk('public')->delete($pengumuman->image);
        }

        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}