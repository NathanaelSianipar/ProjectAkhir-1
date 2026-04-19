@extends('admin.layouts.main')

@section('content')
<style>
.form-wrap { max-width:700px; margin:0 auto; }
.form-card {
    background:#fff;
    border:1px solid #e4e8ef;
    border-radius:14px;
    padding:28px 32px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}
.form-card h2 {
    font-size:20px;
    font-weight:700;
    margin-bottom:20px;
    color:#1a2233;
}
.fg { display:flex; flex-direction:column; gap:5px; margin-bottom:16px; }
.fg label {
    font-size:11px;
    font-weight:700;
    text-transform:uppercase;
    color:#7a8499;
}
.fg input, .fg textarea {
    background:#f4f6f9;
    border:1px solid #e4e8ef;
    padding:10px 14px;
    border-radius:8px;
    outline:none;
}
.img-preview {
    width:120px;
    border-radius:10px;
    margin-top:10px;
}
.btn-row { display:flex; gap:10px; margin-top:10px; }
.btn {
    padding:10px 18px;
    border-radius:8px;
    font-weight:700;
    text-decoration:none;
}
.btn-save { background:#1da8e0; color:#fff; border:none; }
.btn-back { background:#f0f2f5; color:#333; border:1px solid #ddd; }
</style>

<div class="form-wrap">
    <div class="form-card">
        <h2>✏️ Edit Profil</h2>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="fg">
                <label>Nama</label>
                <input type="text" name="name" value="{{ $user->name }}">
            </div>

            <div class="fg">
                <label>Username</label>
                <input type="text" name="username" value="{{ $user->username }}">
            </div>

            <div class="fg">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}">
            </div>

            <div class="fg">
                <label>Telepon</label>
                <input type="text" name="phone" value="{{ $user->phone }}">
            </div>

            <div class="fg">
                <label>Alamat</label>
                <textarea name="alamat">{{ $user->alamat }}</textarea>
            </div>

            <div class="fg">
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="{{ $user->jabatan }}">
            </div>

            <div class="fg">
                <label>Foto Profil</label>
                <input type="file" name="foto">
                @if($user->foto)
                    <img src="{{ asset('storage/'.$user->foto) }}" class="img-preview">
                @endif
            </div>

            <div class="btn-row">
                <a href="{{ route('profil.index') }}" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection