@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

    <h1>Tambah Data Pelayanan</h1>

    <a href="{{ route('pelayanan.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelayanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Nama Pelayanan</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   placeholder="Contoh: Tim Musik"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Kategori</label>
            <select name="category" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="kepemimpinan">Kepemimpinan</option>
                <option value="tim">Tim Pelayanan</option>
                <option value="aksi">Pelayanan dalam Aksi</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Pemimpin / Koordinator</label>
            <input type="text"
                   name="leader"
                   class="form-control"
                   placeholder="Nama pemimpin tim">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi Pelayanan</label>
            <textarea name="description"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan deskripsi pelayanan"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Icon</label>
            <input type="text"
                   name="icon"
                   class="form-control"
                   placeholder="Contoh: music, video, heart">
        </div>

        <div class="form-group mb-3">
            <label>Foto Pelayanan</label>
            <input type="file"
                   name="photo"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Data
        </button>

    </form>

</div>

</div>

@endsection
