@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

```
    <h1>Edit Informasi Kontak</h1>

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

    <form action="{{ route('kontaks.update', $Kontak->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Alamat</label>
            <input type="text" 
                   name="address" 
                   value="{{ $Kontak->address }}" 
                   class="form-control" 
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Telepon</label>
            <input type="text" 
                   name="phone" 
                   value="{{ $Kontak->phone }}" 
                   class="form-control" 
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" 
                   name="email" 
                   value="{{ $Kontak->email }}" 
                   class="form-control" 
                   required>
        </div>

        <div class="form-group mb-3">
            <label>Jam Sekretariat</label>
            <textarea name="office_hours" 
                      class="form-control" 
                      rows="3">{{ $Kontak->office_hours }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Kontak
        </button>

    </form>

</div>

</div>
@endsection
