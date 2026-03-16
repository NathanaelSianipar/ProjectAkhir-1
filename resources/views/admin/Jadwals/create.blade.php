@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Tambah Jadwal Ibadah & Kegiatan</h1>

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

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Nama Kegiatan</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   placeholder="Contoh: Ibadah Sesi 1"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Hari</label>
            <select name="day" class="form-control" required>
                <option value="">-- Pilih Hari --</option>
                <option value="Minggu">Minggu</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Jumat">Jumat</option>
                <option value="Rabu">Rabu</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Jam Mulai</label>
            <input type="time"
                   name="start_time"
                   class="form-control"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Jam Selesai</label>
            <input type="time"
                   name="end_time"
                   class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Lokasi</label>
            <input type="text"
                   name="location"
                   class="form-control"
                   placeholder="Contoh: GBI Tambunan">
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                      class="form-control"
                      rows="3"
                      placeholder="Masukkan deskripsi kegiatan"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Kategori</label>
            <select name="category" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="mingguan">Jadwal Mingguan</option>
                <option value="acara_khusus">Acara Khusus</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Icon</label>
            <input type="text"
                   name="icon"
                   class="form-control"
                   placeholder="Contoh: church, heart, calendar">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Jadwal
        </button>

    </form>

</div>

</div>

@endsection