@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Edit Khotbah</h1>

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

    <form action="{{ route('khotbah.update', $khotbah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Judul Khotbah</label>
            <input type="text"
                   name="title"
                   value="{{ $khotbah->title }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Link Video (YouTube)</label>
            <input type="text"
                   name="video"
                   value="{{ $khotbah->video }}"
                   class="form-control"
                   placeholder="https://youtube.com/...">
        </div>

        <div class="form-group mb-3">
            <label>Tanggal Khotbah</label>
            <input type="date"
                   name="tanggal"
                   value="{{ $khotbah->tanggal }}"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ $khotbah->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Thumbnail Video</label>
            <input type="file"
                   name="thumbnail"
                   class="form-control">

            @if($khotbah->thumbnail)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$khotbah->thumbnail) }}" width="150">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Update Khotbah
        </button>

    </form>

</div>
```

</div>

@endsection