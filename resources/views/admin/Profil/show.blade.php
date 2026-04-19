@extends('admin.layouts.main')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Profil Admin</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('profil.index') }}">Profil</a></li>
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
        @if($profil->foto)
          <div class="card card-primary card-outline">
            <div class="card-body text-center p-5">
              <img src="{{ Storage::url($profil->foto) }}" class="img-fluid rounded-circle" style="width: 250px; height: 250px; object-fit: cover; border: 5px solid white; box-shadow: 0 10px 30px rgba(0,0,0,.2);" alt="{{ $profil->name }}">
            </div>
          </div>
        @endif
      </div>
      <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ $profil->name }}</h3>
          </div>
          <div class="card-body">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-shield"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Jabatan</span>
                <span class="info-box-number">{{ $profil->jabatan ?? '-' }}</span>
              </div>
            </div>
            @if($profil->email)
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Email</span>
                  <span class="info-box-number">{{ $profil->email }}</span>
                </div>
              </div>
            @endif
            @if($profil->phone)
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-phone"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Telepon</span>
                  <span class="info-box-number">{{ $profil->phone }}</span>
                </div>
              </div>
            @endif
            @if($profil->lokasi)
              <div class="info-box">
                <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-map-marker-alt"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Lokasi</span>
                  <span class="info-box-number">{{ $profil->lokasi }}</span>
                </div>
              </div>
            @endif
          </div>
          <div class="card-footer">
            <a href="{{ route('profil.edit') }}" class="btn btn-warning btn-block mb-2"><i class="fas fa-edit"></i> Edit Profil</a>
            <a href="{{ route('profil.index') }}" class="btn btn-secondary btn-block"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

