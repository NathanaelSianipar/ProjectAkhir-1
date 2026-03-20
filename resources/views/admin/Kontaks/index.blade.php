<?php
// resources/views/kontaks/index.php
// Untuk Laravel: rename ke index.blade.php dan sesuaikan variabel $kontaks dari controller
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kontak – Admin GBI Tambunan</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:       #f4f6f9;
      --white:    #ffffff;
      --border:   #e4e8ef;
      --border2:  #d0d7e3;
      --cyan:     #1da8e0;
      --cyan-dk:  #0d85b5;
      --cyan-lt:  #e8f6fd;
      --gold:     #c89b3c;
      --gold-lt:  #fdf6e3;
      --text:     #1a2233;
      --muted:    #7a8499;
      --danger:   #e05555;
      --danger-lt:#fdf0f0;
      --success:  #2ea86a;
      --success-lt:#e8f7ef;
      --warn:     #e0a825;
      --sidebar:  #1e2430;
      --sidebar2: #252e3e;
      --topbar:   #ffffff;
    }

    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      background: var(--bg);
      font-family: 'Nunito', sans-serif;
      color: var(--text);
      min-height: 100vh;
    }

    /* ─── TOPBAR ─── */
    .topbar {
      position:fixed; top:0; left:0; right:0; z-index:200;
      height:56px; display:flex; align-items:center; justify-content:space-between;
      padding:0 20px 0 0;
      background:var(--topbar);
      border-bottom:1px solid var(--border);
      box-shadow:0 1px 8px rgba(0,0,0,.06);
    }
    .topbar-left {
      display:flex; align-items:center;
      width:240px; height:100%; flex-shrink:0;
      background:var(--sidebar);
      padding:0 18px; gap:0;
    }
    .hamburger {
      background:none; border:none; color:rgba(255,255,255,.5);
      font-size:20px; cursor:pointer; margin-right:12px; line-height:1;
      transition:color .15s;
    }
    .hamburger:hover { color:#fff; }
    .brand { display:flex; align-items:center; gap:10px; text-decoration:none; }
    .brand-logo {
      width:32px; height:32px;
      background:linear-gradient(135deg,var(--cyan),var(--gold));
      border-radius:7px; display:flex; align-items:center; justify-content:center;
      font-family:'Rajdhani',sans-serif; font-weight:700; font-size:13px; color:#fff;
      flex-shrink:0;
    }
    .brand-name {
      font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:#fff;
      letter-spacing:.3px;
    }
    .brand-name span { color:var(--cyan); }
    .topbar-nav {
      display:flex; align-items:center; gap:2px; flex:1; padding:0 14px;
    }
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
      font-size:12px; font-weight:700; color:#fff; cursor:pointer; flex-shrink:0;
    }

    /* ─── SIDEBAR ─── */
    .sidebar {
      position:fixed; top:56px; left:0; bottom:0; width:240px;
      background:var(--sidebar);
      display:flex; flex-direction:column; overflow-y:auto; z-index:100;
    }
    .sidebar-user {
      display:flex; align-items:center; gap:12px;
      padding:18px 18px 14px;
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
      background:rgba(255,255,255,.07);
      border:1px solid rgba(255,255,255,.1); border-radius:7px; padding:7px 12px;
    }
    .sidebar-search input {
      background:none; border:none; outline:none;
      color:#fff; font-family:'Nunito',sans-serif; font-size:13px; flex:1;
    }
    .sidebar-search input::placeholder { color:rgba(255,255,255,.3); }
    .sidebar-search span { color:rgba(255,255,255,.4); font-size:14px; }
    .nav-section {
      padding:10px 18px 4px; font-size:10px; font-weight:700;
      letter-spacing:1.4px; color:rgba(255,255,255,.25); text-transform:uppercase;
    }
    .sidebar nav a {
      display:flex; align-items:center; gap:10px; padding:9px 18px;
      font-size:13.5px; font-weight:600; color:rgba(255,255,255,.5);
      text-decoration:none; border-left:3px solid transparent; transition:all .15s;
    }
    .sidebar nav a:hover { color:#fff; background:rgba(255,255,255,.06); }
    .sidebar nav a.active {
      color:#fff; border-left-color:var(--cyan);
      background:rgba(29,168,224,.15);
    }
    .sidebar nav a .ico { font-size:15px; width:20px; text-align:center; }
    .sidebar-footer {
      margin-top:auto; padding:14px 18px;
      border-top:1px solid rgba(255,255,255,.07);
      font-size:11px; color:rgba(255,255,255,.3);
    }
    .sidebar-footer strong { color:rgba(255,255,255,.6); display:block; margin-bottom:2px; }

    /* ─── WRAPPER ─── */
    .wrapper { margin-left:240px; padding-top:56px; min-height:100vh; }

    /* ─── CONTENT HEADER ─── */
    .content-header {
      display:flex; align-items:center; justify-content:space-between;
      padding:20px 28px 0;
    }
    .content-header h1 {
      font-family:'Rajdhani',sans-serif;
      font-size:22px; font-weight:700; letter-spacing:.3px; color:var(--text);
    }
    .breadcrumb-bar {
      display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted);
    }
    .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
    .breadcrumb-bar a:hover { text-decoration:underline; }

    /* ─── CONTENT ─── */
    .content { padding:20px 28px 50px; }

    /* ── Alert ── */
    .alert-success {
      background:var(--success-lt); border:1px solid rgba(46,168,106,.25); color:var(--success);
      border-radius:8px; padding:12px 18px; margin-bottom:18px;
      font-size:13.5px; font-weight:600; display:flex; align-items:center; gap:10px;
    }
    .alert-danger {
      background:var(--danger-lt); border:1px solid rgba(224,85,85,.25); color:var(--danger);
      border-radius:8px; padding:12px 18px; margin-bottom:18px;
      font-size:13.5px; font-weight:600; display:flex; align-items:center; gap:10px;
    }

    /* ── Stats ── */
    .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:22px; }
    .stat-card {
      background:var(--white); border:1px solid var(--border);
      border-radius:11px; padding:16px 18px;
      display:flex; align-items:center; gap:14px;
      box-shadow:0 1px 4px rgba(0,0,0,.04);
      animation:fadeUp .35s ease both;
    }
    .stat-card:nth-child(1){animation-delay:.05s}
    .stat-card:nth-child(2){animation-delay:.10s}
    .stat-card:nth-child(3){animation-delay:.15s}
    .stat-card:nth-child(4){animation-delay:.20s}
    @keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
    .stat-icon { width:40px; height:40px; border-radius:9px; display:flex; align-items:center; justify-content:center; font-size:18px; }
    .ic{background:var(--cyan-lt)}   .ig{background:var(--gold-lt)}
    .is{background:var(--success-lt)} .ir{background:var(--danger-lt)}
    .stat-val { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; line-height:1; }
    .vc{color:var(--cyan)}    .vg{color:var(--gold)}
    .vs{color:var(--success)} .vr{color:var(--danger)}
    .stat-lbl { font-size:11.5px; color:var(--muted); margin-top:3px; }

    /* ── Card ── */
    .card {
      background:var(--white); border:1px solid var(--border);
      border-radius:12px; overflow:hidden;
      box-shadow:0 1px 6px rgba(0,0,0,.05);
      animation:fadeUp .4s ease .22s both;
    }
    .card-header {
      display:flex; align-items:center; justify-content:space-between;
      padding:15px 20px; border-bottom:1px solid var(--border);
      background:#fafbfc;
    }
    .card-header h3 {
      font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700;
      color:var(--text); display:flex; align-items:center; gap:8px;
    }
    .card-tools { display:flex; align-items:center; gap:10px; }

    /* ── Search ── */
    .search-box {
      display:flex; align-items:center; gap:7px; background:var(--bg);
      border:1px solid var(--border); border-radius:7px; padding:6px 12px;
    }
    .search-box input {
      background:none; border:none; outline:none;
      color:var(--text); font-family:'Nunito',sans-serif; font-size:13px; width:170px;
    }
    .search-box input::placeholder { color:#b0b8c9; }

    /* ── Buttons ── */
    .btn-tambah {
      display:flex; align-items:center; gap:7px;
      background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff;
      border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700;
      padding:8px 16px; border-radius:7px; cursor:pointer;
      transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25);
    }
    .btn-tambah:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    .act-btn {
      border:none; border-radius:6px; cursor:pointer;
      font-family:'Nunito',sans-serif; font-size:12px; font-weight:700;
      padding:6px 13px; transition:all .15s;
    }
    .btn-edit { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.25); }
    .btn-edit:hover { background:var(--cyan); color:#fff; }
    .btn-del  { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.25); }
    .btn-del:hover  { background:var(--danger); color:#fff; }

    /* ── Table ── */
    .table-wrap { overflow-x:auto; }
    table { width:100%; border-collapse:collapse; }
    thead tr { background:#f8f9fb; }
    thead th {
      padding:11px 18px; text-align:left; font-size:10.5px; font-weight:700;
      letter-spacing:1px; text-transform:uppercase; color:var(--muted);
      border-bottom:1px solid var(--border); white-space:nowrap;
    }
    tbody tr { border-bottom:1px solid var(--border); transition:background .14s; }
    tbody tr:last-child { border-bottom:none; }
    tbody tr:hover { background:#f6f9fd; }
    td { padding:14px 18px; font-size:13px; vertical-align:middle; }
    .loc-name { font-size:14px; font-weight:700; color:var(--text); margin-bottom:3px; }
    .loc-addr { font-size:12px; color:var(--muted); line-height:1.5; }
    .pill-cyan {
      display:inline-flex; align-items:center; gap:5px;
      background:var(--cyan-lt); border:1px solid rgba(29,168,224,.2);
      color:var(--cyan); border-radius:20px; padding:4px 11px;
      font-size:12px; font-weight:600; white-space:nowrap;
    }
    .pill-gold {
      display:inline-flex; align-items:center; gap:5px;
      background:var(--gold-lt); border:1px solid rgba(200,155,60,.25);
      color:var(--gold); border-radius:20px; padding:4px 11px;
      font-size:12px; font-weight:600; white-space:nowrap;
    }
    .jam-main { font-size:13px; color:var(--text); font-weight:600; }
    .jam-sub  { font-size:11.5px; color:var(--muted); margin-top:2px; }
    .no-data  { text-align:center; padding:52px 20px; color:var(--muted); }
    .no-data .icon { font-size:44px; opacity:.25; margin-bottom:12px; }
    .no-data p { font-size:13px; }

    /* ── Modal ── */
    .overlay {
      display:none; position:fixed; inset:0; z-index:300;
      background:rgba(26,34,51,.45); backdrop-filter:blur(4px);
      align-items:center; justify-content:center;
    }
    .overlay.open { display:flex; }
    .modal {
      background:var(--white); border:1px solid var(--border);
      border-radius:14px; padding:28px; width:500px; max-width:94vw;
      box-shadow:0 20px 60px rgba(0,0,0,.15);
      animation:mIn .22s ease;
    }
    @keyframes mIn { from{opacity:0;transform:translateY(12px) scale(.97)} to{opacity:1;transform:translateY(0) scale(1)} }
    .modal-head {
      display:flex; align-items:center; justify-content:space-between; margin-bottom:22px;
    }
    .modal-head h3 { font-family:'Rajdhani',sans-serif; font-size:19px; font-weight:700; color:var(--text); }
    .modal-head h3 span { color:var(--cyan); }
    .close-btn {
      background:#f0f2f5; border:none; color:var(--muted);
      width:30px; height:30px; border-radius:7px; cursor:pointer;
      font-size:15px; display:flex; align-items:center; justify-content:center; transition:all .14s;
    }
    .close-btn:hover { background:var(--danger); color:#fff; }
    .fg { display:flex; flex-direction:column; gap:5px; margin-bottom:14px; }
    .fg label {
      font-size:10.5px; font-weight:700; letter-spacing:.8px;
      text-transform:uppercase; color:var(--muted);
    }
    .fg input, .fg textarea {
      background:var(--bg); border:1px solid var(--border);
      color:var(--text); font-family:'Nunito',sans-serif;
      font-size:13px; padding:9px 13px; border-radius:7px;
      outline:none; transition:border-color .15s; resize:none;
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
    .btn-cancel:hover { color:var(--text); background:#e4e8ef; }
    .btn-save {
      background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); border:none; color:#fff;
      font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 22px;
      border-radius:7px; cursor:pointer; transition:all .18s;
      box-shadow:0 3px 10px rgba(29,168,224,.25);
    }
    .btn-save:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* ── Confirm dialog ── */
    .confirm-box {
      background:var(--white); border:1px solid var(--border);
      border-radius:14px; padding:28px; width:360px;
      box-shadow:0 20px 60px rgba(0,0,0,.15);
      animation:mIn .2s ease; text-align:center;
    }
    .confirm-box .c-icon { font-size:44px; margin-bottom:14px; }
    .confirm-box h4 { font-family:'Rajdhani',sans-serif; font-size:20px; font-weight:700; margin-bottom:6px; color:var(--text); }
    .confirm-box p  { font-size:13px; color:var(--muted); margin-bottom:22px; line-height:1.6; }
    .confirm-box .c-name { font-weight:700; color:var(--danger); }
    .confirm-box .c-btns { display:flex; gap:10px; justify-content:center; }

    /* ── Toast ── */
    .toast {
      position:fixed; bottom:24px; right:24px; z-index:400;
      background:var(--white); border:1px solid var(--border);
      border-radius:10px; padding:13px 20px;
      display:flex; align-items:center; gap:10px;
      font-size:13px; font-weight:600; color:var(--text);
      box-shadow:0 8px 32px rgba(0,0,0,.12);
      transform:translateY(16px); opacity:0;
      transition:all .28s ease; pointer-events:none;
    }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast.ok  { border-left:3px solid var(--success); }
    .toast.err { border-left:3px solid var(--danger); }

    ::-webkit-scrollbar { width:5px; height:5px; }
    ::-webkit-scrollbar-track { background:var(--bg); }
    ::-webkit-scrollbar-thumb { background:var(--border2); border-radius:3px; }
    ::-webkit-scrollbar-thumb:hover { background:#b0b8c9; }

    /* ── PROFILE SYNC: avatar support foto ── */
    .sidebar-user .ava { overflow: hidden; }
    .sidebar-user .ava img { width:100%; height:100%; object-fit:cover; }
    .avatar { overflow: hidden; }
    .avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
  </style>
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <div class="topbar-left">
    <button class="hamburger">☰</button>
    <a class="brand" href="#">
      <div class="brand-logo">GBI</div>
      <span class="brand-name">GBI <span>Tambunan</span></span>
    </a>
  </div>
  <nav class="topbar-nav">
    <a href="{{ route('welcome') }}">Beranda</a>
    <a href="{{ route('tentang.index') }}">Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}">Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}">Galeri</a>
    <a href="{{ route('khotbah.index') }}">Khotbah</a>
    <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
    <a href="{{ route('kontaks.index') }}" class="active">Kontak</a>
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
    <span>🔍</span>
    <input type="text" placeholder="Search..."/>
  </div>
  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}"><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}"><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="ico">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}"><span class="ico">🙌</span> Pelayanan</a>
    <a href="{{ route('kontaks.index') }}" class="active"><span class="ico">✉</span> Kontak</a>
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
    <h1>Dashboard</h1>
    <div class="breadcrumb-bar">
      <a href="#">Home</a> / <span>Informasi Kontak Gereja</span>
    </div>
  </div>

  <div class="content">

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">📍</div>
        <div><div class="stat-val vc" id="statTotal">3</div><div class="stat-lbl">Total Kontak</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ig">📞</div>
        <div><div class="stat-val vg" id="statTelp">3</div><div class="stat-lbl">Nomor Telepon</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon is">✉</div>
        <div><div class="stat-val vs" id="statEmail">3</div><div class="stat-lbl">Alamat Email</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ir">🕐</div>
        <div><div class="stat-val vr">6</div><div class="stat-lbl">Hari Aktif</div></div>
      </div>
    </div>

    <!-- CARD TABLE -->
    <div class="card">
      <div class="card-header">
        <h3>✉ Informasi Kontak Gereja</h3>
        <div class="card-tools">
          <div class="search-box">
            <span style="color:#b0b8c9;font-size:13px;">🔍</span>
            <input type="text" placeholder="Cari kontak..." oninput="filterTable(this.value)"/>
          </div>
          <button class="btn-tambah" onclick="openAdd()">
            <span style="font-size:15px;font-weight:900;">＋</span> Tambah Kontak
          </button>
        </div>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th style="width:40px;">#</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Jam Sekretariat</th>
              <th style="width:150px;">Actions</th>
            </tr>
          </thead>
          <tbody id="tbody"></tbody>
        </table>
        <div class="no-data" id="noData" style="display:none;">
          <div class="icon">✉</div>
          <p>Belum ada data kontak. Klik <strong>Tambah Kontak</strong> untuk memulai.</p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- MODAL FORM -->
<div class="overlay" id="formOverlay">
  <div class="modal">
    <div class="modal-head">
      <h3 id="mTitle">Tambah <span>Kontak</span></h3>
      <button class="close-btn" onclick="closeForm()">✕</button>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Nama Lokasi *</label>
        <input id="fNama" type="text" placeholder="cth. Kantor Pusat"/>
      </div>
      <div class="fg">
        <label>Nomor Telepon *</label>
        <input id="fTelp" type="text" placeholder="+62 8xx-xxxx-xxxx"/>
      </div>
    </div>
    <div class="fg">
      <label>Alamat Lengkap *</label>
      <textarea id="fAlamat" rows="2" placeholder="Jl. GBI Tambunan No. ..."></textarea>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Alamat Email *</label>
        <input id="fEmail" type="email" placeholder="email@gbitambunan.org"/>
      </div>
      <div class="fg">
        <label>Hari Aktif *</label>
        <input id="fHari" type="text" placeholder="cth. Sen – Jum"/>
      </div>
    </div>
    <div class="fg">
      <label>Jam Sekretariat *</label>
      <input id="fJam" type="text" placeholder="cth. 08.00 – 17.00 WIB"/>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeForm()">Batal</button>
      <button class="btn-save" onclick="saveForm()">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- CONFIRM DELETE -->
<div class="overlay" id="confirmOverlay">
  <div class="confirm-box">
    <div class="c-icon">🗑</div>
    <h4>Hapus Kontak?</h4>
    <p>Yakin menghapus <span class="c-name" id="confirmName"></span>? Data tidak bisa dikembalikan.</p>
    <div class="c-btns">
      <button class="btn-cancel" onclick="closeConfirm()">Batal</button>
      <button class="act-btn btn-del" onclick="doDelete()" style="padding:9px 22px;">Ya, Hapus</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
  const KEY_DATA   = 'gbi_kontak_data';
  const KEY_NEXTID = 'gbi_kontak_nextid';

  const DEFAULT_DATA = [
    { id:1, nama:'Kantor Pusat',        alamat:'Jl. GBI Tambunan No. 1, Kab. Toba, Sumatera Utara', telp:'+62 812-3456-7890', email:'info@gbitambunan.org',          hari:'Sen – Jum', jam:'08.00 – 17.00 WIB' },
    { id:2, nama:'Sekretariat Jemaat',  alamat:'Gedung Gereja Lt. 2, Jl. GBI Tambunan No. 1',       telp:'+62 812-9876-5432', email:'sekretariat@gbitambunan.org',   hari:'Sen – Sab', jam:'09.00 – 15.00 WIB' },
    { id:3, nama:'Pos Pelayanan Balige',alamat:'Jl. Sisingamangaraja No. 45, Balige',                telp:'+62 813-1122-3344', email:'balige@gbitambunan.org',         hari:'Sel, Kam, Sab', jam:'10.00 – 14.00 WIB' },
  ];

  function loadData()   { try { return JSON.parse(localStorage.getItem(KEY_DATA)) || null; } catch(e){ return null; } }
  function loadNextId() { return parseInt(localStorage.getItem(KEY_NEXTID) || '4'); }
  function saveData()   { localStorage.setItem(KEY_DATA, JSON.stringify(data)); }
  function saveNextId() { localStorage.setItem(KEY_NEXTID, String(nextId)); }

  let data     = loadData() || JSON.parse(JSON.stringify(DEFAULT_DATA));
  let nextId   = loadNextId();
  let editId   = null;
  let deleteId = null;

  function esc(s) {
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
  }

  /* ── RENDER ── */
  function render(list) {
    const tbody  = document.getElementById('tbody');
    const noData = document.getElementById('noData');
    if (!list) list = data;
    tbody.innerHTML = '';
    if (list.length === 0) { noData.style.display='block'; updateStats(); return; }
    noData.style.display = 'none';
    list.forEach((d, i) => {
      const tr = document.createElement('tr');
      tr.setAttribute('data-id', d.id);
      tr.style.animation = `fadeUp .3s ease ${i*0.05}s both`;
      tr.innerHTML = `
        <td style="color:#b0b8c9;font-size:12px;">${String(i+1).padStart(2,'0')}</td>
        <td>
          <div class="loc-name">${esc(d.nama)}</div>
          <div class="loc-addr">${esc(d.alamat)}</div>
        </td>
        <td><span class="pill-cyan">📞 ${esc(d.telp)}</span></td>
        <td><span class="pill-gold">✉ ${esc(d.email)}</span></td>
        <td>
          <div class="jam-main">${esc(d.hari)}</div>
          <div class="jam-sub">${esc(d.jam)}</div>
        </td>
        <td>
          <div style="display:flex;gap:6px;">
            <button class="act-btn btn-edit" onclick="openEdit(${d.id})">✏ Edit</button>
            <button class="act-btn btn-del"  onclick="askDelete(${d.id},'${esc(d.nama)}')">🗑 Hapus</button>
          </div>
        </td>`;
      tbody.appendChild(tr);
    });
    updateStats();
  }

  function updateStats() {
    document.getElementById('statTotal').textContent = data.length;
    document.getElementById('statTelp').textContent  = data.filter(d=>d.telp).length;
    document.getElementById('statEmail').textContent = data.filter(d=>d.email).length;
  }

  function filterTable(q) {
    render(data.filter(d => Object.values(d).join(' ').toLowerCase().includes(q.toLowerCase())));
  }

  /* ── FORM ── */
  function openAdd() {
    editId = null;
    document.getElementById('mTitle').innerHTML = 'Tambah <span>Kontak</span>';
    clearForm();
    document.getElementById('formOverlay').classList.add('open');
  }

  function openEdit(id) {
    editId = id;
    const d = data.find(x=>x.id===id); if(!d) return;
    document.getElementById('mTitle').innerHTML = 'Edit <span>Kontak</span>';
    document.getElementById('fNama').value   = d.nama;
    document.getElementById('fTelp').value   = d.telp;
    document.getElementById('fAlamat').value = d.alamat;
    document.getElementById('fEmail').value  = d.email;
    document.getElementById('fHari').value   = d.hari;
    document.getElementById('fJam').value    = d.jam;
    document.getElementById('formOverlay').classList.add('open');
  }

  function closeForm() { document.getElementById('formOverlay').classList.remove('open'); editId = null; }
  function clearForm() { ['fNama','fTelp','fAlamat','fEmail','fHari','fJam'].forEach(id => document.getElementById(id).value=''); }

  function saveForm() {
    const nama   = document.getElementById('fNama').value.trim();
    const telp   = document.getElementById('fTelp').value.trim();
    const alamat = document.getElementById('fAlamat').value.trim();
    const email  = document.getElementById('fEmail').value.trim();
    const hari   = document.getElementById('fHari').value.trim();
    const jam    = document.getElementById('fJam').value.trim();
    if (!nama||!telp||!alamat||!email||!hari||!jam) { toast('Semua field wajib diisi!','err'); return; }
    if (editId) {
      const idx = data.findIndex(x=>x.id===editId);
      if (idx>-1) data[idx] = { id:editId, nama, telp, alamat, email, hari, jam };
      toast('Kontak berhasil diperbarui ✓','ok');
    } else {
      data.push({ id:nextId++, nama, telp, alamat, email, hari, jam });
      saveNextId();
      toast('Kontak baru berhasil ditambahkan ✓','ok');
    }
    saveData(); render(); closeForm();
  }

  /* ── DELETE ── */
  function askDelete(id, name) {
    deleteId = id;
    document.getElementById('confirmName').textContent = '"' + name + '"';
    document.getElementById('confirmOverlay').classList.add('open');
  }
  function closeConfirm() { document.getElementById('confirmOverlay').classList.remove('open'); deleteId=null; }
  function doDelete() {
    data = data.filter(x=>x.id!==deleteId);
    saveData(); render(); closeConfirm();
    toast('Kontak berhasil dihapus','err');
  }

  /* ── TOAST ── */
  function toast(msg, type='ok') {
    const t = document.getElementById('toast');
    t.textContent = (type==='ok'?'✅ ':'🗑 ') + msg;
    t.className = 'toast ' + type;
    t.classList.add('show');
    setTimeout(()=>t.classList.remove('show'), 3000);
  }

  ['formOverlay','confirmOverlay'].forEach(id => {
    document.getElementById(id).addEventListener('click', function(e) {
      if (e.target===this) { this.classList.remove('open'); editId=null; deleteId=null; }
    });
  });

  render();
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
})();
</script>
</body>
</html>