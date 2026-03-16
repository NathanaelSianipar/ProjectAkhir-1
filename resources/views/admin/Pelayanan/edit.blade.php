@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

    <h1>Edit Data Pelayanan</h1>

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

    <form action="{{ route('pelayanan.update', $Pelayanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Pelayanan</label>
            <input type="text"
                   name="title"
                   value="{{ $Pelayanan->title }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Kategori</label>
            <select name="category" class="form-control" required>
                <option value="kepemimpinan" {{ $Pelayanan->category == 'kepemimpinan' ? 'selected' : '' }}>
                    Kepemimpinan
                </option>
                <option value="tim" {{ $Pelayanan->category == 'tim' ? 'selected' : '' }}>
                    Tim Pelayanan
                </option>
                <option value="aksi" {{ $Pelayanan->category == 'aksi' ? 'selected' : '' }}>
                    Pelayanan dalam Aksi
                </option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Pemimpin / Koordinator</label>
            <input type="text"
                   name="leader"
                   value="{{ $Pelayanan->leader }}"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi Pelayanan</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ $Pelayanan->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Icon</label>
            <input type="text"
                   name="icon"
                   value="{{ $Pelayanan->icon }}"
                   class="form-control"
                   placeholder="Contoh: music, video, heart">
        </div>

        <div class="form-group mb-3">
            <label>Foto Pelayanan</label>
            <input type="file"
                   name="photo"
                   class="form-control">

            @if($Pelayanan->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$Pelayanan->photo) }}" width="120">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Update Data
        </button>

    </form>

</div>

</div>

@endsection
