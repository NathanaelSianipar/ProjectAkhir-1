@extends('admin.layouts.main')

@section('content')
<div class="form-wrap">
    <div class="form-card">
        <h2>➕ Tambah User</h2>

        <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="fg">
                <label>Nama</label>
                <input type="text" name="name">
            </div>

            <div class="fg">
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <div class="fg">
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div class="fg">
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div class="fg">
                <label>Jabatan</label>
                <input type="text" name="jabatan">
            </div>

            <div class="fg">
                <label>Foto</label>
                <input type="file" name="foto">
            </div>

            <div class="btn-row">
                <a href="{{ route('profil.index') }}" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection