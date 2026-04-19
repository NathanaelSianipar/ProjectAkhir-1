@extends('admin.layouts.main')

@section('content')
<style>
.form-card {
  background:#fff; border:1px solid #e4e8ef; border-radius:14px;
  padding:28px; box-shadow:0 1px 8px rgba(0,0,0,.06); margin:20px 24px;
}
.form-card-title {
  font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700;
  margin-bottom:20px; padding-bottom:14px; border-bottom:1px solid #e4e8ef;
}
.fg { display:flex; flex-direction:column; gap:5px; margin-bottom:16px; }
.fg label { font-size:11px; font-weight:700; text-transform:uppercase; color:#7a8499; }
.fg input, .fg textarea {
  background:#f4f6f9; border:1px solid #e4e8ef; padding:10px 14px;
  border-radius:8px; outline:none; width:100%;
}
.form-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.form-actions { display:flex; gap:12px; flex-wrap:wrap; }
.btn-back, .btn-submit {
  display:inline-flex; align-items:center; justify-content:center;
  padding:10px 18px; border-radius:8px; font-weight:700; text-decoration:none;
}
.btn-back { background:#fff; color:#7a8499; border:1px solid #e4e8ef; }
.btn-submit { background:#1da8e0; color:#fff; border:none; }
.preview-img { display:none; width:100%; max-height:160px; object-fit:cover; border-radius:8px; margin-top:12px; border:1px solid #e4e8ef; }
@media(max-width:768px){ .form-row{grid-template-columns:1fr;} .form-card{margin:16px;} }
</style>

<div class="form-card">
  <div class="form-card-title">Tambah Data Tentang Gereja</div>

  @if ($errors->any())
    <div style="background:#fdf0f0;border:1px solid #e05555;border-radius:8px;padding:14px;margin-bottom:20px;color:#e05555;">
      <strong>Terjadi kesalahan!</strong>
      <ul style="padding-left:18px;margin-top:6px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('tentang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="fg">
      <label>Judul Header</label>
      <input type="text" name="header_title" value="{{ old('header_title') }}" required>
    </div>

    <div class="fg">
      <label>Deskripsi Header</label>
      <textarea name="header_description" rows="3">{{ old('header_description') }}</textarea>
    </div>

    <div class="fg">
      <label>Sejarah Gereja</label>
      <textarea name="sejarah" rows="5" required>{{ old('sejarah') }}</textarea>
    </div>

    <div class="form-row">
      <div class="fg">
        <label>Visi</label>
        <textarea name="visi" rows="4" required>{{ old('visi') }}</textarea>
      </div>
      <div class="fg">
        <label>Misi</label>
        <textarea name="misi" rows="4" required>{{ old('misi') }}</textarea>
      </div>
    </div>

    <div class="form-row">
      <div class="fg">
        <label>Nama Gembala</label>
        <input type="text" name="gembala_nama" value="{{ old('gembala_nama') }}" required>
      </div>
      <div class="fg">
        <label>Jabatan</label>
        <input type="text" name="gembala_jabatan" value="{{ old('gembala_jabatan') }}">
      </div>
    </div>

    <div class="fg">
      <label>Deskripsi Gembala</label>
      <textarea name="gembala_deskripsi" rows="3">{{ old('gembala_deskripsi') }}</textarea>
    </div>

    <div class="fg">
      <label>Foto Gembala</label>
      <input type="file" name="gembala_foto" accept="image/*" onchange="previewImage(event)">
      <img id="preview-img" class="preview-img">
    </div>

    <div class="form-actions">
      <a href="{{ route('tentang.index') }}" class="btn-back">Kembali</a>
      <button type="submit" class="btn-submit">Simpan</button>
    </div>
  </form>
</div>

<script>
function previewImage(event) {
  const file = event.target.files[0];
  const preview = document.getElementById('preview-img');
  if (!file) {
    preview.style.display = 'none';
    return;
  }
  preview.src = URL.createObjectURL(file);
  preview.style.display = 'block';
}
</script>
@endsection