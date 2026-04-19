@extends('admin.layouts.main')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Khotbah</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('khotbah.index') }}">Khotbah</a></li>
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
        @if($khotbah->thumbnail)
          <div class="card card-danger card-outline">
            <div class="card-body text-center p-5">
              <img src="{{ Storage::url($khotbah->thumbnail) }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;" alt="{{ $khotbah->title }}">
            </div>
          </div>
        @endif
        @if($khotbah->video_url)
          <div class="card mt-3">
            <div class="card-header bg-danger text-white">
              <h5 class="mb-0"><i class="fab fa-youtube"></i> Video Khotbah</h5>
            </div>
            <div class="card-body p-0">
              <div class="ratio ratio-16x9">
                <iframe src="{{ $khotbah->video_url }}" class="w-100 h-100" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="col-md-4">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">{{ $khotbah->title }}</h3>
          </div>
          <div class="card-body">
            @if($khotbah->preacher)
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-microphone"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pendeta</span>
                  <span class="info-box-number">{{ $khotbah->preacher }}</span>
                </div>
              </div>
            @endif
            @if($khotbah->date)
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tanggal</span>
                  <span class="info-box-number">{{ \Carbon\Carbon::parse($khotbah->date)->format('d M Y') }}</span>
                </div>
              </div>
            @endif
            @if($khotbah->description)
              <div class="mb-3">
                <label class="form-label fw-bold">Ringkasan:</label>
                <p class="text-muted">{{ $khotbah->description }}</p>
              </div>
            @endif
            @if($khotbah->bible_reference)
              <div class="alert alert-info">
                <strong>{{ $khotbah->bible_reference }}</strong>
              </div>
            @endif
          </div>
          <div class="card-footer">
            <a href="{{ route('khotbah.edit', $khotbah) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('khotbah.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            <form method="POST" action="{{ route('khotbah.destroy', $khotbah) }}" class="d-inline" onsubmit="return confirm('Hapus khotbah ini?')">
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

