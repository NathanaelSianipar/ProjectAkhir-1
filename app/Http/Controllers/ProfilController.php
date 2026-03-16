<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profil.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|max:2048'
        ]);

        $user->update($request->all());

        return redirect()->route('profil.index')
            ->with('success','Profil berhasil diperbarui');
    }
}