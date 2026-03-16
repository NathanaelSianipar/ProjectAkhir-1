@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Edit Data Tentang Gereja</h1>

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

    <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Judul Header</label>
            <input type="text"
                   name="header_title"
                   value="{{ $tentang->header_title }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi Header</label>
            <textarea name="header_description"
                      class="form-control"
                      rows="3">{{ $tentang->header_description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Sejarah Gereja</label>
            <textarea name="sejarah"
                      class="form-control"
                      rows="4"
                      required>{{ $tentang->sejarah }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Visi</label>
            <textarea name="visi"
                      class="form-control"
                      rows="3"
                      required>{{ $tentang->visi }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Misi</label>
            <textarea name="misi"
                      class="form-control"
                      rows="3"
                      required>{{ $tentang->misi }}</textarea>
        </div>

        <hr>

        <h3>Kepemimpinan</h3>

        <div class="form-group mb-3">
            <label>Nama Gembala</label>
            <input type="text"
                   name="gembala_nama"
                   value="{{ $tentang->gembala_nama }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Jabatan</label>
            <input type="text"
                   name="gembala_jabatan"
                   value="{{ $tentang->gembala_jabatan }}"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi Gembala</label>
            <textarea name="gembala_deskripsi"
                      class="form-control"
                      rows="3">{{ $tentang->gembala_deskripsi }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Foto Gembala</label>
            <input type="file"
                   name="gembala_foto"
                   class="form-control">

            @if($tentang->gembala_foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$tentang->gembala_foto) }}" width="120">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Update Data
        </button>

    </form>

</div>
```

</div>

@endsection