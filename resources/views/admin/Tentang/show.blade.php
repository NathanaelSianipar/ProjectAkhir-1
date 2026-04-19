@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Tentang – Admin GBI Tambunan</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:#f4f6f9; --white:#ffffff; --border:#e4e8ef;
      --text:#1a2233; --muted:#7a8499;
      --cyan:#1da8e0; --cyan-dk:#0d85b5; --cyan-lt:#e8f6fd;
      --gold:#c89b3c; --gold-lt:#fdf6e3;
      --danger:#e05555; --danger-lt:#fdf0f0;
      --success:#2ea86a; --success-lt:#e8f7ef;
      --sidebar-w:240px; --topbar-h:56px; --sidebar:#1e2430;
    }
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    body { background:var(--bg); font-family:'Nunito',sans-serif; color:var(--text); min-height:100vh; }
    .topbar { position:fixed; top:0; left:0; right:0; z-index:200; height:var(--topbar-h); display:flex; align-items:center; background:var(--white); border-bottom:1px solid var(--border); box-shadow:0 1px 8px rgba(0,0,0,.06); }
    .topbar-left { display:flex; align-items:center; width:var(--sidebar-w); height:100%; flex-shrink:0; background:var(--sidebar); padding:0 16px; gap:10px; }
    .hamburger { background:none; border:none; color:rgba(255,255,255,.55); font-size:20px; cursor:pointer; padding:4px; transition:color .15s; }
    .hamburger:hover { color:#fff; }
    .brand { display:flex; align-items:center; gap:10px; text-decoration:none; }
    .brand-logo { width:30px; height:30px; background:linear-gradient(135deg,var(--cyan),var(--gold)); border-radius:7px; display:flex; align-items:center; justify-content:center; font-family:'Rajdhani',sans-serif; font-weight:700; font-size:12px; color:#fff; }
    .brand-name { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:#fff; white-space:nowrap; }
    .brand-name span { color:var(--cyan); }
    .topbar-center { flex:1; padding:0 12px; overflow:hidden; }
    .topbar-nav { display:flex; gap:2px; overflow-x:auto; }
    .topbar-nav::-webkit-scrollbar { display:none; }
    .topbar-nav a { color:var(--muted); font-size:12.5px; font-weight:600; text-decoration:none; padding:5px 10px; border-radius:6px; transition:all .15s; white-space:nowrap; }
    .topbar-nav a:hover { color:var(--text); background:#f0f2f5; }
    .topbar-nav a.active { color:var(--cyan); background:var(--cyan-lt); }
    .topbar-right { display:flex; align-items:center; gap:10px; padding-right:16px; }
    .avatar { width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#fff; cursor:pointer; overflow:hidden; }
    .avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
    .sidebar { position:fixed; top:var(--topbar-h); left:0; bottom:0; width:var(--sidebar-w); background:var(--sidebar); display:flex; flex-direction:column; overflow-y:auto; z-index:100; transition:transform .28s cubic-bezier(.4,0,.2,1); }
    .sidebar-user { display:flex; align-items:center; gap:12px; padding:16px 16px 12px; border-bottom:1px solid rgba(255,255,255,.07); }
    .sidebar-user .ava { width:38px; height:38px; border-radius:50%; flex-shrink:0; overflow:hidden; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:700; color:#fff; }
    .sidebar-user .ava img { width:100%; height:100%; object-fit:cover; }
    .sidebar-user .info strong { display:block; font-size:13px; font-weight:700; color:#fff; }
    .sidebar-user .info span { font-size:11px; color:var(--cyan); }
    .nav-section { padding:10px 16px 4px; font-size:10px; font-weight:700; letter-spacing:1.4px; color:rgba(255,255,255,.25); text-transform:uppercase; }
    .sidebar nav a { display:flex; align-items:center; gap:10px; padding:9px 16px; font-size:13px; font-weight:600; color:rgba(255,255,255,.5); text-decoration:none; border-left:3px solid transparent; transition:all .15s; }
    .sidebar nav a:hover { color:#fff; background:rgba(255,255,255,.06); }
    .sidebar nav a.active { color:#fff; border-left-color:var(--cyan); background:rgba(29,168,224,.15); }
    .sidebar nav a .ico { font-size:15px; width:20px; text-align:center; flex-shrink:0; }
    .sidebar-footer { margin-top:auto; padding:12px 16px; border-top:1px solid rgba(255,255,255,.07); font-size:11px; color:rgba(255,255,255,.3); }
    .sidebar-footer strong { color:rgba(255,255,255,.6); display:block; margin-bottom:2px; }
    .sidebar-overlay { display:none; position:fixed; inset:0; z-index:99; background:rgba(0,0,0,.45); backdrop-filter:blur(2px); }
    .sidebar-overlay.open { display:block; }
    .wrapper { margin-left:var(--sidebar-w); padding-top:var(--topbar-h); min-height:100vh; }
    .content-header { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px; padding:18px 24px 0; }
    .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:21px; font-weight:700; }
    .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
    .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
    .content { padding:20px 24px 60px; }

    /* HEADER ACTIONS BAR */
    .action-bar {
      display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap;
      gap:10px; margin-bottom:20px;
    }
    .action-bar-left { display:flex; gap:10px; align-items:center; }
    .btn-back { display:inline-flex; align-items:center; gap:7px; background:var(--white); color:var(--muted); border:1px solid var(--border); font-family:'Nunito',sans-serif; font-size:13px; font-weight:600; padding:8px 16px; border-radius:8px; cursor:pointer; transition:all .15s; text-decoration:none; }
    .btn-back:hover { color:var(--text); border-color:#c0c9d8; }
    .btn-edit { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; border:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:8px 18px; border-radius:8px; cursor:pointer; transition:all .2s; text-decoration:none; box-shadow:0 3px 10px rgba(29,168,224,.25); }
    .btn-edit:hover { transform:translateY(-1px); box-shadow:0 6px 18px rgba(29,168,224,.4); }
    .btn-delete { display:inline-flex; align-items:center; gap:7px; background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.25); font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:8px 18px; border-radius:8px; cursor:pointer; transition:all .15s; }
    .btn-delete:hover { background:var(--danger); color:#fff; }

    /* DETAIL CARDS */
    .detail-card { background:var(--white); border:1px solid var(--border); border-radius:14px; padding:24px; box-shadow:0 1px 8px rgba(0,0,0,.05); margin-bottom:18px; animation:fadeUp .35s ease both; }
    @keyframes fadeUp { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }
    .detail-card-title { font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700; color:var(--text); margin-bottom:18px; padding-bottom:12px; border-bottom:1px solid var(--border); display:flex; align-items:center; gap:10px; }
    .detail-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
    .detail-field { margin-bottom:16px; }
    .detail-field:last-child { margin-bottom:0; }
    .field-label { font-size:10px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:var(--muted); margin-bottom:5px; }
    .field-value { font-size:14px; color:var(--text); line-height:1.7; }
    .field-value.empty { color:var(--muted); font-style:italic; font-size:13px; }

    /* KEPEMIMPINAN PROFILE */
    .leader-profile {
      display:flex; align-items:flex-start; gap:20px; flex-wrap:wrap;
    }
    .leader-photo-wrap { flex-shrink:0; }
    .leader-photo-wrap img { width:100px; height:100px; object-fit:cover; border-radius:12px; border:2px solid var(--border); }
    .leader-photo-placeholder {
      width:100px; height:100px; border-radius:12px; border:2px solid var(--border);
      background:linear-gradient(135deg,var(--cyan-lt),var(--cyan));
      display:flex; align-items:center; justify-content:center;
      font-family:'Rajdhani',sans-serif; font-size:32px; font-weight:700; color:var(--cyan-dk);
    }
    .leader-info { flex:1; min-width:0; }
    .leader-name-show { font-family:'Rajdhani',sans-serif; font-size:20px; font-weight:700; color:var(--text); margin-bottom:4px; }
    .leader-role-badge { display:inline-block; font-size:11px; font-weight:700; letter-spacing:.6px; text-transform:uppercase; padding:3px 12px; border-radius:20px; margin-bottom:12px; background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.2); }
    .leader-desc-show { font-size:13.5px; color:var(--muted); line-height:1.7; }

    /* METADATA */
    .meta-strip { display:flex; align-items:center; gap:14px; flex-wrap:wrap; padding:12px 16px; background:var(--bg); border:1px solid var(--border); border-radius:8px; font-size:12px; color:var(--muted); margin-top:4px; }
    .meta-strip .meta-item { display:flex; align-items:center; gap:5px; }

    @media (max-width: 1024px) { .topbar-nav { display:none; } }
    @media (max-width: 900px) {
      .topbar-left { width:auto; padding:0 12px; }
      .brand-name { display:none; }
      .sidebar { transform:translateX(-100%); }
      .sidebar.open { transform:translateX(0); }
      .wrapper { margin-left:0 !important; }
      .content-header { padding:14px 16px 0; }
      .content { padding:16px 16px 60px; }
      .detail-card { padding:18px 16px; }
      .detail-row { grid-template-columns:1fr; }
    }
    @media (max-width: 480px) {
      .content { padding:12px 12px 60px; }
      .action-bar { flex-direction:column; align-items:stretch; }
      .action-bar-left { flex-direction:column; }
      .btn-back, .btn-edit, .btn-delete { width:100%; justify-content:center; }
      .leader-profile { flex-direction:column; align-items:center; text-align:center; }
    }
  </style>
</head>
<body>

<header class="topbar">
  <div class="topbar-left">
    <button class="hamburger" id="menuBtn">☰</button>
    <a class="brand" href="#">
      <div class="brand-logo">GBI</div>
      <span class="brand-name">GBI <span>Tambunan</span></span>
    </a>
  </div>
  <div class="topbar-center">
    <nav class="topbar-nav">
      <a href="{{ route('welcome') }}">Beranda</a>
      <a href="{{ route('tentang.index') }}" class="active">Tentang Kami</a>
      <a href="{{ route('jadwal.index') }}">Jadwal Ibadah</a>
      <a href="{{ route('galeri.index') }}">Galeri</a>
      <a href="{{ route('khotbah.index') }}">Khotbah</a>
      <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
    </nav>
  </div>
  <div class="topbar-right">
    <div class="avatar" id="tbAva">A</div>
  </div>
</header>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-user">
    <div class="ava" id="sbAva">A</div>
    <div class="info">
      <strong id="sbName">Admin GBI</strong>
      <span id="sbRole">Administrator</span>
    </div>
  </div>
  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}"><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}" class="active"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwal.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeri.index') }}"><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="ico">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}"><span class="ico">🙌</span> Pelayanan</a>
    <a href="{{ route('kontak.index') }}"><span class="ico">✉</span> Kontak</a>
  </nav>
  <div class="nav-section">Pengaturan</div>
  <nav>
    <a href="{{ route('profil.index') }}"><span class="ico">👤</span> Profil Admin</a>
    <a href="#"><span class="ico">⚙</span> Pengaturan</a>
    <a href="#" onclick="document.getElementById('logout-form').submit()"><span class="ico">🚪</span> Keluar</a>
  </nav>
  <div class="sidebar-footer"><strong>Kelompok 5 PA-1</strong>Version 1.0.0</div>
</aside>

<div class="wrapper">
  <div class="content-header">
    <h1>Detail Tentang Gereja</h1>
    <div class="breadcrumb-bar">
      <a href="{{ route('tentang.index') }}">Tentang Kami</a> / <span>Detail</span>
    </div>
  </div>

  <div class="content">

    <!-- ACTION BAR -->
    <div class="action-bar">
      <div class="action-bar-left">
        <a href="{{ route('tentang.index') }}" class="btn-back">← Kembali</a>
        <a href="{{ route('tentang.edit', $tentang->id) }}" class="btn-edit">✏ Edit Data</a>
      </div>
      <form action="{{ route('tentang.destroy', $tentang->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf @method('DELETE')
        <button type="submit" class="btn-delete">🗑 Hapus</button>
      </form>
    </div>

    <!-- INFORMASI UTAMA -->
    <div class="detail-card" style="animation-delay:.05s">
      <div class="detail-card-title">📋 Informasi Utama</div>
      <div class="detail-field">
        <div class="field-label">Judul Header</div>
        <div class="field-value">{{ $tentang->header_title ?? '-' }}</div>
      </div>
      <div class="detail-field">
        <div class="field-label">Deskripsi Header</div>
        <div class="field-value {{ !$tentang->header_description ? 'empty' : '' }}">
          {{ $tentang->header_description ?? 'Tidak ada deskripsi' }}
        </div>
      </div>
    </div>

    <!-- SEJARAH -->
    <div class="detail-card" style="animation-delay:.1s">
      <div class="detail-card-title">📖 Sejarah Gereja</div>
      <div class="detail-field">
        <div class="field-value" style="white-space:pre-line;">{{ $tentang->sejarah ?? '-' }}</div>
      </div>
    </div>

    <!-- VISI MISI -->
    <div class="detail-card" style="animation-delay:.15s">
      <div class="detail-card-title">✨ Visi & Misi</div>
      <div class="detail-row">
        <div class="detail-field">
          <div class="field-label">Visi</div>
          <div class="field-value" style="border-left:3px solid var(--cyan-lt);padding-left:12px;font-style:italic;color:var(--muted);">
            {{ $tentang->visi ?? '-' }}
          </div>
        </div>
        <div class="detail-field">
          <div class="field-label">Misi</div>
          <div class="field-value" style="border-left:3px solid var(--gold-lt);padding-left:12px;font-style:italic;color:var(--muted);">
            {{ $tentang->misi ?? '-' }}
          </div>
        </div>
      </div>
    </div>

    <!-- KEPEMIMPINAN -->
    <div class="detail-card" style="animation-delay:.2s">
      <div class="detail-card-title">👤 Kepemimpinan</div>
      <div class="leader-profile">
        <div class="leader-photo-wrap">
          @if($tentang->gembala_foto)
            <img src="{{ asset('storage/'.$tentang->gembala_foto) }}" alt="Foto Gembala"/>
          @else
            <div class="leader-photo-placeholder">
              {{ strtoupper(substr($tentang->gembala_nama ?? 'G', 0, 2)) }}
            </div>
          @endif
        </div>
        <div class="leader-info">
          <div class="leader-name-show">{{ $tentang->gembala_nama ?? '-' }}</div>
          @if($tentang->gembala_jabatan)
            <div class="leader-role-badge">{{ $tentang->gembala_jabatan }}</div>
          @endif
          <div class="leader-desc-show {{ !$tentang->gembala_deskripsi ? 'empty' : '' }}">
            {{ $tentang->gembala_deskripsi ?? 'Tidak ada deskripsi.' }}
          </div>
        </div>
      </div>
    </div>

    <!-- METADATA -->
    <div class="meta-strip">
      <div class="meta-item">🕒 Dibuat: {{ $tentang->created_at ? $tentang->created_at->format('d M Y, H:i') : '-' }}</div>
      <div class="meta-item">✏ Diperbarui: {{ $tentang->updated_at ? $tentang->updated_at->format('d M Y, H:i') : '-' }}</div>
      <div class="meta-item">🆔 ID: {{ $tentang->id }}</div>
    </div>

  </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>

<script>
const menuBtn = document.getElementById('menuBtn');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
function openSidebar()  { sidebar.classList.add('open'); sidebarOverlay.classList.add('open'); }
function closeSidebar() { sidebar.classList.remove('open'); sidebarOverlay.classList.remove('open'); }
menuBtn.addEventListener('click', () => sidebar.classList.contains('open') ? closeSidebar() : openSidebar());
sidebarOverlay.addEventListener('click', closeSidebar);
window.addEventListener('resize', () => { if (window.innerWidth > 900) closeSidebar(); });
</script>
</body>
</html>
@endsection