<?php
// resources/views/tentang/index.php
// Untuk Laravel: rename ke index.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tentang Kami – Admin GBI Tambunan</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:        #f4f6f9;
      --white:     #ffffff;
      --border:    #e4e8ef;
      --border2:   #d0d7e3;
      --text:      #1a2233;
      --muted:     #7a8499;
      --cyan:      #1da8e0;
      --cyan-dk:   #0d85b5;
      --cyan-lt:   #e8f6fd;
      --gold:      #c89b3c;
      --gold-lt:   #fdf6e3;
      --danger:    #e05555;
      --danger-lt: #fdf0f0;
      --success:   #2ea86a;
      --success-lt:#e8f7ef;
      --sidebar:   #1e2430;
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:var(--bg); font-family:'Nunito',sans-serif; color:var(--text); min-height:100vh; }

    /* ─── TOPBAR ─── */
    .topbar {
      position:fixed; top:0; left:0; right:0; z-index:200;
      height:56px; display:flex; align-items:center; justify-content:space-between;
      padding:0 20px 0 0;
      background:var(--white); border-bottom:1px solid var(--border);
      box-shadow:0 1px 8px rgba(0,0,0,.06);
    }
    .topbar-left {
      display:flex; align-items:center; width:240px; height:100%; flex-shrink:0;
      background:var(--sidebar); padding:0 18px;
    }
    .hamburger { background:none; border:none; color:rgba(255,255,255,.5); font-size:20px; cursor:pointer; margin-right:12px; transition:color .15s; }
    .hamburger:hover { color:#fff; }
    .brand { display:flex; align-items:center; gap:10px; text-decoration:none; }
    .brand-logo {
      width:32px; height:32px; background:linear-gradient(135deg,var(--cyan),var(--gold));
      border-radius:7px; display:flex; align-items:center; justify-content:center;
      font-family:'Rajdhani',sans-serif; font-weight:700; font-size:13px; color:#fff; flex-shrink:0;
    }
    .brand-name { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:#fff; }
    .brand-name span { color:var(--cyan); }
    .topbar-nav { display:flex; align-items:center; gap:2px; flex:1; padding:0 14px; }
    .topbar-nav a {
      color:var(--muted); font-size:13px; font-weight:600;
      text-decoration:none; padding:5px 12px; border-radius:6px; transition:all .15s;
    }
    .topbar-nav a:hover { color:var(--text); background:#f0f2f5; }
    .topbar-nav a.active { color:var(--cyan); background:var(--cyan-lt); }
    .topbar-right { display:flex; align-items:center; gap:12px; }
    .btn-viewsite {
      background:var(--cyan-lt); border:1px solid rgba(29,168,224,.3); color:var(--cyan);
      font-family:'Nunito',sans-serif; font-size:12px; font-weight:700;
      padding:5px 14px; border-radius:6px; cursor:pointer; transition:all .15s;
    }
    .btn-viewsite:hover { background:var(--cyan); color:#fff; }
    .avatar {
      width:32px; height:32px; border-radius:50%;
      background:linear-gradient(135deg,var(--gold),var(--cyan));
      display:flex; align-items:center; justify-content:center;
      font-size:12px; font-weight:700; color:#fff; cursor:pointer;
    }

    /* ─── SIDEBAR ─── */
    .sidebar {
      position:fixed; top:56px; left:0; bottom:0; width:240px;
      background:var(--sidebar); display:flex; flex-direction:column; overflow-y:auto; z-index:100;
    }
    .sidebar-user {
      display:flex; align-items:center; gap:12px; padding:18px 18px 14px;
      border-bottom:1px solid rgba(255,255,255,.07);
    }
    .sidebar-user .ava {
      width:40px; height:40px; border-radius:50%;
      background:linear-gradient(135deg,var(--gold),var(--cyan));
      display:flex; align-items:center; justify-content:center;
      font-size:15px; font-weight:700; color:#fff; flex-shrink:0;
    }
    .sidebar-user .info strong { display:block; font-size:14px; font-weight:700; color:#fff; }
    .sidebar-user .info span   { font-size:11px; color:var(--cyan); }
    .sidebar-search {
      display:flex; align-items:center; gap:8px; margin:12px 14px;
      background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.1);
      border-radius:7px; padding:7px 12px;
    }
    .sidebar-search input { background:none; border:none; outline:none; color:#fff; font-family:'Nunito',sans-serif; font-size:13px; flex:1; }
    .sidebar-search input::placeholder { color:rgba(255,255,255,.3); }
    .nav-section { padding:10px 18px 4px; font-size:10px; font-weight:700; letter-spacing:1.4px; color:rgba(255,255,255,.25); text-transform:uppercase; }
    .sidebar nav a {
      display:flex; align-items:center; gap:10px; padding:9px 18px;
      font-size:13.5px; font-weight:600; color:rgba(255,255,255,.5);
      text-decoration:none; border-left:3px solid transparent; transition:all .15s;
    }
    .sidebar nav a:hover { color:#fff; background:rgba(255,255,255,.06); }
    .sidebar nav a.active { color:#fff; border-left-color:var(--cyan); background:rgba(29,168,224,.15); }
    .sidebar nav a .ico { font-size:15px; width:20px; text-align:center; }
    .sidebar-footer { margin-top:auto; padding:14px 18px; border-top:1px solid rgba(255,255,255,.07); font-size:11px; color:rgba(255,255,255,.3); }
    .sidebar-footer strong { color:rgba(255,255,255,.6); display:block; }

    /* ─── WRAPPER ─── */
    .wrapper { margin-left:240px; padding-top:56px; min-height:100vh; }

    /* ─── CONTENT HEADER ─── */
    .content-header {
      display:flex; align-items:center; justify-content:space-between;
      padding:20px 28px 0;
    }
    .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; }
    .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
    .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
    .breadcrumb-bar a:hover { text-decoration:underline; }

    /* ─── CONTENT ─── */
    .content { padding:22px 28px 60px; }

    /* ─── HERO BANNER ─── */
    .page-hero {
      position:relative; overflow:hidden;
      border-radius:16px; margin-bottom:28px;
      background:linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
      padding:36px 40px;
      box-shadow:0 6px 24px rgba(29,168,224,.25);
    }
    .page-hero::before {
      content:''; position:absolute; inset:0;
      background:
        radial-gradient(ellipse 50% 80% at 95% 50%, rgba(255,255,255,.12) 0%, transparent 65%),
        radial-gradient(ellipse 35% 60% at 5%  90%, rgba(200,155,60,.18) 0%, transparent 55%);
      pointer-events:none;
    }
    .hero-tag {
      display:inline-block; background:rgba(255,255,255,.2);
      border:1px solid rgba(255,255,255,.35); color:#fff;
      font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase;
      padding:4px 12px; border-radius:20px; margin-bottom:12px;
    }
    .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:28px; font-weight:700; color:#fff; margin-bottom:8px; }
    .page-hero p  { color:rgba(255,255,255,.8); font-size:14px; max-width:520px; line-height:1.65; }
    .hero-actions { margin-top:20px; display:flex; gap:10px; }
    .btn-hero-primary {
      background:#fff; color:var(--cyan); border:none;
      font-family:'Nunito',sans-serif; font-size:13px; font-weight:700;
      padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s;
      box-shadow:0 3px 10px rgba(0,0,0,.1);
    }
    .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); }
    .btn-hero-outline {
      background:rgba(255,255,255,.15); color:#fff;
      border:1px solid rgba(255,255,255,.4);
      font-family:'Nunito',sans-serif; font-size:13px; font-weight:700;
      padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s;
    }
    .btn-hero-outline:hover { background:rgba(255,255,255,.25); }

    /* ─── SECTION TITLE ─── */
    .section-title {
      font-family:'Rajdhani',sans-serif; font-size:18px; font-weight:700; color:var(--text);
      letter-spacing:.4px; margin-bottom:16px;
      display:flex; align-items:center; gap:10px;
    }
    .section-title::after { content:''; flex:1; height:1px; background:var(--border); }

    /* ─── SEJARAH ─── */
    .sejarah-card {
      background:var(--white); border:1px solid var(--border); border-radius:14px;
      padding:28px; margin-bottom:20px;
      box-shadow:0 1px 6px rgba(0,0,0,.05);
    }
    .sejarah-card .edit-bar {
      display:flex; align-items:flex-start; justify-content:space-between; gap:16px;
    }
    .sejarah-text { flex:1; font-size:14px; color:var(--muted); line-height:1.75; }
    .sejarah-text p { margin-bottom:10px; }
    .sejarah-text p:last-child { margin-bottom:0; }

    .milestone-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
    .milestone-card {
      background:var(--white); border:1px solid var(--border); border-radius:12px;
      padding:24px 22px; display:flex; align-items:center; gap:18px;
      box-shadow:0 1px 4px rgba(0,0,0,.04);
      transition:transform .2s, box-shadow .2s;
      animation:fadeUp .4s ease both;
    }
    .milestone-card:nth-child(1){animation-delay:.05s}
    .milestone-card:nth-child(2){animation-delay:.12s}
    .milestone-card:hover { transform:translateY(-3px); box-shadow:0 8px 20px rgba(0,0,0,.08); }
    @keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
    .ms-icon {
      width:54px; height:54px; border-radius:14px; flex-shrink:0;
      display:flex; align-items:center; justify-content:center; font-size:24px;
    }
    .ms-icon.c { background:var(--cyan-lt); }
    .ms-icon.g { background:var(--gold-lt); }
    .ms-year { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; color:var(--text); line-height:1; }
    .ms-label { font-size:12.5px; color:var(--muted); margin-top:4px; line-height:1.5; }

    /* ─── VISI MISI ─── */
    .vm-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:8px; }
    .vm-card {
      background:var(--white); border:1px solid var(--border); border-radius:12px;
      padding:24px 22px; box-shadow:0 1px 4px rgba(0,0,0,.04);
      transition:transform .2s, box-shadow .2s;
      animation:fadeUp .4s ease both;
    }
    .vm-card:nth-child(1){animation-delay:.05s}
    .vm-card:nth-child(2){animation-delay:.12s}
    .vm-card:hover { transform:translateY(-3px); box-shadow:0 8px 20px rgba(0,0,0,.08); }
    .vm-icon {
      width:46px; height:46px; border-radius:12px; margin-bottom:14px;
      display:flex; align-items:center; justify-content:center; font-size:20px;
    }
    .vm-icon.c { background:var(--cyan-lt); }
    .vm-icon.g { background:var(--gold-lt); }
    .vm-icon.s { background:var(--success-lt); }
    .vm-icon.r { background:var(--danger-lt); }
    .vm-title { font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700; color:var(--text); margin-bottom:8px; }
    .vm-quote {
      font-size:13px; color:var(--muted); line-height:1.65;
      border-left:3px solid var(--cyan-lt); padding-left:12px; font-style:italic;
    }
    .vm-card:nth-child(2) .vm-quote { border-left-color:var(--gold-lt); }

    /* ─── KEPEMIMPINAN ─── */
    .leader-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(260px, 1fr)); gap:16px; }
    .leader-card {
      background:var(--white); border:1px solid var(--border); border-radius:14px;
      padding:28px 22px; text-align:center; box-shadow:0 1px 6px rgba(0,0,0,.05);
      transition:transform .2s, box-shadow .2s;
      animation:fadeUp .4s ease both;
    }
    .leader-card:nth-child(1){animation-delay:.05s}
    .leader-card:nth-child(2){animation-delay:.12s}
    .leader-card:nth-child(3){animation-delay:.19s}
    .leader-card:hover { transform:translateY(-4px); box-shadow:0 10px 28px rgba(0,0,0,.10); }
    .leader-avatar {
      width:72px; height:72px; border-radius:50%; margin:0 auto 16px;
      background:linear-gradient(135deg, var(--cyan-lt), var(--cyan));
      display:flex; align-items:center; justify-content:center;
      font-size:26px; font-weight:700; color:var(--cyan-dk);
      border:3px solid var(--border);
      font-family:'Rajdhani',sans-serif;
    }
    .leader-avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
    .leader-name  { font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700; color:var(--text); margin-bottom:4px; }
    .leader-role  {
      display:inline-block; font-size:11px; font-weight:700; letter-spacing:.6px;
      text-transform:uppercase; padding:3px 12px; border-radius:20px; margin-bottom:14px;
      background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.2);
    }
    .leader-desc  { font-size:13px; color:var(--muted); line-height:1.65; }

    /* ─── EDIT BUTTONS ─── */
    .edit-btn {
      display:inline-flex; align-items:center; gap:6px;
      background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.25);
      font-family:'Nunito',sans-serif; font-size:12px; font-weight:700;
      padding:6px 14px; border-radius:7px; cursor:pointer; transition:all .15s;
      flex-shrink:0;
    }
    .edit-btn:hover { background:var(--cyan); color:#fff; }
    .add-btn {
      display:inline-flex; align-items:center; gap:7px;
      background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff;
      border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700;
      padding:8px 16px; border-radius:7px; cursor:pointer;
      transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25);
    }
    .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }
    .section-head {
      display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;
    }

    /* ─── MODAL ─── */
    .overlay {
      display:none; position:fixed; inset:0; z-index:300;
      background:rgba(26,34,51,.45); backdrop-filter:blur(4px);
      align-items:center; justify-content:center;
    }
    .overlay.open { display:flex; }
    .modal {
      background:var(--white); border:1px solid var(--border); border-radius:14px;
      padding:28px; width:520px; max-width:94vw;
      box-shadow:0 20px 60px rgba(0,0,0,.15); animation:mIn .22s ease;
    }
    @keyframes mIn { from{opacity:0;transform:translateY(12px) scale(.97)} to{opacity:1;transform:translateY(0) scale(1)} }
    .modal-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:22px; }
    .modal-head h3 { font-family:'Rajdhani',sans-serif; font-size:19px; font-weight:700; color:var(--text); }
    .modal-head h3 span { color:var(--cyan); }
    .close-btn {
      background:#f0f2f5; border:none; color:var(--muted);
      width:30px; height:30px; border-radius:7px; cursor:pointer;
      font-size:15px; display:flex; align-items:center; justify-content:center; transition:all .14s;
    }
    .close-btn:hover { background:var(--danger); color:#fff; }
    .fg { display:flex; flex-direction:column; gap:5px; margin-bottom:14px; }
    .fg label { font-size:10.5px; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:var(--muted); }
    .fg input, .fg textarea, .fg select {
      background:var(--bg); border:1px solid var(--border); color:var(--text);
      font-family:'Nunito',sans-serif; font-size:13px; padding:9px 13px;
      border-radius:7px; outline:none; transition:all .15s; resize:none;
    }
    .fg input:focus, .fg textarea:focus { border-color:var(--cyan); background:#fff; box-shadow:0 0 0 3px rgba(29,168,224,.08); }
    .fg input::placeholder, .fg textarea::placeholder { color:#b0b8c9; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
    .modal-foot { display:flex; justify-content:flex-end; gap:10px; margin-top:6px; }
    .btn-cancel {
      background:#f0f2f5; border:1px solid var(--border); color:var(--muted);
      font-family:'Nunito',sans-serif; font-size:13px; font-weight:600;
      padding:9px 18px; border-radius:7px; cursor:pointer; transition:all .14s;
    }
    .btn-cancel:hover { color:var(--text); background:var(--border); }
    .btn-save {
      background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); border:none; color:#fff;
      font-family:'Nunito',sans-serif; font-size:13px; font-weight:700;
      padding:9px 22px; border-radius:7px; cursor:pointer; transition:all .18s;
      box-shadow:0 3px 10px rgba(29,168,224,.25);
    }
    .btn-save:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* ─── TOAST ─── */
    .toast {
      position:fixed; bottom:24px; right:24px; z-index:400;
      background:var(--white); border:1px solid var(--border); border-radius:10px;
      padding:13px 20px; display:flex; align-items:center; gap:10px;
      font-size:13px; font-weight:600; color:var(--text);
      box-shadow:0 8px 32px rgba(0,0,0,.12);
      transform:translateY(16px); opacity:0; transition:all .28s ease; pointer-events:none;
    }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast.ok  { border-left:3px solid var(--success); }
    .toast.err { border-left:3px solid var(--danger); }

    ::-webkit-scrollbar { width:5px; }
    ::-webkit-scrollbar-track { background:var(--bg); }
    ::-webkit-scrollbar-thumb { background:var(--border2); border-radius:3px; }
    ::-webkit-scrollbar-thumb:hover { background:#b0b8c9; }

    @media(max-width:900px) {
      .sidebar { display:none; }
      .wrapper { margin-left:0; }
      .milestone-grid, .vm-grid { grid-template-columns:1fr; }
    }

    /* ── PROFILE SYNC: avatar support foto ── */
    .sidebar-user .ava { overflow: hidden; }
    .sidebar-user .ava img { width:100%; height:100%; object-fit:cover; }
    .avatar { overflow: hidden; }
    .avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }

    /* animasi sidebar */
.sidebar{
    transition: transform 0.3s ease;
}

/* ketika sidebar ditutup */
.sidebar.hide{
    transform: translateX(-100%);
}
  </style>
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <div class="topbar-left">
    <button class="hamburger" id="menu-toggle">☰</button>
    <a class="brand" href="#">
      <div class="brand-logo">GBI</div>
      <span class="brand-name">GBI <span>Tambunan</span></span>
    </a>
  </div>
  <nav class="topbar-nav">
    <a href="{{ route('welcome') }}">Beranda</a>
    <a href="#" class="active">Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}">Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}">Galeri</a>
    <a href="{{ route('khotbah.index') }}">Khotbah</a>
    <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
    <a href="{{ route('kontaks.index') }}">Kontak</a>
  </nav>
  <div class="topbar-right">
    <a href="{{ route('home') }}"><button class="btn-viewsite">🌐 Lihat Website</button></a>
    <div class="avatar" id="tbAva">A</div>
  </div>
</header>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-user">
    <div class="ava" id="sbAva">A</div>
    <div class="info">
      <strong id="sbName">Admin GBI</strong>
      <span id="sbRole">Administrator</span>
    </div>
  </div>
  <div class="sidebar-search">
    <span style="color:rgba(255,255,255,.4);">🔍</span>
    <input type="text" placeholder="Search..."/>
  </div>
  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}"><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}" class="active"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}"><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="ico">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}"><span class="ico">🙌</span> Pelayanan</a>
    <a href="{{ route('kontaks.index') }}"><span class="ico">✉</span> Kontak</a>
  </nav>
  <div class="nav-section">Pengaturan</div>
  <nav>
    <a href="{{ route('profil.index') }}"><span class="ico">👤</span> Profil Admin</a>
    <a href="#"><span class="ico">⚙</span> Pengaturan</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="ico">🚪</span> Keluar</a>
  </nav>
  <div class="sidebar-footer"><strong>Kelompok 5 PA-1</strong>Version 1.0.0</div>
</aside>

<!-- WRAPPER -->
<div class="wrapper">
  <div class="content-header">
    <h1>Tentang Kami</h1>
    <div class="breadcrumb-bar">
      <a href="#">Home</a> / <span>Tentang Kami</span>
    </div>
  </div>

  <div class="content">

    <!-- HERO BANNER -->
    <div class="page-hero">
      <div class="hero-tag">ℹ Halaman Publik</div>
      <h2>GBI Tambunan</h2>
      <p>Mengenal lebih dekat sejarah, visi, misi, dan keluarga besar GBI Tambunan. Edit konten di bawah untuk memperbarui tampilan halaman publik.</p>
      <div class="hero-actions">
        <button class="btn-hero-primary" onclick="openModal('sejarah')">✏ Edit Sejarah</button>
        <button class="btn-hero-outline" onclick="window.open('#','_blank')">🌐 Lihat Halaman Publik</button>
      </div>
    </div>

    <!-- ══ SEJARAH ══ -->
    <div class="section-head">
      <div class="section-title" style="flex:1;margin-bottom:0;">📖 Sejarah Kami</div>
      <button class="edit-btn" style="margin-left:16px;" onclick="openModal('sejarah')">✏ Edit</button>
    </div>

    <div class="sejarah-card" style="margin-bottom:16px;">
      <div class="edit-bar">
        <div class="sejarah-text" id="sejarahText">
          <p>GBI Tambunan adalah bagian dari sinode Gereja Bethel Indonesia. Sejak berdiri pada tahun 1970, kami berkomitmen untuk melayani Tuhan dan membangun komunitas yang bertumbuh dalam iman, pengharapan, dan kasih.</p>
        </div>
      </div>
    </div>

    <div class="milestone-grid" style="margin-bottom:32px;">
      <div class="milestone-card">
        <div class="ms-icon c">⛪</div>
        <div>
          <div class="ms-year">1970</div>
          <div class="ms-label">Berdirinya Gereja Bethel Indonesia</div>
        </div>
      </div>
      <div class="milestone-card">
        <div class="ms-icon g">🙌</div>
        <div>
          <div class="ms-year">Sekarang</div>
          <div class="ms-label">Melayani komunitas lokal dengan kasih Kristus</div>
        </div>
      </div>
    </div>

    <!-- ══ VISI & MISI ══ -->
    <div class="section-head">
      <div class="section-title" style="flex:1;margin-bottom:0;">✨ Visi & Misi</div>
      <button class="edit-btn" style="margin-left:16px;" onclick="openModal('visimisi')">✏ Edit</button>
    </div>

    <div class="vm-grid" style="margin-bottom:32px;">
      <div class="vm-card">
        <div class="vm-icon c">💙</div>
        <div class="vm-title">Kasih kepada Tuhan</div>
        <div class="vm-quote" id="visiText">"Kasihilah Tuhan, Allahmu, dengan segenap hatimu, jiwamu dan akal budamu."</div>
      </div>
      <div class="vm-card">
        <div class="vm-icon g">🤝</div>
        <div class="vm-title">Kasih kepada Sesama</div>
        <div class="vm-quote" id="misiText">"Kasihilah sesamamu manusia seperti dirimu sendiri."</div>
      </div>
    </div>

    <!-- ══ KEPEMIMPINAN ══ -->
    <div class="section-head">
      <div class="section-title" style="flex:1;margin-bottom:0;">👤 Kepemimpinan</div>
      <button class="add-btn" onclick="openModal('leader')">＋ Tambah Pemimpin</button>
    </div>

    <div class="leader-grid" id="leaderGrid">

      <div class="leader-card">
        <div class="leader-avatar">RS</div>
        <div class="leader-name">Pdm. Roberto Sibarani, M.Th</div>
        <div class="leader-role">Gembala Sidang</div>
        <div class="leader-desc">Sebagai gembala, kami berkomitmen untuk memimpin jemaat dalam kasih Kristus, membangun iman yang kokoh dan melayani dengan hati yang tulus.</div>
        <div style="display:flex;gap:8px;justify-content:center;margin-top:16px;">
          <button class="edit-btn" onclick="openModal('editLeader',0)">✏ Edit</button>
          <button class="edit-btn" style="background:var(--danger-lt);color:var(--danger);border-color:rgba(224,85,85,.25);" onclick="removeLeader(0)">🗑 Hapus</button>
        </div>
      </div>

      <div class="leader-card">
        <div class="leader-avatar">SM</div>
        <div class="leader-name">Pdt. Samuel Manurung</div>
        <div class="leader-role">Wakil Gembala</div>
        <div class="leader-desc">Membantu memimpin jemaat dalam pelayanan mingguan dan pembinaan rohani kelompok sel dan pemuda gereja.</div>
        <div style="display:flex;gap:8px;justify-content:center;margin-top:16px;">
          <button class="edit-btn" onclick="openModal('editLeader',1)">✏ Edit</button>
          <button class="edit-btn" style="background:var(--danger-lt);color:var(--danger);border-color:rgba(224,85,85,.25);" onclick="removeLeader(1)">🗑 Hapus</button>
        </div>
      </div>

    </div>

  </div><!-- /content -->
</div><!-- /wrapper -->

<!-- ══ MODAL: EDIT SEJARAH ══ -->
<div class="overlay" id="modalSejarah">
  <div class="modal">
    <div class="modal-head">
      <h3>✏ Edit <span>Sejarah</span></h3>
      <button class="close-btn" onclick="closeModal('sejarah')">✕</button>
    </div>
    <div class="fg">
      <label>Teks Sejarah Gereja</label>
      <textarea id="inputSejarah" rows="5" placeholder="Tulis sejarah gereja..."></textarea>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal('sejarah')">Batal</button>
      <button class="btn-save" onclick="saveSejarah()">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: EDIT VISI MISI ══ -->
<div class="overlay" id="modalVisimisi">
  <div class="modal">
    <div class="modal-head">
      <h3>✏ Edit <span>Visi & Misi</span></h3>
      <button class="close-btn" onclick="closeModal('visimisi')">✕</button>
    </div>
    <div class="fg">
      <label>Visi – Kasih kepada Tuhan</label>
      <textarea id="inputVisi" rows="3" placeholder="Tulis ayat atau pernyataan visi..."></textarea>
    </div>
    <div class="fg">
      <label>Misi – Kasih kepada Sesama</label>
      <textarea id="inputMisi" rows="3" placeholder="Tulis ayat atau pernyataan misi..."></textarea>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal('visimisi')">Batal</button>
      <button class="btn-save" onclick="saveVisiMisi()">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: TAMBAH / EDIT PEMIMPIN ══ -->
<div class="overlay" id="modalLeader">
  <div class="modal">
    <div class="modal-head">
      <h3 id="leaderModalTitle">➕ Tambah <span>Pemimpin</span></h3>
      <button class="close-btn" onclick="closeModal('leader')">✕</button>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Nama Lengkap *</label>
        <input id="lNama" type="text" placeholder="cth. Pdt. Roberto Sibarani"/>
      </div>
      <div class="fg">
        <label>Jabatan *</label>
        <input id="lJabatan" type="text" placeholder="cth. Gembala Sidang"/>
      </div>
    </div>
    <div class="fg">
      <label>Deskripsi</label>
      <textarea id="lDesc" rows="3" placeholder="Tuliskan deskripsi singkat..."></textarea>
    </div>
    <div class="fg">
      <label>Inisial Avatar (maks. 2 huruf)</label>
      <input id="lInisial" type="text" maxlength="2" placeholder="cth. RS" style="text-transform:uppercase;"/>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal('leader')">Batal</button>
      <button class="btn-save" onclick="saveLeader()">💾 Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  // ── Storage keys ──
  const K = { sejarah:'gbi_tentang_sejarah', visi:'gbi_tentang_visi', misi:'gbi_tentang_misi', leaders:'gbi_tentang_leaders', nextid:'gbi_tentang_nextid' };

  const DEFAULT_LEADERS = [
    { id:1, nama:'Pdm. Roberto Sibarani, M.Th', jabatan:'Gembala Sidang', desc:'Sebagai gembala, kami berkomitmen untuk memimpin jemaat dalam kasih Kristus, membangun iman yang kokoh dan melayani dengan hati yang tulus.', inisial:'RS' },
    { id:2, nama:'Pdt. Samuel Manurung',         jabatan:'Wakil Gembala',   desc:'Membantu memimpin jemaat dalam pelayanan mingguan dan pembinaan rohani kelompok sel dan pemuda gereja.', inisial:'SM' },
  ];

  function load(k, def) { try { const v=localStorage.getItem(k); return v ? JSON.parse(v) : def; } catch(e){ return def; } }
  function save(k, v) { localStorage.setItem(k, typeof v==='string' ? v : JSON.stringify(v)); }

  let sejarah = load(K.sejarah, 'GBI Tambunan adalah bagian dari sinode Gereja Bethel Indonesia. Sejak berdiri pada tahun 1970, kami berkomitmen untuk melayani Tuhan dan membangun komunitas yang bertumbuh dalam iman, pengharapan, dan kasih.');
  let visi    = load(K.visi, '"Kasihilah Tuhan, Allahmu, dengan segenap hatimu, jiwamu dan akal budamu."');
  let misi    = load(K.misi, '"Kasihilah sesamamu manusia seperti dirimu sendiri."');
  let leaders = load(K.leaders, JSON.parse(JSON.stringify(DEFAULT_LEADERS)));
  let nextId  = load(K.nextid, 3);
  let editLeaderIdx = null;

  // ── Apply on load ──
  document.getElementById('sejarahText').innerHTML = '<p>' + esc(sejarah) + '</p>';
  document.getElementById('visiText').textContent  = visi;
  document.getElementById('misiText').textContent  = misi;
  renderLeaders();

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
  }

  // ── Render Leaders ──
  function renderLeaders() {
    const grid = document.getElementById('leaderGrid');
    if (leaders.length === 0) {
      grid.innerHTML = `<div style="grid-column:1/-1;text-align:center;padding:40px;color:var(--muted);font-size:13px;background:var(--white);border:1px solid var(--border);border-radius:12px;">Belum ada data pemimpin. Klik <strong>Tambah Pemimpin</strong>.</div>`;
      return;
    }
    grid.innerHTML = leaders.map((l, i) => `
      <div class="leader-card" style="animation-delay:${i*0.07}s">
        <div class="leader-avatar">${esc(l.inisial || l.nama.slice(0,2).toUpperCase())}</div>
        <div class="leader-name">${esc(l.nama)}</div>
        <div class="leader-role">${esc(l.jabatan)}</div>
        <div class="leader-desc">${esc(l.desc)}</div>
        <div style="display:flex;gap:8px;justify-content:center;margin-top:16px;">
          <button class="edit-btn" onclick="openModal('editLeader',${i})">✏ Edit</button>
          <button class="edit-btn" style="background:var(--danger-lt);color:var(--danger);border-color:rgba(224,85,85,.25);" onclick="removeLeader(${i})">🗑 Hapus</button>
        </div>
      </div>`).join('');
  }

  // ── Modals ──
  function openModal(type, idx) {
    if (type === 'sejarah') {
      document.getElementById('inputSejarah').value = sejarah;
      document.getElementById('modalSejarah').classList.add('open');
    } else if (type === 'visimisi') {
      document.getElementById('inputVisi').value = visi;
      document.getElementById('inputMisi').value = misi;
      document.getElementById('modalVisimisi').classList.add('open');
    } else if (type === 'leader') {
      editLeaderIdx = null;
      document.getElementById('leaderModalTitle').innerHTML = '➕ Tambah <span>Pemimpin</span>';
      document.getElementById('lNama').value = '';
      document.getElementById('lJabatan').value = '';
      document.getElementById('lDesc').value = '';
      document.getElementById('lInisial').value = '';
      document.getElementById('modalLeader').classList.add('open');
    } else if (type === 'editLeader') {
      editLeaderIdx = idx;
      const l = leaders[idx];
      document.getElementById('leaderModalTitle').innerHTML = '✏ Edit <span>Pemimpin</span>';
      document.getElementById('lNama').value    = l.nama;
      document.getElementById('lJabatan').value = l.jabatan;
      document.getElementById('lDesc').value    = l.desc;
      document.getElementById('lInisial').value = l.inisial || '';
      document.getElementById('modalLeader').classList.add('open');
    }
  }

  function closeModal(type) {
    const ids = { sejarah:'modalSejarah', visimisi:'modalVisimisi', leader:'modalLeader' };
    document.getElementById(ids[type] || 'modalLeader').classList.remove('open');
  }

  // ── Save Sejarah ──
  function saveSejarah() {
    const val = document.getElementById('inputSejarah').value.trim();
    if (!val) { toast('Teks sejarah tidak boleh kosong!','err'); return; }
    sejarah = val;
    save(K.sejarah, sejarah);
    document.getElementById('sejarahText').innerHTML = '<p>' + esc(sejarah) + '</p>';
    closeModal('sejarah');
    toast('Sejarah berhasil diperbarui ✓','ok');
  }

  // ── Save Visi Misi ──
  function saveVisiMisi() {
    const v = document.getElementById('inputVisi').value.trim();
    const m = document.getElementById('inputMisi').value.trim();
    if (!v || !m) { toast('Visi dan Misi tidak boleh kosong!','err'); return; }
    visi = v; misi = m;
    save(K.visi, visi); save(K.misi, misi);
    document.getElementById('visiText').textContent = visi;
    document.getElementById('misiText').textContent = misi;
    closeModal('visimisi');
    toast('Visi & Misi berhasil diperbarui ✓','ok');
  }

  // ── Save Leader ──
  function saveLeader() {
    const nama    = document.getElementById('lNama').value.trim();
    const jabatan = document.getElementById('lJabatan').value.trim();
    const desc    = document.getElementById('lDesc').value.trim();
    const inisial = document.getElementById('lInisial').value.trim().toUpperCase() || nama.slice(0,2).toUpperCase();
    if (!nama || !jabatan) { toast('Nama dan jabatan wajib diisi!','err'); return; }
    if (editLeaderIdx !== null) {
      leaders[editLeaderIdx] = { ...leaders[editLeaderIdx], nama, jabatan, desc, inisial };
      toast('Data pemimpin berhasil diperbarui ✓','ok');
    } else {
      leaders.push({ id: nextId++, nama, jabatan, desc, inisial });
      save(K.nextid, nextId);
      toast('Pemimpin baru berhasil ditambahkan ✓','ok');
    }
    save(K.leaders, leaders);
    renderLeaders();
    closeModal('leader');
  }

  // ── Remove Leader ──
  function removeLeader(idx) {
    if (!confirm('Hapus data pemimpin ini?')) return;
    leaders.splice(idx, 1);
    save(K.leaders, leaders);
    renderLeaders();
    toast('Data pemimpin dihapus','err');
  }

  // ── Toast ──
  function toast(msg, type='ok') {
    const t = document.getElementById('toast');
    t.textContent = (type==='ok'?'✅ ':'🗑 ') + msg;
    t.className = 'toast ' + type;
    t.classList.add('show');
    setTimeout(()=>t.classList.remove('show'), 3000);
  }

  // close on backdrop click
  document.querySelectorAll('.overlay').forEach(el => {
    el.addEventListener('click', function(e) { if (e.target===this) this.classList.remove('open'); });
  });
</script>

<script>
/* ── PROFILE SYNC ── */
(function(){
  const KEY = 'gbi_profile_v1';
  function initials(n){ return (n||'A').split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2); }
  function txt(id,v){ const e=document.getElementById(id); if(e) e.textContent=v||''; }
  function setAva(id, nama, foto, circle){
    const el=document.getElementById(id); if(!el) return;
    if(foto){
      const r=circle?'border-radius:50%':'';
      el.innerHTML=`<img src="${foto}" alt="" style="width:100%;height:100%;object-fit:cover;${r}"/>`;
    } else { el.innerHTML=initials(nama); }
  }
  function sync(){
    let p=null;
    try{ const r=localStorage.getItem(KEY); if(r) p=JSON.parse(r); }catch(_){}
    if(!p) return;
    setAva('tbAva', p.nama, p.foto, true);
    setAva('sbAva', p.nama, p.foto, false);
    txt('sbName', p.nama);
    txt('sbRole', p.jabatan);
  }
  sync();
  window.addEventListener('storage', e=>{ if(e.key===KEY) sync(); });
  window.addEventListener('focus', sync);
  document.addEventListener('visibilitychange', ()=>{ if(document.visibilityState==='visible') sync(); });

  document.getElementById("menu-toggle").onclick = function () {
    document.querySelector(".sidebar").classList.toggle("hide");
};
})();
</script>
</body>
</html>