@extends('admin.layouts.main')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Kontak</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('kontak.index') }}">Kontak</a></li>
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
      <div class="col-md-6">
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">{{ $kontak->nama }}</h3>
          </div>
          <div class="card-body">
            <table class="table table-borderless">
              <tr>
                <td style="width: 40%; font-weight: bold;">Email:</td>
                <td>{{ $kontak->email }}</td>
              </tr>
              <tr>
                <td>Telepon:</td>
                <td>{{ $kontak->telepon }}</td>
              </tr>
              <tr>
                <td>Pesan:</td>
                <td>{{ $kontak->pesan }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Metadata</h3>
          </div>
          <div class="card-body">
            <table class="table table-borderless">
              <tr>
                <td style="width: 40%; font-weight: bold;">Dibuat:</td>
                <td>{{ $kontak->created_at->format('d M Y H:i') }}</td>
              </tr>
              <tr>
                <td>Status:</td>
                <td>
                  @if($kontak->status == 'baca')
                    <span class="badge badge-success">Sudah Dibaca</span>
                  @else
                    <span class="badge badge-warning">Belum Dibaca</span>
                  @endif
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <div class="card-footer">
          <a href="{{ route('kontak.edit', $kontak) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah Status</a>
          <a href="{{ route('kontak.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
          <form method="POST" action="{{ route('kontak.destroy', $kontak) }}" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

