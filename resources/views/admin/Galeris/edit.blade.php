@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Edit Galeri Kegiatan</h1>

    <a href="{{ route('galeris.index') }}" class="btn btn-secondary mb-3">
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

    <form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Judul Kegiatan</label>
            <input type="text"
                   name="title"
                   value="{{ $galeri->title }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Kegiatan</label>
            <input type="date"
                   name="event_date"
                   value="{{ $galeri->event_date }}"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ $galeri->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Foto Galeri</label>
            <input type="file"
                   name="image"
                   class="form-control">

            @if($galeri->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$galeri->image) }}" width="150">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Update Galeri
        </button>

    </form>

</div>
```

</div>

@endsection