@extends('admin.layouts.main')

@section('content')
<style>
.form-wrap { max-width:720px; margin:0 auto; }
.form-card { background:#fff; border:1px solid #e4e8ef; border-radius:14px; padding:28px 32px; box-shadow:0 2px 10px rgba(0,0,0,.05); }
.form-card h2 { font-size:20px; font-weight:700; margin-bottom:20px; color:#1a2233; }
.fg { display:flex; flex-direction:column; gap:5px; margin-bottom:16px; }
.fg label { font-size:11px; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:#7a8499; }
.fg input, .fg textarea {
  background:#f4f6f9; border:1px solid #e4e8ef; color:#1a2233;
  font-family:inherit; font-size:14px; padding:10px 14px;
  border-radius:8px; outline:none; transition:all .15s; resize:vertical; width:100%;
}
.fg input[type=file] { padding:8px; }
.fg input:focus, .fg textarea:focus { border-color:#1da8e0; background:#fff; box-shadow:0 0 0 3px rgba(29,168,224,.1); }
.img-preview { width:100%; max-width:200px; height:auto; border-radius:8px; border:1px solid #e4e8ef; margin-top:8px; object-fit:cover; }
.btn-row { display:flex; gap:12px; align-items:center; flex-wrap:wrap; }
.btn-back   { display:inline-flex; align-items:center; gap:6px; background:#f0f2f5; border:1px solid #e4e8ef; color:#7a8499; font-size:13px; font-weight:600; padding:9px 16px; border-radius:8px; text-decoration:none; transition:all .15s; }
.btn-back:hover { background:#e4e8ef; color:#1a2233; }
.btn-submit { display:inline-flex; align-items:center; gap:6px; background:linear-gradient(135deg,#1da8e0,#0d85b5); border:none; color:#fff; font-size:13px; font-weight:700; padding:10px 22px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
.btn-submit:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

@media(max-width:900px) { .form-wrap { max-width:100%; } .form-card { padding:22px 20px; } }
@media(max-width:600px) {
  .form-card { padding:16px 14px; border-radius:10px; }
  .form-card h2 { font-size:17px; }
  .img-preview { max-width:100%; }
  .btn-submit { width:100%; justify-content:center; }
  .btn-row { flex-direction:column-reverse; align-items:stretch; }
  .btn-back { justify-content:center; }
}
</style>

<div class="form-wrap">
    <div class="form-card">
        <h2>✏️ Edit Khotbah</h2>

        <a href="{{ route('khotbah.index') }}" class="btn-back" style="display:inline-flex;margin-bottom:18px;">
            ← Kembali
        </a>

        @if ($errors->any())
            <div style="background:#fdf0f0;border:1px solid #f5c6cb;border-radius:8px;padding:14px;margin-bottom:18px;color:#e05555;font-size:13px;">
                <strong>Terjadi kesalahan!</strong>
                <ul style="margin:6px 0 0 16px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('khotbah.update', $khotbah->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="fg">
                <label>Judul Khotbah</label>
                <input type="text" name="title" value="{{ old('title', $khotbah->title) }}" required>
            </div>

            <div class="fg">
                <label>Link Video</label>
                <input type="text" name="video" value="{{ old('video', $khotbah->video) }}" placeholder="https://youtube.com/...">
            </div>

            <div class="fg">
                <label>Tanggal Khotbah</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $khotbah->tanggal) }}">
            </div>

            <div class="fg">
                <label>Deskripsi</label>
                <textarea name="description" rows="3">{{ old('description', $khotbah->description) }}</textarea>
            </div>

            <div class="fg">
                <label>Thumbnail Video</label>
                <input type="file" name="thumbnail" accept="image/*">

                @if($khotbah->thumbnail)
                    <img src="{{ asset('storage/'.$khotbah->thumbnail) }}" class="img-preview" alt="Thumbnail khotbah">
                @endif
            </div>

            <div class="btn-row">
                <a href="{{ route('khotbah.index') }}" class="btn-back">← Batal</a>
                <button type="submit" class="btn-submit">✅ Update Khotbah</button>
            </div>
        </form>
    </div>
</div>

@endsection