@extends('admin.layouts.main')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Pelayanan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('pelayanan.index') }}">Pelayanan</a></li>
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
        @if($Pelayanan->photo)
          <div class="card card-success card-outline">
            <div class="card-body text-center p-5">
              <img src="{{ Storage::url($Pelayanan->photo) }}" class="img-fluid" style="max-height: 500px; object-fit: cover;" alt="{{ $Pelayanan->title }}">
            </div>
          </div>
        @else
          <div class="card bg-light">
            <div class="card-body text-center py-5">
              <i class="fas fa-users fa-5x text-muted mb-3"></i>
              <h4>Tidak ada foto</h4>
            </div>
          </div>
        @endif
      </div>
      <div class="col-md-4">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">{{ $Pelayanan->title }}</h3>
          </div>
          <div class="card-body">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Kategori</span>
                <span class="info-box-number text-capitalize">{{ $Pelayanan->category }}</span>
              </div>
            </div>
            
            @if($Pelayanan->leader)
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pemimpin</span>
                  <span class="info-box-number">{{ $Pelayanan->leader }}</span>
                </div>
              </div>
            @endif

            @if($Pelayanan->icon)
              <div class="text-center mb-4 p-3 bg-light rounded">
                <div style="font-size: 4rem;">{{ $Pelayanan->icon }}</div>
              </div>
            @endif

            @if($Pelayanan->description)
              <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi:</label>
                <div class="border-start border-primary ps-3">
                  <p class="text-muted mb-0">{{ $Pelayanan->description }}</p>
                </div>
              </div>
            @endif
          </div>
          <div class="card-footer">
            <a href="{{ route('pelayanan.edit', $Pelayanan) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('pelayanan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <form method="POST" action="{{ route('pelayanan.destroy', $Pelayanan) }}" class="d-inline" onsubmit="return confirm('Yakin hapus pelayanan ini?')">
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

