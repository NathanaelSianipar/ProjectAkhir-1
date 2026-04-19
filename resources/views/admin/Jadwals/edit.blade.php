@extends('admin.layouts.main')

@section('content')
<style>
.form-wrap { max-width:720px; margin:0 auto; }
.form-card { background:#fff; border:1px solid #e4e8ef; border-radius:14px; padding:28px 32px; box-shadow:0 2px 10px rgba(0,0,0,.05); }
.form-card h2 { font-size:20px; font-weight:700; margin-bottom:20px; color:#1a2233; }
.fg { display:flex; flex-direction:column; gap:5px; margin-bottom:16px; }
.fg label { font-size:11px; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:#7a8499; }
.fg input, .fg textarea, .fg select {
  background:#f4f6f9; border:1px solid #e4e8ef; color:#1a2233;
  font-family:inherit; font-size:14px; padding:10px 14px;
  border-radius:8px; outline:none; transition:all .15s; resize:vertical; width:100%;
}
.fg input:focus, .fg textarea:focus, .fg select:focus { border-color:#1da8e0; background:#fff; box-shadow:0 0 0 3px rgba(29,168,224,.1); }
.form-row-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.btn-row { display:flex; gap:12px; align-items:center; flex-wrap:wrap; }
.btn-back   { display:inline-flex; align-items:center; gap:6px; background:#f0f2f5; border:1px solid #e4e8ef; color:#7a8499; font-size:13px; font-weight:600; padding:9px 16px; border-radius:8px; text-decoration:none; transition:all .15s; }
.btn-back:hover { background:#e4e8ef; color:#1a2233; }
.btn-submit { display:inline-flex; align-items:center; gap:6px; background:linear-gradient(135deg,#1da8e0,#0d85b5); border:none; color:#fff; font-size:13px; font-weight:700; padding:10px 22px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
.btn-submit:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

@media(max-width:900px) { .form-wrap { max-width:100%; } .form-card { padding:22px 20px; } }
@media(max-width:600px) {
  .form-card { padding:16px 14px; border-radius:10px; }
  .form-card h2 { font-size:17px; }
  .form-row-2 { grid-template-columns:1fr; gap:0; }
  .btn-submit { width:100%; justify-content:center; }
  .btn-row { flex-direction:column-reverse; align-items:stretch; }
  .btn-back { justify-content:center; }
}
</style>

<div class="form-wrap">
    <div class="form-card">
        <h2>✏️ Edit Jadwal Ibadah & Kegiatan</h2>

        <a href="{{ route('jadwal.index') }}" class="btn-back" style="display:inline-flex;margin-bottom:18px;">
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

        <form action="{{ route('jadwal.update', $Jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="fg">
                <label>Nama Kegiatan</label>
                <input type="text" name="title" value="{{ old('title', $Jadwal->title) }}" required>
            </div>

            <div class="form-row-2">
                <div class="fg">
                    <label>Hari</label>
                    <select name="day" required>
                        <option value="Senin" {{ old('day', $Jadwal->day) == 'Senin' ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{ old('day', $Jadwal->day) == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{ old('day', $Jadwal->day) == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{ old('day', $Jadwal->day) == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{ old('day', $Jadwal->day) == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{ old('day', $Jadwal->day) == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{ old('day', $Jadwal->day) == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                    </select>
                </div>
                <div class="fg">
                    <label>Kategori</label>
                    <select name="category" required>
                        <option value="mingguan" {{ old('category', $Jadwal->category) == 'mingguan' ? 'selected' : '' }}>Jadwal Mingguan</option>
                        <option value="acara_khusus" {{ old('category', $Jadwal->category) == 'acara_khusus' ? 'selected' : '' }}>Acara Khusus</option>
                    </select>
                </div>
            </div>

            <div class="form-row-2">
                <div class="fg">
                    <label>Jam Mulai</label>
                    <input type="time" name="start_time" value="{{ old('start_time', $Jadwal->start_time) }}" required>
                </div>
                <div class="fg">
                    <label>Jam Selesai</label>
                    <input type="time" name="end_time" value="{{ old('end_time', $Jadwal->end_time) }}">
                </div>
            </div>

            <div class="fg">
                <label>Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $Jadwal->location) }}">
            </div>

            <div class="fg">
                <label>Deskripsi</label>
                <textarea name="description" rows="3">{{ old('description', $Jadwal->description) }}</textarea>
            </div>

            <div class="fg">
                <label>Icon</label>
                <input type="text" name="icon" value="{{ old('icon', $Jadwal->icon) }}" placeholder="Contoh: 📅">
            </div>

            <div class="btn-row">
                <a href="{{ route('jadwal.index') }}" class="btn-back">← Batal</a>
                <button type="submit" class="btn-submit">✅ Update Jadwal</button>
            </div>
        </form>
    </div>
</div>

@endsection