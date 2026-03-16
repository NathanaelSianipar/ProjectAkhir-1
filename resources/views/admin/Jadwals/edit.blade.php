@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

    <h1>Edit Jadwal Ibadah & Kegiatan</h1>

    <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mb-3">
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

    <form action="{{ route('jadwal.update', $Jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Kegiatan</label>
            <input type="text"
                   name="title"
                   value="{{ $Jadwal->title }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Hari</label>
            <select name="day" class="form-control" required>
                <option value="Minggu" {{ $Jadwal->day == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                <option value="Sabtu" {{ $Jadwal->day == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                <option value="Jumat" {{ $Jadwal->day == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                <option value="Rabu" {{ $Jadwal->day == 'Rabu' ? 'selected' : '' }}>Rabu</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jam Mulai</label>
            <input type="time"
                   name="start_time"
                   value="{{ $Jadwal->start_time }}"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Jam Selesai</label>
            <input type="time"
                   name="end_time"
                   value="{{ $Jadwal->end_time }}"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Lokasi</label>
            <input type="text"
                   name="location"
                   value="{{ $Jadwal->location }}"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ $Jadwal->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Kategori</label>
            <select name="category" class="form-control" required>
                <option value="mingguan" {{ $Jadwal->category == 'mingguan' ? 'selected' : '' }}>
                    Jadwal Mingguan
                </option>
                <option value="acara_khusus" {{ $Jadwal->category == 'acara_khusus' ? 'selected' : '' }}>
                    Acara Khusus
                </option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Icon</label>
            <input type="text"
                   name="icon"
                   value="{{ $Jadwal->icon }}"
                   class="form-control"
                   placeholder="Contoh: calendar, church, heart">
        </div>

        <button type="submit" class="btn btn-primary">
            Update Jadwal
        </button>

    </form>

</div>

</div>

@endsection