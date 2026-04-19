@extends('layouts.app')

@section('content')

<div class="container py-4" style="max-width: 850px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4">FORM DAFTAR JEMAAT & TAMBAHAN ANGGOTA</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('jemaat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">No KK *</label>
                    <input type="text" name="no_kk" class="form-control" value="{{ old('no_kk') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Keluarga *</label>
                    <input type="text" name="nama_keluarga" class="form-control" value="{{ old('nama_keluarga') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Domisili *</label>
                    <input type="text" name="alamat_domisili" class="form-control" value="{{ old('alamat_domisili') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat KTP</label>
                    <input type="text" name="alamat_ktp" class="form-control" value="{{ old('alamat_ktp') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Kolom *</label>
                    <input type="text" name="kolom" class="form-control" value="{{ old('kolom') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIK *</label>
                    <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Hubungan Keluarga</label>
                    <div>
                        @php $hubungan = old('hubungan_keluarga'); @endphp
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hubungan_keluarga" value="Suami" {{ $hubungan == 'Suami' ? 'checked' : '' }}>
                            <label class="form-check-label">Suami</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hubungan_keluarga" value="Istri" {{ $hubungan == 'Istri' ? 'checked' : '' }}>
                            <label class="form-check-label">Istri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hubungan_keluarga" value="Kepala Keluarga" {{ $hubungan == 'Kepala Keluarga' ? 'checked' : '' }}>
                            <label class="form-check-label">Kepala Keluarga</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hubungan_keluarga" value="Anak" {{ $hubungan == 'Anak' ? 'checked' : '' }}>
                            <label class="form-check-label">Anak</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hubungan_keluarga" value="Family Lain" {{ $hubungan == 'Family Lain' ? 'checked' : '' }}>
                            <label class="form-check-label">Family Lain</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    @php $jk = old('jenis_kelamin'); @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki" {{ $jk == 'Laki' ? 'checked' : '' }}>
                        <label class="form-check-label">Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" {{ $jk == 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Baptis</label>
                    @php $baptis = old('baptis', 'Belum'); @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="baptis" value="Sudah" {{ $baptis == 'Sudah' ? 'checked' : '' }}>
                        <label class="form-check-label">Sudah</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="baptis" value="Belum" {{ $baptis == 'Belum' ? 'checked' : '' }}>
                        <label class="form-check-label">Belum</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sidi</label>
                    @php $sidi = old('sidi', 'Belum'); @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sidi" value="Sudah" {{ $sidi == 'Sudah' ? 'checked' : '' }}>
                        <label class="form-check-label">Sudah</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sidi" value="Belum" {{ $sidi == 'Belum' ? 'checked' : '' }}>
                        <label class="form-check-label">Belum</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Handphone / WA</label>
                    <input type="text" name="handphone" class="form-control" value="{{ old('handphone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Nikah</label>
                    <input type="date" name="tanggal_nikah" class="form-control" value="{{ old('tanggal_nikah') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Domisili</label>
                    <input type="date" name="tanggal_domisili" class="form-control" value="{{ old('tanggal_domisili') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Surat Pindah (Attestasi)</label>
                    <input type="file" name="surat_attestasi" class="form-control">
                    <small class="text-muted">Surat Attestasi / Surat Pindah dari jemaat asal.</small>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Kirim Pendaftaran
                </button>
            </form>
        </div>
    </div>
</div>

@endsection