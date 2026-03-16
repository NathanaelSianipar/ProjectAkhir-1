@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

    <h1>Tambah Data Tentang Gereja</h1>

    <a href="{{ route('tentang.index') }}" class="btn btn-secondary mb-3">
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

    <form action="{{ route('tentang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Judul Header</label>
            <input type="text"
                   name="header_title"
                   class="form-control"
                   placeholder="Masukkan judul header"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi Header</label>
            <textarea name="header_description"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan deskripsi header"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Sejarah Gereja</label>
            <textarea name="sejarah"
                      class="form-control"
                      rows="4"
                      placeholder="Masukkan sejarah gereja"
                      required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Visi</label>
            <textarea name="visi"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan visi gereja"
                      required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Misi</label>
            <textarea name="misi"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan misi gereja"
                      required></textarea>
        </div>

        <hr>

        <h3>Kepemimpinan</h3>

        <div class="form-group mb-3">
            <label>Nama Gembala</label>
            <input type="text"
                   name="gembala_nama"
                   class="form-control"
                   placeholder="Masukkan nama gembala"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Jabatan</label>
            <input type="text"
                   name="gembala_jabatan"
                   class="form-control"
                   placeholder="Contoh: Gembala Sidang">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi Gembala</label>
            <textarea name="gembala_deskripsi"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan deskripsi gembala"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Foto Gembala</label>
            <input type="file"
                   name="gembala_foto"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Data
        </button>

    </form>

</div>

</div>

@endsection