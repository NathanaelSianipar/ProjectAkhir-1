@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Tambah Informasi Kontak</h1>

    <a href="{{ route('kontaks.index') }}" class="btn btn-secondary mb-3">
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

    <form action="{{ route('kontaks.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Alamat</label>
            <input type="text" 
                   name="address" 
                   class="form-control" 
                   placeholder="Masukkan alamat gereja"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Telepon</label>
            <input type="text" 
                   name="phone" 
                   class="form-control" 
                   placeholder="Masukkan nomor telepon"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" 
                   name="email" 
                   class="form-control" 
                   placeholder="Masukkan email gereja"
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Jam Sekretariat</label>
            <textarea name="office_hours" 
                      class="form-control" 
                      rows="3"
                      placeholder="Contoh: Senin - Jumat 09.00 - 17.00 WIB"></textarea>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Kontak
        </button>

    </form>

</div>

</div>
@endsection
