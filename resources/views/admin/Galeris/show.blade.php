@extends('admin.layouts.main')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Galeri</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
          <li class="breadcrumb-item active">Show</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        @if($Galeri->image)
          <div class="card card-primary card-outline">
            <div class="card-body text-center p-5">
              <img src="{{ Storage::url($Galeri->image) }}" class="img-fluid" style="max-height: 500px; object-fit: cover;" alt="{{ $Galeri->title }}">
            </div>
          </div>
        @endif
      </div>
      <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ $Galeri->title }}</h3>
          </div>
          <div class="card-body">
            @if($Galeri->event_date)
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tanggal Kegiatan</span>
                  <span class="info-box-number">{{ $Galeri->event_date->format('d M Y') }}</span>
                </div>
              </div>
            @endif
            @if($Galeri->description)
              <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi:</label>
                <p class="text-muted">{{ $Galeri->description }}</p>
              </div>
            @endif
          </div>
          <div class="card-footer">
            <a href="{{ route('galeri.edit', $Galeri) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('galeri.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <form method="POST" action="{{ route('galeri.destroy', $Galeri) }}" class="d-inline" onsubmit="return confirm('Hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

