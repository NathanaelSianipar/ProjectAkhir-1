@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Tambah Khotbah</h1>

    <a href="{{ route('khotbah.index') }}" class="btn btn-secondary mb-3">
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

    <form action="{{ route('khotbah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Judul Khotbah</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   placeholder="Contoh: Iman dalam Cobaan"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Link Video (YouTube)</label>
            <input type="text"
                   name="video"
                   class="form-control"
                   placeholder="https://youtube.com/...">
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Khotbah</label>
            <input type="date"
                   name="tanggal"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan ringkasan khotbah"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Thumbnail Video</label>
            <input type="file"
                   name="thumbnail"
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Khotbah
        </button>

    </form>

</div>
```

</div>

@endsection