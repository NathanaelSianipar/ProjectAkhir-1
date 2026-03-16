<?php
// resources/views/jadwal/index.php
// Untuk Laravel: rename ke index.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Jadwal Ibadah – Admin GBI Tambunan</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:         #f4f6f9;
      --white:      #ffffff;
      --border:     #e4e8ef;
      --border2:    #d0d7e3;
      --text:       #1a2233;
      --muted:      #7a8499;
      --cyan:       #1da8e0;
      --cyan-dk:    #0d85b5;
      --cyan-lt:    #e8f6fd;
      --gold:       #c89b3c;
      --gold-lt:    #fdf6e3;
      --danger:     #e05555;
      --danger-lt:  #fdf0f0;
      --success:    #2ea86a;
      --success-lt: #e8f7ef;
      --purple:     #8b5cf6;
      --purple-lt:  #f3f0ff;
      --orange:     #f97316;
      --orange-lt:  #fff4ed;
      --sidebar:    #1e2430;
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
    .topbar-nav a { color:var(--muted); font-size:13px; font-weight:600; text-decoration:none; padding:5px 12px; border-radius:6px; transition:all .15s; }
    .topbar-nav a:hover { color:var(--text); background:#f0f2f5; }
    .topbar-nav a.active { color:var(--cyan); background:var(--cyan-lt); }
    .topbar-right { display:flex; align-items:center; gap:12px; }
    .btn-viewsite { background:var(--cyan-lt); border:1px solid rgba(29,168,224,.3); color:var(--cyan); font-family:'Nunito',sans-serif; font-size:12px; font-weight:700; padding:5px 14px; border-radius:6px; cursor:pointer; transition:all .15s; }
    .btn-viewsite:hover { background:var(--cyan); color:#fff; }
    .avatar { width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#fff; cursor:pointer; }

    /* ─── SIDEBAR ─── */
    .sidebar {
      position:fixed; top:56px; left:0; bottom:0; width:240px;
      background:var(--sidebar); display:flex; flex-direction:column; overflow-y:auto; z-index:100;
    }
    .sidebar-user { display:flex; align-items:center; gap:12px; padding:18px 18px 14px; border-bottom:1px solid rgba(255,255,255,.07); }
    .sidebar-user .ava { width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:15px; font-weight:700; color:#fff; flex-shrink:0; }
    .sidebar-user .info strong { display:block; font-size:14px; font-weight:700; color:#fff; }
    .sidebar-user .info span   { font-size:11px; color:var(--cyan); }
    .sidebar-search { display:flex; align-items:center; gap:8px; margin:12px 14px; background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.1); border-radius:7px; padding:7px 12px; }
    .sidebar-search input { background:none; border:none; outline:none; color:#fff; font-family:'Nunito',sans-serif; font-size:13px; flex:1; }
    .sidebar-search input::placeholder { color:rgba(255,255,255,.3); }
    .nav-section { padding:10px 18px 4px; font-size:10px; font-weight:700; letter-spacing:1.4px; color:rgba(255,255,255,.25); text-transform:uppercase; }
    .sidebar nav a { display:flex; align-items:center; gap:10px; padding:9px 18px; font-size:13.5px; font-weight:600; color:rgba(255,255,255,.5); text-decoration:none; border-left:3px solid transparent; transition:all .15s; }
    .sidebar nav a:hover { color:#fff; background:rgba(255,255,255,.06); }
    .sidebar nav a.active { color:#fff; border-left-color:var(--cyan); background:rgba(29,168,224,.15); }
    .sidebar nav a .ico { font-size:15px; width:20px; text-align:center; }
    .sidebar-footer { margin-top:auto; padding:14px 18px; border-top:1px solid rgba(255,255,255,.07); font-size:11px; color:rgba(255,255,255,.3); }
    .sidebar-footer strong { color:rgba(255,255,255,.6); display:block; }

    /* ─── WRAPPER ─── */
    .wrapper { margin-left:240px; padding-top:56px; min-height:100vh; }
    .content-header { display:flex; align-items:center; justify-content:space-between; padding:20px 28px 0; }
    .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; }
    .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
    .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
    .content { padding:22px 28px 60px; }

    /* ─── HERO ─── */
    .page-hero {
      position:relative; overflow:hidden; border-radius:16px; margin-bottom:28px;
      background:linear-gradient(135deg, var(--cyan-dk), var(--cyan), #29c4f0);
      padding:36px 40px; box-shadow:0 6px 24px rgba(29,168,224,.25);
    }
    .page-hero::before {
      content:''; position:absolute; inset:0;
      background:radial-gradient(ellipse 50% 80% at 95% 50%, rgba(255,255,255,.12) 0%, transparent 65%),
                 radial-gradient(ellipse 35% 60% at 5% 90%, rgba(200,155,60,.18) 0%, transparent 55%);
      pointer-events:none;
    }
    .hero-tag { display:inline-block; background:rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; padding:4px 12px; border-radius:20px; margin-bottom:12px; }
    .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:28px; font-weight:700; color:#fff; margin-bottom:8px; }
    .page-hero p  { color:rgba(255,255,255,.8); font-size:14px; max-width:520px; line-height:1.65; }
    .hero-actions { margin-top:20px; display:flex; gap:10px; }
    .btn-hero-primary { background:#fff; color:var(--cyan); border:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(0,0,0,.1); }
    .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); }
    .btn-hero-outline { background:rgba(255,255,255,.15); color:#fff; border:1px solid rgba(255,255,255,.4); font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; }
    .btn-hero-outline:hover { background:rgba(255,255,255,.25); }

    /* ─── STATS ROW ─── */
    .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
    .stat-card { background:var(--white); border:1px solid var(--border); border-radius:11px; padding:16px 18px; display:flex; align-items:center; gap:14px; box-shadow:0 1px 4px rgba(0,0,0,.04); animation:fadeUp .35s ease both; }
    .stat-card:nth-child(1){animation-delay:.05s} .stat-card:nth-child(2){animation-delay:.10s}
    .stat-card:nth-child(3){animation-delay:.15s} .stat-card:nth-child(4){animation-delay:.20s}
    @keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
    .stat-icon { width:40px; height:40px; border-radius:9px; display:flex; align-items:center; justify-content:center; font-size:18px; }
    .ic{background:var(--cyan-lt)} .ig{background:var(--gold-lt)} .is{background:var(--success-lt)} .ip{background:var(--purple-lt)}
    .stat-val { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; line-height:1; }
    .vc{color:var(--cyan)} .vg{color:var(--gold)} .vs{color:var(--success)} .vp{color:var(--purple)}
    .stat-lbl { font-size:11.5px; color:var(--muted); margin-top:3px; }

    /* ─── SECTION HEAD ─── */
    .section-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; }
    .section-title { font-family:'Rajdhani',sans-serif; font-size:18px; font-weight:700; color:var(--text); letter-spacing:.4px; display:flex; align-items:center; gap:10px; flex:1; }
    .section-title::after { content:''; flex:1; height:1px; background:var(--border); }

    /* ─── DAY LABEL ─── */
    .day-label {
      display:inline-flex; align-items:center; gap:8px;
      font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700;
      color:var(--text); letter-spacing:.4px;
      padding:6px 16px; background:var(--white); border:1px solid var(--border);
      border-radius:8px; margin-bottom:14px;
      box-shadow:0 1px 3px rgba(0,0,0,.04);
    }
    .day-label.minggu { border-left:3px solid var(--cyan); }
    .day-label.sabtu  { border-left:3px solid var(--gold); }
    .day-label.khusus { border-left:3px solid var(--purple); }

    /* ─── JADWAL GRID ─── */
    .jadwal-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-bottom:24px; }

    /* ─── JADWAL CARD ─── */
    .jcard {
      background:var(--white); border:1px solid var(--border); border-radius:13px;
      padding:22px 20px; position:relative; overflow:hidden;
      box-shadow:0 1px 5px rgba(0,0,0,.05);
      transition:transform .2s, box-shadow .2s;
      animation:fadeUp .4s ease both;
    }
    .jcard:hover { transform:translateY(-3px); box-shadow:0 8px 22px rgba(0,0,0,.09); }
    .jcard::before { content:''; position:absolute; top:0; left:0; right:0; height:3px; border-radius:13px 13px 0 0; }
    .jcard.c::before { background:linear-gradient(90deg,var(--cyan),#29c4f0); }
    .jcard.g::before { background:linear-gradient(90deg,var(--gold),#f0c050); }
    .jcard.s::before { background:linear-gradient(90deg,var(--success),#4cdb8f); }
    .jcard.r::before { background:linear-gradient(90deg,var(--danger),#ff7a7a); }
    .jcard.p::before { background:linear-gradient(90deg,var(--purple),#a78bfa); }
    .jcard.o::before { background:linear-gradient(90deg,var(--orange),#fbbf24); }

    .jcard-icon { width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:20px; margin-bottom:14px; }
    .jcard.c .jcard-icon { background:var(--cyan-lt); }
    .jcard.g .jcard-icon { background:var(--gold-lt); }
    .jcard.s .jcard-icon { background:var(--success-lt); }
    .jcard.r .jcard-icon { background:var(--danger-lt); }
    .jcard.p .jcard-icon { background:var(--purple-lt); }
    .jcard.o .jcard-icon { background:var(--orange-lt); }

    .jcard-title { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:var(--text); margin-bottom:8px; }
    .jcard-meta  { display:flex; flex-direction:column; gap:4px; margin-bottom:10px; }
    .jcard-meta span { font-size:12px; color:var(--muted); display:flex; align-items:center; gap:5px; }
    .jcard-desc  { font-size:12.5px; color:var(--muted); line-height:1.6; margin-bottom:14px; }

    .jcard-footer { display:flex; align-items:center; justify-content:space-between; }
    .btn-detail {
      display:inline-flex; align-items:center; gap:5px;
      font-family:'Nunito',sans-serif; font-size:12px; font-weight:700;
      padding:5px 14px; border-radius:6px; cursor:pointer; transition:all .15s; border:1px solid;
    }
    .jcard.c .btn-detail { background:var(--cyan-lt); color:var(--cyan); border-color:rgba(29,168,224,.25); }
    .jcard.c .btn-detail:hover { background:var(--cyan); color:#fff; }
    .jcard.g .btn-detail { background:var(--gold-lt); color:var(--gold); border-color:rgba(200,155,60,.25); }
    .jcard.g .btn-detail:hover { background:var(--gold); color:#fff; }
    .jcard.s .btn-detail { background:var(--success-lt); color:var(--success); border-color:rgba(46,168,106,.25); }
    .jcard.s .btn-detail:hover { background:var(--success); color:#fff; }
    .jcard.r .btn-detail { background:var(--danger-lt); color:var(--danger); border-color:rgba(224,85,85,.25); }
    .jcard.r .btn-detail:hover { background:var(--danger); color:#fff; }
    .jcard.p .btn-detail { background:var(--purple-lt); color:var(--purple); border-color:rgba(139,92,246,.25); }
    .jcard.p .btn-detail:hover { background:var(--purple); color:#fff; }
    .jcard.o .btn-detail { background:var(--orange-lt); color:var(--orange); border-color:rgba(249,115,22,.25); }
    .jcard.o .btn-detail:hover { background:var(--orange); color:#fff; }

    .jcard-actions { display:flex; gap:6px; }
    .act-btn { border:none; border-radius:6px; cursor:pointer; font-family:'Nunito',sans-serif; font-size:11px; font-weight:700; padding:5px 10px; transition:all .15s; }
    .btn-edit { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.2); }
    .btn-edit:hover { background:var(--cyan); color:#fff; }
    .btn-del  { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.2); }
    .btn-del:hover  { background:var(--danger); color:#fff; }

    /* Acara Khusus badge */
    .bulan-badge {
      display:inline-block; font-size:10px; font-weight:700; letter-spacing:.4px;
      text-transform:uppercase; padding:3px 10px; border-radius:20px;
    }
    .b-c { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.25); }
    .b-g { background:var(--gold-lt);  color:var(--gold);  border:1px solid rgba(200,155,60,.25); }
    .b-s { background:var(--success-lt); color:var(--success); border:1px solid rgba(46,168,106,.25); }
    .b-r { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.25); }
    .b-p { background:var(--purple-lt); color:var(--purple); border:1px solid rgba(139,92,246,.25); }
    .b-o { background:var(--orange-lt); color:var(--orange); border:1px solid rgba(249,115,22,.25); }

    /* ─── ADD BUTTONS ─── */
    .add-btn { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700; padding:8px 16px; border-radius:7px; cursor:pointer; transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
    .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* ─── MODAL ─── */
    .overlay { display:none; position:fixed; inset:0; z-index:300; background:rgba(26,34,51,.45); backdrop-filter:blur(4px); align-items:center; justify-content:center; }
    .overlay.open { display:flex; }
    .modal { background:var(--white); border:1px solid var(--border); border-radius:14px; padding:28px; width:540px; max-width:94vw; box-shadow:0 20px 60px rgba(0,0,0,.15); animation:mIn .22s ease; }
    @keyframes mIn { from{opacity:0;transform:translateY(12px) scale(.97)} to{opacity:1;transform:translateY(0) scale(1)} }
    .modal-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:22px; }
    .modal-head h3 { font-family:'Rajdhani',sans-serif; font-size:19px; font-weight:700; color:var(--text); }
    .modal-head h3 span { color:var(--cyan); }
    .close-btn { background:#f0f2f5; border:none; color:var(--muted); width:30px; height:30px; border-radius:7px; cursor:pointer; font-size:15px; display:flex; align-items:center; justify-content:center; transition:all .14s; }
    .close-btn:hover { background:var(--danger); color:#fff; }
    .fg { display:flex; flex-direction:column; gap:5px; margin-bottom:14px; }
    .fg label { font-size:10.5px; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:var(--muted); }
    .fg input, .fg textarea, .fg select { background:var(--bg); border:1px solid var(--border); color:var(--text); font-family:'Nunito',sans-serif; font-size:13px; padding:9px 13px; border-radius:7px; outline:none; transition:all .15s; resize:none; }
    .fg input:focus, .fg textarea:focus, .fg select:focus { border-color:var(--cyan); background:#fff; box-shadow:0 0 0 3px rgba(29,168,224,.08); }
    .fg input::placeholder, .fg textarea::placeholder { color:#b0b8c9; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
    .form-row3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
    .modal-foot { display:flex; justify-content:flex-end; gap:10px; margin-top:6px; }
    .btn-cancel { background:#f0f2f5; border:1px solid var(--border); color:var(--muted); font-family:'Nunito',sans-serif; font-size:13px; font-weight:600; padding:9px 18px; border-radius:7px; cursor:pointer; transition:all .14s; }
    .btn-cancel:hover { color:var(--text); background:var(--border); }
    .btn-save { background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); border:none; color:#fff; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 22px; border-radius:7px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
    .btn-save:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* ─── TOAST ─── */
    .toast { position:fixed; bottom:24px; right:24px; z-index:400; background:var(--white); border:1px solid var(--border); border-radius:10px; padding:13px 20px; display:flex; align-items:center; gap:10px; font-size:13px; font-weight:600; color:var(--text); box-shadow:0 8px 32px rgba(0,0,0,.12); transform:translateY(16px); opacity:0; transition:all .28s ease; pointer-events:none; }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast.ok  { border-left:3px solid var(--success); }
    .toast.err { border-left:3px solid var(--danger); }

    ::-webkit-scrollbar { width:5px; }
    ::-webkit-scrollbar-track { background:var(--bg); }
    ::-webkit-scrollbar-thumb { background:var(--border2); border-radius:3px; }
    ::-webkit-scrollbar-thumb:hover { background:#b0b8c9; }

    @media(max-width:1100px) { .jadwal-grid { grid-template-columns:1fr 1fr; } }
    @media(max-width:900px)  { .sidebar{display:none;} .wrapper{margin-left:0;} .jadwal-grid{grid-template-columns:1fr;} .stats-row{grid-template-columns:1fr 1fr;} }

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
    <a href="#" class="active">Jadwal Ibadah</a>
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
    <a href="{{ route('tentang.index') }}"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="#" class="active"><span class="ico">📅</span> Jadwal Ibadah</a>
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
    <h1>Jadwal Ibadah & Kegiatan</h1>
    <div class="breadcrumb-bar"><a href="#">Home</a> / <span>Jadwal Ibadah</span></div>
  </div>

  <div class="content">

    <!-- HERO -->
    <div class="page-hero">
      <div class="hero-tag">📅 Jadwal Ibadah</div>
      <h2>Jadwal Ibadah & Kegiatan</h2>
      <p>Mari bertumbuh bersama dalam iman, doa, dan persekutuan. Kelola jadwal ibadah mingguan dan acara khusus gereja dari sini.</p>
      <div class="hero-actions">
        <button class="btn-hero-primary" onclick="openModal('mingguan')">＋ Tambah Jadwal</button>
        <button class="btn-hero-outline" onclick="openModal('khusus')">✨ Tambah Acara Khusus</button>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon ic">📅</div>
        <div><div class="stat-val vc" id="statMingguan">6</div><div class="stat-lbl">Jadwal Mingguan</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ig">✨</div>
        <div><div class="stat-val vg" id="statKhusus">5</div><div class="stat-lbl">Acara Khusus</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon is">⛪</div>
        <div><div class="stat-val vs">2</div><div class="stat-lbl">Hari Aktif</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ip">📍</div>
        <div><div class="stat-val vp">3</div><div class="stat-lbl">Lokasi</div></div>
      </div>
    </div>

    <!-- ══ JADWAL MINGGUAN ══ -->
    <div class="section-head">
      <div class="section-title">📅 Jadwal Mingguan</div>
      <button class="add-btn" onclick="openModal('mingguan')">＋ Tambah Jadwal</button>
    </div>

    <!-- MINGGU -->
    <div class="day-label minggu">☀ Minggu</div>
    <div class="jadwal-grid" id="gridMinggu"></div>

    <!-- SABTU -->
    <div class="day-label sabtu">🌙 Sabtu</div>
    <div class="jadwal-grid" id="gridSabtu"></div>

    <!-- ══ ACARA KHUSUS ══ -->
    <div class="section-head" style="margin-top:8px;">
      <div class="section-title">✨ Acara Khusus</div>
      <button class="add-btn" onclick="openModal('khusus')">＋ Tambah Acara</button>
    </div>
    <div class="jadwal-grid" id="gridKhusus"></div>

  </div>
</div>

<!-- ══ MODAL: TAMBAH / EDIT JADWAL MINGGUAN ══ -->
<div class="overlay" id="modalMingguan">
  <div class="modal">
    <div class="modal-head">
      <h3 id="mTitleMingguan">➕ Tambah <span>Jadwal Mingguan</span></h3>
      <button class="close-btn" onclick="closeModal('mingguan')">✕</button>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Nama Ibadah *</label>
        <input id="mNama" type="text" placeholder="cth. Ibadah Sesi 1"/>
      </div>
      <div class="fg">
        <label>Hari *</label>
        <select id="mHari">
          <option value="Minggu">Minggu</option>
          <option value="Sabtu">Sabtu</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Jam *</label>
        <input id="mJam" type="text" placeholder="cth. 09.00 WIB"/>
      </div>
      <div class="fg">
        <label>Lokasi *</label>
        <input id="mLokasi" type="text" placeholder="cth. GBI Tambunan"/>
      </div>
    </div>
    <div class="fg">
      <label>Deskripsi</label>
      <textarea id="mDesc" rows="2" placeholder="Keterangan singkat tentang ibadah ini..."></textarea>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Ikon (emoji)</label>
        <input id="mIkon" type="text" placeholder="cth. 👥" maxlength="4"/>
      </div>
      <div class="fg">
        <label>Warna Aksen</label>
        <select id="mWarna">
          <option value="c">Biru Cyan</option>
          <option value="g">Gold</option>
          <option value="s">Hijau</option>
          <option value="r">Merah</option>
          <option value="p">Ungu</option>
          <option value="o">Orange</option>
        </select>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal('mingguan')">Batal</button>
      <button class="btn-save" onclick="saveMingguan()">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: TAMBAH / EDIT ACARA KHUSUS ══ -->
<div class="overlay" id="modalKhusus">
  <div class="modal">
    <div class="modal-head">
      <h3 id="mTitleKhusus">✨ Tambah <span>Acara Khusus</span></h3>
      <button class="close-btn" onclick="closeModal('khusus')">✕</button>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Nama Acara *</label>
        <input id="kNama" type="text" placeholder="cth. Retreat Jemaat"/>
      </div>
      <div class="fg">
        <label>Bulan / Periode *</label>
        <input id="kBulan" type="text" placeholder="cth. Tahunan / Desember"/>
      </div>
    </div>
    <div class="fg">
      <label>Deskripsi</label>
      <textarea id="kDesc" rows="2" placeholder="Keterangan singkat tentang acara ini..."></textarea>
    </div>
    <div class="form-row">
      <div class="fg">
        <label>Ikon (emoji)</label>
        <input id="kIkon" type="text" placeholder="cth. 🎉" maxlength="4"/>
      </div>
      <div class="fg">
        <label>Warna Badge</label>
        <select id="kWarna">
          <option value="c">Biru Cyan</option>
          <option value="g">Gold</option>
          <option value="s">Hijau</option>
          <option value="r">Merah</option>
          <option value="p">Ungu</option>
          <option value="o">Orange</option>
        </select>
      </div>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal('khusus')">Batal</button>
      <button class="btn-save" onclick="saveKhusus()">💾 Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
  /* ── Storage ── */
  const KM = 'gbi_jadwal_mingguan';
  const KK = 'gbi_jadwal_khusus';
  const KN = 'gbi_jadwal_nextid';

  const DEF_MINGGUAN = [
    { id:1, nama:'Ibadah Sesi 1 + Sekolah Minggu', hari:'Minggu', jam:'09.00 WIB', lokasi:'GBI Tambunan', desc:'Ibadah umum disertai dengan Sekolah Minggu, untuk anak-anak.',  ikon:'👥', warna:'c' },
    { id:2, nama:'Ibadah Sesi 2',                  hari:'Minggu', jam:'11.00 WIB', lokasi:'GBI Tambunan', desc:'Ibadah umum untuk seluruh jemaat dengan pelayanan pujian.',     ikon:'🎤', warna:'c' },
    { id:3, nama:'Ibadah Sesi 3',                  hari:'Minggu', jam:'16.00 WIB', lokasi:'Pos Ptd. Pd. Selumbang', desc:'Ibadah sore di lokasi pos pelayanan dengan suasana kekeluargaan.', ikon:'🔥', warna:'g' },
    { id:4, nama:'Doa Puasa',                      hari:'Sabtu',  jam:'10.00 – 12.00 WIB', lokasi:'GBI Tambunan', desc:'Waktu khusus untuk berdoa dan berpuasa bersama.',   ikon:'❤️', warna:'r' },
    { id:5, nama:'Menara Doa',                     hari:'Sabtu',  jam:'15.00 WIB', lokasi:'GBI Tambunan', desc:'Persekutuan doa untuk berbagai kebutuhan jemaat.',              ikon:'💧', warna:'c' },
    { id:6, nama:'Next Gen (Pemuda)',               hari:'Sabtu',  jam:'19.00 WIB', lokasi:'GBI Tambunan', desc:'Persekutuan khusus generasi muda, pujian, sharing, dan firman Tuhan.', ikon:'⚡', warna:'p' },
  ];
  const DEF_KHUSUS = [
    { id:7,  nama:'Retreat Jemaat', bulan:'Tahunan',               desc:'Acara khusus untuk pendalaman rohani dan persekutuan.',            ikon:'📋', warna:'c' },
    { id:8,  nama:'Perayaan Natal', bulan:'Desember',              desc:'Perayaan kelahiran Yesus Kristus bersama jemaat.',                 ikon:'⭐', warna:'r' },
    { id:9,  nama:'Perayaan Paskah',bulan:'Maret/April',           desc:'Perayaan kebangkitan Yesus Kristus.',                              ikon:'👥', warna:'s' },
    { id:10, nama:'Baptisan',       bulan:'Setiap Semester',       desc:'Sakramen baptisan bagi yang percaya dan siap dibaptis.',           ikon:'💧', warna:'c' },
    { id:11, nama:'Pernikahan',     bulan:'Sesuai Permintaan',     desc:'Pemberkatan pernikahan Kristen untuk pasangan jemaat.',            ikon:'💛', warna:'g' },
  ];

  function loadArr(k, def) { try { const v=localStorage.getItem(k); return v ? JSON.parse(v) : null; } catch(e){ return null; } }
  function saveArr(k, v)   { localStorage.setItem(k, JSON.stringify(v)); }

  let mingguan = loadArr(KM) || JSON.parse(JSON.stringify(DEF_MINGGUAN));
  let khusus   = loadArr(KK) || JSON.parse(JSON.stringify(DEF_KHUSUS));
  let nextId   = parseInt(localStorage.getItem(KN) || '12');
  let editMId  = null;
  let editKId  = null;

  function esc(s){ return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }

  /* ── RENDER ── */
  function renderAll() {
    renderMingguan(); renderKhusus(); updateStats();
  }

  function renderMingguan() {
    const minggu = mingguan.filter(j=>j.hari==='Minggu');
    const sabtu  = mingguan.filter(j=>j.hari==='Sabtu');
    document.getElementById('gridMinggu').innerHTML = minggu.length ? minggu.map((j,i)=>jCard(j,i,'mingguan')).join('') : emptyGrid();
    document.getElementById('gridSabtu').innerHTML  = sabtu.length  ? sabtu.map((j,i)=>jCard(j,i,'mingguan')).join('') : emptyGrid();
  }

  function renderKhusus() {
    document.getElementById('gridKhusus').innerHTML = khusus.length ? khusus.map((j,i)=>jCardKhusus(j,i)).join('') : emptyGrid();
  }

  function emptyGrid() {
    return `<div style="grid-column:1/-1;text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);border:1px dashed var(--border);border-radius:12px;">Belum ada data. Klik <strong>Tambah</strong> untuk menambahkan.</div>`;
  }

  function jCard(j, i, type) {
    return `
    <div class="jcard ${esc(j.warna)}" style="animation-delay:${i*0.06}s">
      <div class="jcard-icon">${esc(j.ikon||'📅')}</div>
      <div class="jcard-title">${esc(j.nama)}</div>
      <div class="jcard-meta">
        <span>🕐 ${esc(j.jam)}</span>
        <span>📍 ${esc(j.lokasi)}</span>
      </div>
      <div class="jcard-desc">${esc(j.desc)}</div>
      <div class="jcard-footer">
        <button class="btn-detail act-btn" onclick="openEditMingguan(${j.id})">Lihat Detail →</button>
        <div class="jcard-actions">
          <button class="act-btn btn-edit" onclick="openEditMingguan(${j.id})">✏</button>
          <button class="act-btn btn-del"  onclick="delMingguan(${j.id})">🗑</button>
        </div>
      </div>
    </div>`;
  }

  function jCardKhusus(j, i) {
    return `
    <div class="jcard ${esc(j.warna)}" style="animation-delay:${i*0.06}s">
      <div class="jcard-icon">${esc(j.ikon||'✨')}</div>
      <div class="jcard-title">${esc(j.nama)}</div>
      <div class="jcard-desc">${esc(j.desc)}</div>
      <div class="jcard-footer">
        <span class="bulan-badge b-${esc(j.warna)}">${esc(j.bulan)}</span>
        <div class="jcard-actions">
          <button class="act-btn btn-edit" onclick="openEditKhusus(${j.id})">✏</button>
          <button class="act-btn btn-del"  onclick="delKhusus(${j.id})">🗑</button>
        </div>
      </div>
    </div>`;
  }

  function updateStats() {
    document.getElementById('statMingguan').textContent = mingguan.length;
    document.getElementById('statKhusus').textContent   = khusus.length;
  }

  /* ── MODAL MINGGUAN ── */
  function openModal(type) {
    if (type==='mingguan') {
      editMId = null;
      document.getElementById('mTitleMingguan').innerHTML = '➕ Tambah <span>Jadwal Mingguan</span>';
      ['mNama','mJam','mLokasi','mDesc','mIkon'].forEach(id=>document.getElementById(id).value='');
      document.getElementById('mHari').value  = 'Minggu';
      document.getElementById('mWarna').value = 'c';
      document.getElementById('modalMingguan').classList.add('open');
    } else {
      editKId = null;
      document.getElementById('mTitleKhusus').innerHTML = '✨ Tambah <span>Acara Khusus</span>';
      ['kNama','kBulan','kDesc','kIkon'].forEach(id=>document.getElementById(id).value='');
      document.getElementById('kWarna').value = 'c';
      document.getElementById('modalKhusus').classList.add('open');
    }
  }

  function openEditMingguan(id) {
    const j = mingguan.find(x=>x.id===id); if(!j) return;
    editMId = id;
    document.getElementById('mTitleMingguan').innerHTML = '✏ Edit <span>Jadwal Mingguan</span>';
    document.getElementById('mNama').value   = j.nama;
    document.getElementById('mHari').value   = j.hari;
    document.getElementById('mJam').value    = j.jam;
    document.getElementById('mLokasi').value = j.lokasi;
    document.getElementById('mDesc').value   = j.desc;
    document.getElementById('mIkon').value   = j.ikon||'';
    document.getElementById('mWarna').value  = j.warna||'c';
    document.getElementById('modalMingguan').classList.add('open');
  }

  function openEditKhusus(id) {
    const j = khusus.find(x=>x.id===id); if(!j) return;
    editKId = id;
    document.getElementById('mTitleKhusus').innerHTML = '✏ Edit <span>Acara Khusus</span>';
    document.getElementById('kNama').value  = j.nama;
    document.getElementById('kBulan').value = j.bulan;
    document.getElementById('kDesc').value  = j.desc;
    document.getElementById('kIkon').value  = j.ikon||'';
    document.getElementById('kWarna').value = j.warna||'c';
    document.getElementById('modalKhusus').classList.add('open');
  }

  function closeModal(type) {
    document.getElementById(type==='mingguan'?'modalMingguan':'modalKhusus').classList.remove('open');
    editMId = editKId = null;
  }

  /* ── SAVE ── */
  function saveMingguan() {
    const nama   = document.getElementById('mNama').value.trim();
    const hari   = document.getElementById('mHari').value;
    const jam    = document.getElementById('mJam').value.trim();
    const lokasi = document.getElementById('mLokasi').value.trim();
    const desc   = document.getElementById('mDesc').value.trim();
    const ikon   = document.getElementById('mIkon').value.trim() || '📅';
    const warna  = document.getElementById('mWarna').value;
    if (!nama||!jam||!lokasi) { toast('Nama, jam, dan lokasi wajib diisi!','err'); return; }
    if (editMId) {
      const idx = mingguan.findIndex(x=>x.id===editMId);
      if (idx>-1) mingguan[idx] = { id:editMId, nama, hari, jam, lokasi, desc, ikon, warna };
      toast('Jadwal berhasil diperbarui ✓','ok');
    } else {
      mingguan.push({ id:nextId++, nama, hari, jam, lokasi, desc, ikon, warna });
      localStorage.setItem(KN, nextId);
      toast('Jadwal baru ditambahkan ✓','ok');
    }
    saveArr(KM, mingguan); renderAll(); closeModal('mingguan');
  }

  function saveKhusus() {
    const nama  = document.getElementById('kNama').value.trim();
    const bulan = document.getElementById('kBulan').value.trim();
    const desc  = document.getElementById('kDesc').value.trim();
    const ikon  = document.getElementById('kIkon').value.trim() || '✨';
    const warna = document.getElementById('kWarna').value;
    if (!nama||!bulan) { toast('Nama dan periode wajib diisi!','err'); return; }
    if (editKId) {
      const idx = khusus.findIndex(x=>x.id===editKId);
      if (idx>-1) khusus[idx] = { id:editKId, nama, bulan, desc, ikon, warna };
      toast('Acara berhasil diperbarui ✓','ok');
    } else {
      khusus.push({ id:nextId++, nama, bulan, desc, ikon, warna });
      localStorage.setItem(KN, nextId);
      toast('Acara baru ditambahkan ✓','ok');
    }
    saveArr(KK, khusus); renderAll(); closeModal('khusus');
  }

  /* ── DELETE ── */
  function delMingguan(id) {
    if (!confirm('Hapus jadwal ini?')) return;
    mingguan = mingguan.filter(x=>x.id!==id);
    saveArr(KM, mingguan); renderAll();
    toast('Jadwal dihapus','err');
  }
  function delKhusus(id) {
    if (!confirm('Hapus acara ini?')) return;
    khusus = khusus.filter(x=>x.id!==id);
    saveArr(KK, khusus); renderAll();
    toast('Acara dihapus','err');
  }

  /* ── TOAST ── */
  function toast(msg, type='ok') {
    const t = document.getElementById('toast');
    t.textContent = (type==='ok'?'✅ ':'🗑 ') + msg;
    t.className = 'toast ' + type;
    t.classList.add('show');
    setTimeout(()=>t.classList.remove('show'), 3000);
  }

  document.querySelectorAll('.overlay').forEach(el => {
    el.addEventListener('click', function(e){ if(e.target===this) this.classList.remove('open'); });
  });

  renderAll();
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