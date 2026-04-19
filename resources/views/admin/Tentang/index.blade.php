@extends('admin.layouts.main')

@section('content')
<style>
  :root {
    --bg:#f4f6f9; --white:#ffffff; --border:#e4e8ef; --border2:#d0d7e3;
    --text:#1a2233; --muted:#7a8499; --cyan:#1da8e0; --cyan-dk:#0d85b5;
    --cyan-lt:#e8f6fd; --gold:#c89b3c; --gold-lt:#fdf6e3;
    --danger:#e05555; --danger-lt:#fdf0f0;
  }

  .content-header { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:8px; padding:18px 24px 0; }
  .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:21px; font-weight:700; }
  .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
  .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
  .content { padding:20px 24px 60px; }

  .page-hero {
    position:relative; overflow:hidden; border-radius:14px; margin-bottom:24px;
    background:linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
    padding:28px; box-shadow:0 6px 24px rgba(29,168,224,.25);
  }
  .hero-tag {
    display:inline-block; background:rgba(255,255,255,.2);
    border:1px solid rgba(255,255,255,.35); color:#fff;
    font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase;
    padding:3px 10px; border-radius:20px; margin-bottom:10px;
  }
  .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:26px; font-weight:700; color:#fff; margin-bottom:6px; }
  .page-hero p  { color:rgba(255,255,255,.82); font-size:13.5px; max-width:500px; line-height:1.65; }
  .hero-actions { margin-top:18px; display:flex; gap:10px; flex-wrap:wrap; }
  .btn-hero-primary, .btn-hero-outline, .edit-btn, .add-btn, .del-btn {
    text-decoration:none;
  }
  .btn-hero-primary {
    display:inline-flex; align-items:center; background:#fff; color:var(--cyan); border:none;
    font-size:13px; font-weight:700; padding:8px 18px; border-radius:8px;
  }
  .btn-hero-outline {
    display:inline-flex; align-items:center; background:rgba(255,255,255,.15); color:#fff;
    border:1px solid rgba(255,255,255,.4); font-size:13px; font-weight:700; padding:8px 18px; border-radius:8px;
  }

  .section-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; flex-wrap:wrap; gap:10px; }
  .section-title {
    font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700; color:var(--text);
    display:flex; align-items:center; gap:10px; flex:1;
  }
  .section-title::after { content:''; flex:1; height:1px; background:var(--border); }

  .sejarah-card, .vm-card, .leader-card, .empty-box {
    background:var(--white); border:1px solid var(--border); border-radius:12px;
    box-shadow:0 1px 6px rgba(0,0,0,.05);
  }
  .sejarah-card { padding:22px; margin-bottom:20px; }
  .sejarah-text, .leader-desc { font-size:14px; color:var(--muted); line-height:1.75; }

  .vm-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:24px; }
  .vm-card { padding:20px; }
  .vm-title { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:var(--text); margin-bottom:8px; }
  .vm-quote { font-size:13px; color:var(--muted); line-height:1.65; border-left:3px solid var(--cyan-lt); padding-left:12px; font-style:italic; }

  .leader-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(240px, 1fr)); gap:14px; }
  .leader-card { padding:24px 18px; text-align:center; }
  .leader-avatar {
    width:68px; height:68px; border-radius:50%; margin:0 auto 14px;
    background:linear-gradient(135deg, var(--cyan-lt), var(--cyan));
    display:flex; align-items:center; justify-content:center;
    font-size:24px; font-weight:700; color:var(--cyan-dk);
    border:3px solid var(--border); font-family:'Rajdhani',sans-serif;
    overflow:hidden;
  }
  .leader-avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
  .leader-name { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:var(--text); margin-bottom:4px; }
  .leader-role {
    display:inline-block; font-size:11px; font-weight:700;
    padding:3px 10px; border-radius:20px; margin-bottom:12px;
    background:var(--cyan-lt); color:var(--cyan);
  }
  .leader-actions { display:flex; gap:8px; justify-content:center; margin-top:14px; }

  .edit-btn, .add-btn, .del-btn {
    display:inline-flex; align-items:center; gap:5px;
    font-size:12px; font-weight:700; padding:6px 13px; border-radius:7px;
    border:1px solid transparent;
  }
  .edit-btn, .add-btn { background:var(--cyan-lt); color:var(--cyan); border-color:rgba(29,168,224,.25); }
  .del-btn { background:var(--danger-lt); color:var(--danger); border-color:rgba(224,85,85,.25); }

  .empty-box { padding:28px; text-align:center; color:var(--muted); }

  @media (max-width: 768px) {
    .content { padding:16px; }
    .content-header { padding:14px 16px 0; }
    .vm-grid { grid-template-columns:1fr; }
  }
</style>

<div class="content-header">
  <h1>Tentang Kami</h1>
  <div class="breadcrumb-bar">
    <a href="{{ route('welcome') }}">Home</a> / <span>Tentang Kami</span>
  </div>
</div>

<div class="content">
  <div class="page-hero">
    <div class="hero-tag">ℹ Halaman Publik</div>
    <h2>{{ $tentang->header_title ?? 'Data Tentang Gereja' }}</h2>
    <p>{{ $tentang->header_description ?? 'Kelola konten halaman Tentang Kami — sejarah, visi, misi, dan kepemimpinan gereja.' }}</p>
    <div class="hero-actions">
      @if($tentang)
        <a href="{{ route('tentang.edit', $tentang->id) }}" class="btn-hero-primary">✏ Edit Data</a>
        <form action="{{ route('tentang.destroy', $tentang->id) }}" method="POST" onsubmit="return confirm('Hapus data tentang?')" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-hero-outline" style="background:rgba(224,85,85,.18);">🗑 Hapus</button>
        </form>
      @else
        <a href="{{ route('tentang.create') }}" class="btn-hero-primary">＋ Tambah Data</a>
      @endif
    </div>
  </div>

  @if($tentang)
    <div class="section-head">
      <div class="section-title">📖 Sejarah Kami</div>
      <a href="{{ route('tentang.edit', $tentang->id) }}" class="edit-btn">✏ Edit</a>
    </div>
    <div class="sejarah-card">
      <div class="sejarah-text">
        {!! nl2br(e($tentang->sejarah)) !!}
      </div>
    </div>

    <div class="section-head">
      <div class="section-title">✨ Visi & Misi</div>
      <a href="{{ route('tentang.edit', $tentang->id) }}" class="edit-btn">✏ Edit</a>
    </div>
    <div class="vm-grid">
      <div class="vm-card">
        <div class="vm-title">Visi</div>
        <div class="vm-quote">{{ $tentang->visi }}</div>
      </div>
      <div class="vm-card">
        <div class="vm-title">Misi</div>
        <div class="vm-quote">{{ $tentang->misi }}</div>
      </div>
    </div>

    <div class="section-head">
      <div class="section-title">👤 Kepemimpinan</div>
      <a href="{{ route('tentang.edit', $tentang->id) }}" class="edit-btn">✏ Edit</a>
    </div>
    <div class="leader-grid">
      <div class="leader-card">
        <div class="leader-avatar">
          @if($tentang->gembala_foto)
            <img src="{{ asset('storage/' . $tentang->gembala_foto) }}" alt="{{ $tentang->gembala_nama }}">
          @else
            {{ strtoupper(substr($tentang->gembala_nama ?? 'G', 0, 2)) }}
          @endif
        </div>
        <div class="leader-name">{{ $tentang->gembala_nama }}</div>
        <div class="leader-role">{{ $tentang->gembala_jabatan ?: 'Pimpinan Gereja' }}</div>
        <div class="leader-desc">{{ $tentang->gembala_deskripsi ?: 'Belum ada deskripsi.' }}</div>
      </div>
    </div>
  @else
    <div class="empty-box">
      Belum ada data Tentang. Klik <strong>Tambah Data</strong> untuk mulai mengisi.
    </div>
  @endif
</div>
@endsection