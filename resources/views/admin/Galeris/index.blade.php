<?php
// resources/views/galeri/index.php
// Untuk Laravel: rename ke index.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Galeri – Admin GBI Tambunan</title>
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
      --purple:    #8b5cf6;
      --purple-lt: #f3f0ff;
      --sidebar:   #1e2430;
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:var(--bg); font-family:'Nunito',sans-serif; color:var(--text); min-height:100vh; }

    /* ── TOPBAR ── */
    .topbar { position:fixed; top:0; left:0; right:0; z-index:200; height:56px; display:flex; align-items:center; justify-content:space-between; padding:0 20px 0 0; background:var(--white); border-bottom:1px solid var(--border); box-shadow:0 1px 8px rgba(0,0,0,.06); }
    .topbar-left { display:flex; align-items:center; width:240px; height:100%; flex-shrink:0; background:var(--sidebar); padding:0 18px; }
    .hamburger { background:none; border:none; color:rgba(255,255,255,.5); font-size:20px; cursor:pointer; margin-right:12px; }
    .brand { display:flex; align-items:center; gap:10px; text-decoration:none; }
    .brand-logo { width:32px; height:32px; background:linear-gradient(135deg,var(--cyan),var(--gold)); border-radius:7px; display:flex; align-items:center; justify-content:center; font-family:'Rajdhani',sans-serif; font-weight:700; font-size:13px; color:#fff; flex-shrink:0; }
    .brand-name { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:#fff; }
    .brand-name span { color:var(--cyan); }
    .topbar-nav { display:flex; align-items:center; gap:2px; flex:1; padding:0 14px; }
    .topbar-nav a { color:var(--muted); font-size:13px; font-weight:600; text-decoration:none; padding:5px 12px; border-radius:6px; transition:all .15s; }
    .topbar-nav a:hover { color:var(--text); background:#f0f2f5; }
    .topbar-nav a.active { color:var(--cyan); background:var(--cyan-lt); }
    .topbar-right { display:flex; align-items:center; gap:12px; }
    .btn-viewsite { background:var(--cyan-lt); border:1px solid rgba(29,168,224,.3); color:var(--cyan); font-family:'Nunito',sans-serif; font-size:12px; font-weight:700; padding:5px 14px; border-radius:6px; cursor:pointer; transition:all .15s; }
    .btn-viewsite:hover { background:var(--cyan); color:#fff; }
    .avatar { width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#fff; cursor:pointer; overflow:hidden; }
    .avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
    .sidebar-user .ava { overflow:hidden; }
    .sidebar-user .ava img { width:100%; height:100%; object-fit:cover; }

    /* ── SIDEBAR ── */
    .sidebar { position:fixed; top:56px; left:0; bottom:0; width:240px; background:var(--sidebar); display:flex; flex-direction:column; overflow-y:auto; z-index:100; }
    .sidebar-user { display:flex; align-items:center; gap:12px; padding:18px 18px 14px; border-bottom:1px solid rgba(255,255,255,.07); }
    .sidebar-user .ava { width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:15px; font-weight:700; color:#fff; flex-shrink:0; }
    .sidebar-user .info strong { display:block; font-size:14px; font-weight:700; color:#fff; }
    .sidebar-user .info span { font-size:11px; color:var(--cyan); }
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

    /* ── WRAPPER ── */
    .wrapper { margin-left:240px; padding-top:56px; min-height:100vh; }
    .content-header { display:flex; align-items:center; justify-content:space-between; padding:20px 28px 0; }
    .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; }
    .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
    .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
    .content { padding:22px 28px 60px; }

    /* ── HERO ── */
    .page-hero { position:relative; overflow:hidden; border-radius:16px; margin-bottom:24px; background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0); padding:34px 40px; box-shadow:0 6px 24px rgba(29,168,224,.25); }
    .page-hero::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%),radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%); pointer-events:none; }
    .hero-tag { display:inline-block; background:rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; padding:4px 12px; border-radius:20px; margin-bottom:10px; }
    .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:26px; font-weight:700; color:#fff; margin-bottom:6px; }
    .page-hero p { color:rgba(255,255,255,.8); font-size:13.5px; max-width:520px; line-height:1.65; }
    .hero-actions { margin-top:18px; display:flex; gap:10px; flex-wrap:wrap; }
    .btn-hero-primary { background:#fff; color:var(--cyan); border:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(0,0,0,.1); }
    .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); }
    .btn-hero-outline { background:rgba(255,255,255,.15); color:#fff; border:1px solid rgba(255,255,255,.4); font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; }
    .btn-hero-outline:hover { background:rgba(255,255,255,.25); }

    /* ── STATS ── */
    .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:22px; }
    .stat-card { background:var(--white); border:1px solid var(--border); border-radius:11px; padding:16px 18px; display:flex; align-items:center; gap:14px; box-shadow:0 1px 4px rgba(0,0,0,.04); animation:fadeUp .35s ease both; }
    .stat-card:nth-child(1){animation-delay:.05s}.stat-card:nth-child(2){animation-delay:.10s}.stat-card:nth-child(3){animation-delay:.15s}.stat-card:nth-child(4){animation-delay:.20s}
    @keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
    .stat-icon{width:40px;height:40px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:18px;}
    .ic{background:var(--cyan-lt)}.ig{background:var(--gold-lt)}.is{background:var(--success-lt)}.ip{background:var(--purple-lt)}
    .stat-val{font-family:'Rajdhani',sans-serif;font-size:22px;font-weight:700;line-height:1;}
    .vc{color:var(--cyan)}.vg{color:var(--gold)}.vs{color:var(--success)}.vp{color:var(--purple)}
    .stat-lbl{font-size:11.5px;color:var(--muted);margin-top:3px;}

    /* ── TOOLBAR ── */
    .toolbar { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:20px; flex-wrap:wrap; }
    .toolbar-left { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }

    .search-wrap { display:flex; align-items:center; background:var(--white); border:1px solid var(--border); border-radius:9px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,.04); }
    .search-wrap input { background:none; border:none; outline:none; color:var(--text); font-family:'Nunito',sans-serif; font-size:13px; padding:9px 14px; width:210px; }
    .search-wrap input::placeholder { color:#b0b8c9; }
    .search-wrap button { background:var(--cyan); border:none; color:#fff; padding:9px 14px; cursor:pointer; font-size:14px; transition:background .15s; }
    .search-wrap button:hover { background:var(--cyan-dk); }

    .filter-tabs { display:flex; gap:5px; }
    .tab-btn { background:var(--white); border:1px solid var(--border); color:var(--muted); font-family:'Nunito',sans-serif; font-size:12px; font-weight:700; padding:7px 14px; border-radius:7px; cursor:pointer; transition:all .15s; box-shadow:0 1px 3px rgba(0,0,0,.04); }
    .tab-btn:hover { border-color:var(--cyan); color:var(--cyan); background:var(--cyan-lt); }
    .tab-btn.active { background:var(--cyan-lt); border-color:rgba(29,168,224,.4); color:var(--cyan); }

    .add-btn { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700; padding:9px 18px; border-radius:7px; cursor:pointer; transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25); white-space:nowrap; }
    .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* ── MASONRY (CSS columns) ── */
    .masonry { columns:3; column-gap:16px; }
    .pcard {
      break-inside: avoid;
      display: block;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 16px;
      box-shadow: 0 1px 5px rgba(0,0,0,.06);
      transition: transform .22s, box-shadow .22s;
      cursor: pointer;
      position: relative;
      animation: fadeUp .4s ease both;
    }
    .pcard:hover { transform:translateY(-4px); box-shadow:0 12px 30px rgba(0,0,0,.11); }
    .pcard:hover .pcard-actions { opacity:1; }

    /* Photo area */
    .pcard-img { width:100%; overflow:hidden; position:relative; display:flex; align-items:center; justify-content:center; }
    .pcard-img img { width:100%; display:block; transition:transform .3s; }
    .pcard:hover .pcard-img img { transform:scale(1.04); }
    .pcard-placeholder { width:100%; display:flex; align-items:center; justify-content:center; font-size:52px; transition:transform .3s; }
    .pcard:hover .pcard-placeholder { transform:scale(1.06); }

    /* Date + category badge */
    .b-date { position:absolute; top:9px; left:9px; background:rgba(15,22,40,.62); backdrop-filter:blur(3px); color:#fff; font-size:10px; font-weight:700; padding:3px 8px; border-radius:5px; letter-spacing:.3px; }
    .b-cat  { position:absolute; top:9px; right:9px; font-size:10px; font-weight:700; padding:3px 9px; border-radius:20px; }
    .bci { background:var(--cyan-lt);   color:var(--cyan);   border:1px solid rgba(29,168,224,.3); }
    .bcd { background:var(--purple-lt); color:var(--purple); border:1px solid rgba(139,92,246,.3); }
    .bcp { background:var(--gold-lt);   color:var(--gold);   border:1px solid rgba(200,155,60,.3); }
    .bcs { background:var(--success-lt);color:var(--success);border:1px solid rgba(46,168,106,.3); }
    .bcl { background:#f3f4f6; color:var(--muted); border:1px solid var(--border); }

    /* Hover actions overlay */
    .pcard-actions {
      position:absolute; bottom:0; left:0; right:0;
      background:linear-gradient(to top,rgba(15,22,40,.72),transparent);
      padding:28px 12px 12px;
      display:flex; gap:6px; justify-content:flex-end;
      opacity:0; transition:opacity .2s;
    }
    .a-btn { border:none; border-radius:6px; cursor:pointer; font-family:'Nunito',sans-serif; font-size:11.5px; font-weight:700; padding:5px 12px; transition:all .14s; }
    .a-edit { background:rgba(255,255,255,.93); color:var(--text); }
    .a-edit:hover { background:#fff; }
    .a-del  { background:rgba(224,85,85,.88); color:#fff; }
    .a-del:hover { background:var(--danger); }

    /* Card body */
    .pcard-body { padding:12px 15px 15px; }
    .pcard-title { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:var(--text); margin-bottom:4px; line-height:1.3; }
    .pcard-desc  { font-size:12px; color:var(--muted); line-height:1.55; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }

    /* ── EMPTY ── */
    .empty-state { text-align:center; padding:60px 20px; color:var(--muted); background:var(--white); border:1px dashed var(--border); border-radius:14px; display:none; }
    .empty-state .ei { font-size:50px; opacity:.3; margin-bottom:14px; }

    /* ── LIGHTBOX ── */
    .lightbox { display:none; position:fixed; inset:0; z-index:500; background:rgba(8,12,26,.9); backdrop-filter:blur(8px); align-items:center; justify-content:center; padding:20px; }
    .lightbox.open { display:flex; flex-direction:column; align-items:center; justify-content:center; }
    .lb-box { position:relative; max-width:700px; width:100%; animation:lbIn .22s ease; }
    @keyframes lbIn{from{opacity:0;transform:scale(.94)}to{opacity:1;transform:scale(1)}}
    .lb-media { width:100%; border-radius:12px 12px 0 0; background:var(--sidebar); min-height:280px; display:flex; align-items:center; justify-content:center; overflow:hidden; }
    .lb-media img { width:100%; display:block; max-height:68vh; object-fit:contain; border-radius:12px 12px 0 0; }
    .lb-media .lb-ph { font-size:90px; padding:50px 0; }
    .lb-cap { background:var(--white); border-radius:0 0 12px 12px; padding:15px 20px; }
    .lb-cap h4 { font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700; color:var(--text); margin-bottom:3px; }
    .lb-cap p  { font-size:13px; color:var(--muted); }
    .lb-close { position:absolute; top:-15px; right:-15px; width:34px; height:34px; background:var(--white); border:none; border-radius:50%; font-size:16px; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 16px rgba(0,0,0,.3); transition:all .15s; }
    .lb-close:hover { background:var(--danger); color:#fff; }
    .lb-nav { position:absolute; top:42%; background:rgba(255,255,255,.92); border:none; border-radius:50%; width:38px; height:38px; font-size:20px; cursor:pointer; display:flex; align-items:center; justify-content:center; box-shadow:0 3px 12px rgba(0,0,0,.2); transition:all .15s; }
    .lb-nav:hover { background:#fff; }
    .lb-prev { left:-52px; }
    .lb-next { right:-52px; }
    .lb-ctr { color:rgba(255,255,255,.5); font-size:12px; margin-top:10px; text-align:center; letter-spacing:.5px; }

    /* ── MODAL ── */
    .overlay { display:none; position:fixed; inset:0; z-index:300; background:rgba(26,34,51,.45); backdrop-filter:blur(4px); align-items:center; justify-content:center; }
    .overlay.open { display:flex; }
    .modal { background:var(--white); border:1px solid var(--border); border-radius:14px; padding:28px; width:520px; max-width:94vw; box-shadow:0 20px 60px rgba(0,0,0,.15); animation:mIn .22s ease; max-height:92vh; overflow-y:auto; }
    @keyframes mIn{from{opacity:0;transform:translateY(12px) scale(.97)}to{opacity:1;transform:translateY(0) scale(1)}}
    .modal-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; }
    .modal-head h3 { font-family:'Rajdhani',sans-serif; font-size:19px; font-weight:700; color:var(--text); }
    .modal-head h3 span { color:var(--cyan); }
    .close-btn { background:#f0f2f5; border:none; color:var(--muted); width:30px; height:30px; border-radius:7px; cursor:pointer; font-size:15px; display:flex; align-items:center; justify-content:center; transition:all .14s; flex-shrink:0; }
    .close-btn:hover { background:var(--danger); color:#fff; }
    .fg { display:flex; flex-direction:column; gap:5px; margin-bottom:13px; }
    .fg label { font-size:10.5px; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:var(--muted); }
    .fg input,.fg textarea,.fg select { background:var(--bg); border:1px solid var(--border); color:var(--text); font-family:'Nunito',sans-serif; font-size:13px; padding:9px 13px; border-radius:7px; outline:none; transition:all .15s; resize:none; }
    .fg input:focus,.fg textarea:focus,.fg select:focus { border-color:var(--cyan); background:#fff; box-shadow:0 0 0 3px rgba(29,168,224,.08); }
    .fg input::placeholder,.fg textarea::placeholder { color:#b0b8c9; }
    .form-row { display:grid; grid-template-columns:1fr 1fr; gap:13px; }

    /* Drop zone */
    .drop-zone { border:2px dashed var(--border2); border-radius:10px; padding:24px 20px; text-align:center; cursor:pointer; transition:all .18s; background:var(--bg); margin-bottom:14px; position:relative; }
    .drop-zone:hover,.drop-zone.drag { border-color:var(--cyan); background:var(--cyan-lt); }
    .dz-icon { font-size:28px; margin-bottom:7px; }
    .drop-zone p { font-size:13px; color:var(--muted); }
    .drop-zone span { color:var(--cyan); font-weight:700; }
    .drop-zone input[type=file] { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
    .dz-preview { width:100%; height:140px; object-fit:cover; border-radius:7px; margin-top:10px; display:none; }

    .modal-foot { display:flex; justify-content:flex-end; gap:10px; margin-top:6px; }
    .btn-cancel { background:#f0f2f5; border:1px solid var(--border); color:var(--muted); font-family:'Nunito',sans-serif; font-size:13px; font-weight:600; padding:9px 18px; border-radius:7px; cursor:pointer; }
    .btn-cancel:hover { color:var(--text); background:var(--border); }
    .btn-save { background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); border:none; color:#fff; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 22px; border-radius:7px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
    .btn-save:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* ── TOAST ── */
    .toast { position:fixed; bottom:24px; right:24px; z-index:600; background:var(--white); border:1px solid var(--border); border-radius:10px; padding:13px 20px; display:flex; align-items:center; gap:10px; font-size:13px; font-weight:600; color:var(--text); box-shadow:0 8px 32px rgba(0,0,0,.12); transform:translateY(16px); opacity:0; transition:all .28s ease; pointer-events:none; }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast.ok  { border-left:3px solid var(--success); }
    .toast.err { border-left:3px solid var(--danger); }

    ::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-track{background:var(--bg);} ::-webkit-scrollbar-thumb{background:var(--border2);border-radius:3px;}
    @media(max-width:1100px){.masonry{columns:2;}}
    @media(max-width:900px){.sidebar{display:none;}.wrapper{margin-left:0;}.masonry{columns:1;}.stats-row{grid-template-columns:1fr 1fr;}}
  </style>
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <div class="topbar-left">
    <button class="hamburger">☰</button>
    <a class="brand" href="#"><div class="brand-logo">GBI</div><span class="brand-name">GBI <span>Tambunan</span></span></a>
  </div>
  <nav class="topbar-nav">
    <a href="{{ route('welcome') }}">Beranda</a>
    <a href="{{ route('tentang.index') }}">Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}">Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}" class="active">Galeri</a>
    <a href="{{ route('khotbah.index') }}">Khotbah</a>
    <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
    <a href="{{ route('kontaks.index') }}">Kontak</a>
  </nav>
  <div class="topbar-right">
    <button class="btn-viewsite">🌐 Lihat Website</button>
    <div class="avatar" id="tbAva">A</div>
  </div>
</header>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-user">
    <div class="ava" id="sbAva">A</div>
    <div class="info"><strong id="sbName">Admin GBI</strong><span id="sbRole">Administrator</span></div>
  </div>
  <div class="sidebar-search"><span style="color:rgba(255,255,255,.4)">🔍</span><input type="text" placeholder="Search..."/></div>
  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}"><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}" class="active"><span class="ico">🖼</span> Galeri</a>
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

<!-- MAIN -->
<div class="wrapper">
  <div class="content-header">
    <h1>Galeri</h1>
    <div class="breadcrumb-bar"><a href="#">Home</a> / <span>Galeri</span></div>
  </div>
  <div class="content">

    <!-- HERO -->
    <div class="page-hero">
      <div class="hero-tag">🖼 Dokumentasi</div>
      <h2>Galeri & Dokumentasi Kegiatan</h2>
      <p>Abadikan setiap momen pelayanan, ibadah, dan kebersamaan jemaat GBI Tambunan.</p>
      <div class="hero-actions">
        <button class="btn-hero-primary" onclick="openModal()">＋ Upload Foto</button>
        <button class="btn-hero-outline">📤 Bagikan Galeri</button>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon ic">🖼</div><div><div class="stat-val vc" id="stTotal">0</div><div class="stat-lbl">Total Foto</div></div></div>
      <div class="stat-card"><div class="stat-icon ig">⛪</div><div><div class="stat-val vg" id="stIbadah">0</div><div class="stat-lbl">Ibadah</div></div></div>
      <div class="stat-card"><div class="stat-icon is">🙏</div><div><div class="stat-val vs" id="stDoa">0</div><div class="stat-lbl">Doa & Pelayanan</div></div></div>
      <div class="stat-card"><div class="stat-icon ip">👥</div><div><div class="stat-val vp" id="stPemuda">0</div><div class="stat-lbl">Pemuda & Anak</div></div></div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">
      <div class="toolbar-left">
        <div class="search-wrap">
          <input type="text" id="qInput" placeholder="Cari Galeri..." oninput="render()"/>
          <button>🔍</button>
        </div>
        <div class="filter-tabs">
          <button class="tab-btn active" onclick="setF('semua',this)">Semua</button>
          <button class="tab-btn" onclick="setF('ibadah',this)">Ibadah</button>
          <button class="tab-btn" onclick="setF('doa',this)">Doa</button>
          <button class="tab-btn" onclick="setF('pemuda',this)">Pemuda</button>
          <button class="tab-btn" onclick="setF('sosial',this)">Sosial</button>
          <button class="tab-btn" onclick="setF('lainnya',this)">Lainnya</button>
        </div>
      </div>
      <button class="add-btn" onclick="openModal()">＋ Upload Foto</button>
    </div>

    <!-- MASONRY -->
    <div class="masonry" id="grid"></div>
    <div class="empty-state" id="empty"><div class="ei">🖼</div><p>Tidak ada foto ditemukan. Coba kata kunci lain atau <strong>upload foto baru</strong>.</p></div>

  </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lb" onclick="closeLb()">
  <div class="lb-box" onclick="event.stopPropagation()">
    <button class="lb-close" onclick="closeLb()">✕</button>
    <button class="lb-nav lb-prev" onclick="navLb(-1)">‹</button>
    <button class="lb-nav lb-next" onclick="navLb(1)">›</button>
    <div class="lb-media" id="lbMedia"></div>
    <div class="lb-cap"><h4 id="lbT"></h4><p id="lbD"></p></div>
  </div>
  <div class="lb-ctr" id="lbC"></div>
</div>

<!-- MODAL -->
<div class="overlay" id="ov">
  <div class="modal">
    <div class="modal-head">
      <h3 id="mTitle">📷 <span>Upload Foto</span></h3>
      <button class="close-btn" onclick="closeModal()">✕</button>
    </div>
    <div class="drop-zone" id="dz">
      <div class="dz-icon">📷</div>
      <p>Drag & drop foto ke sini, atau <span>pilih file</span></p>
      <p style="font-size:11px;margin-top:3px;color:#b0b8c9">JPG · PNG · WEBP — maks 5MB</p>
      <input type="file" id="fi" accept="image/*" onchange="onFile(event)"/>
      <img id="dzPrev" class="dz-preview"/>
    </div>
    <div class="form-row">
      <div class="fg"><label>Judul Foto *</label><input id="fJudul" type="text" placeholder="cth. Ibadah Minggu Pagi"/></div>
      <div class="fg"><label>Kategori</label>
        <select id="fKat">
          <option value="ibadah">Ibadah</option>
          <option value="doa">Doa & Pelayanan</option>
          <option value="pemuda">Pemuda & Anak</option>
          <option value="sosial">Sosial</option>
          <option value="lainnya">Lainnya</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="fg"><label>Tanggal</label><input id="fTgl" type="date"/></div>
      <div class="fg"><label>Ikon Placeholder</label><input id="fIkon" maxlength="4" type="text" placeholder="cth. ⛪"/></div>
    </div>
    <div class="fg"><label>Deskripsi</label><textarea id="fDesc" rows="2" placeholder="Keterangan singkat..."></textarea></div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal()">Batal</button>
      <button class="btn-save" onclick="save()">💾 Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
/* ── CONFIG ── */
const BG_MAP = { ibadah:'linear-gradient(135deg,#ddf1fa,#b3e0f5)', doa:'linear-gradient(135deg,#ede9fe,#d4c5fb)', pemuda:'linear-gradient(135deg,#fef3c7,#fde68a)', sosial:'linear-gradient(135deg,#d1fae5,#a7f3d0)', lainnya:'linear-gradient(135deg,#f3f4f6,#e5e7eb)' };
const CAT_L  = { ibadah:'Ibadah', doa:'Doa', pemuda:'Pemuda', sosial:'Sosial', lainnya:'Lainnya' };
const CAT_C  = { ibadah:'bci', doa:'bcd', pemuda:'bcp', sosial:'bcs', lainnya:'bcl' };
const H_POOL = [200,240,270,300,230,260,290,220,250,310]; // varied heights pool

/* ── DEFAULT DATA ── */
const DEF = [
  {id:1,judul:'Ibadah Minggu Pagi',             ikon:'🙏',kat:'ibadah', tgl:'2026-02-31',desc:'Kebersamaan jemaat dalam ibadah setiap hari Minggu pagi.',                   src:'',h:H_POOL[0]},
  {id:2,judul:'Divine Connection – Brings Great Joy to the World',ikon:'✨',kat:'ibadah',tgl:'2026-03-14',desc:'Momen kebangkitan iman jemaat GBI Tambunan untuk tahun 2026.',src:'',h:H_POOL[1]},
  {id:3,judul:'Perayaan Bersama Jemaat',         ikon:'🎉',kat:'ibadah', tgl:'2026-02-13',desc:'Sukacita kebersamaan jemaat dalam perayaan kasih Tuhan.',                    src:'',h:H_POOL[2]},
  {id:4,judul:'Doa Puasa & Menara Doa',          ikon:'🕯',kat:'doa',    tgl:'2026-02-12',desc:'Waktu khusus berdoa dan berpuasa bersama seluruh jemaat.',                   src:'',h:H_POOL[3]},
  {id:5,judul:'Koneksi Ilahi – Membawa Kesatuan',ikon:'🔗',kat:'doa',    tgl:'2026-02-10',desc:'Divine Connection brings unity – Yohanes 17:21, 1 Korintus 4:16.',          src:'',h:H_POOL[4]},
  {id:6,judul:'Youth Club – Persekutuan Pemuda', ikon:'⚡',kat:'pemuda', tgl:'2026-02-08',desc:'Persekutuan pemuda setiap Sabtu 7:00 WIB. Pangkatbon 11:9.',                src:'',h:H_POOL[5]},
];

function ls(k,d){try{const v=localStorage.getItem(k);return v?JSON.parse(v):null;}catch(e){return null;}}
function ss(k,v){localStorage.setItem(k,JSON.stringify(v));}
function esc(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}

let photos=ls('gbi_gal')||JSON.parse(JSON.stringify(DEF));
let nid=parseInt(localStorage.getItem('gbi_gal_n')||'7');
let curF='semua', editId=null, imgD=null, lbIdx=0;

/* ── RENDER ── */
function getList(){
  const q=(document.getElementById('qInput').value||'').toLowerCase();
  return photos.filter(p=>{
    const mc=curF==='semua'||p.kat===curF;
    const mq=!q||p.judul.toLowerCase().includes(q)||(p.desc||'').toLowerCase().includes(q);
    return mc&&mq;
  });
}

function render(){
  const list=getList();
  const grid=document.getElementById('grid');
  const emp =document.getElementById('empty');
  updateStats();
  if(!list.length){grid.innerHTML='';emp.style.display='block';return;}
  emp.style.display='none';
  grid.innerHTML=list.map((p,i)=>{
    const bg=BG_MAP[p.kat]||BG_MAP.lainnya;
    const ph=p.src?`<img src="${esc(p.src)}" style="width:100%;height:${p.h}px;object-fit:cover;display:block;"/>`
                  :`<div class="pcard-placeholder" style="height:${p.h}px;background:${bg}">${esc(p.ikon||'🖼')}</div>`;
    return `
    <div class="pcard" style="animation-delay:${i*.05}s" onclick="openLb(${p.id})">
      <div class="pcard-img">
        ${ph}
        ${p.tgl?`<div class="b-date">${p.tgl}</div>`:''}
        <div class="b-cat ${CAT_C[p.kat]||'bcl'}">${CAT_L[p.kat]||'Lainnya'}</div>
        <div class="pcard-actions" onclick="event.stopPropagation()">
          <button class="a-btn a-edit" onclick="openEdit(${p.id})">✏ Edit</button>
          <button class="a-btn a-del"  onclick="delPhoto(${p.id})">🗑 Hapus</button>
        </div>
      </div>
      <div class="pcard-body">
        <div class="pcard-title">${esc(p.judul)}</div>
        <div class="pcard-desc">${esc(p.desc)}</div>
      </div>
    </div>`;
  }).join('');
}

function updateStats(){
  document.getElementById('stTotal').textContent  = photos.length;
  document.getElementById('stIbadah').textContent = photos.filter(p=>p.kat==='ibadah').length;
  document.getElementById('stDoa').textContent    = photos.filter(p=>p.kat==='doa').length;
  document.getElementById('stPemuda').textContent = photos.filter(p=>p.kat==='pemuda').length;
}

function setF(f,btn){
  curF=f;
  document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  render();
}

/* ── LIGHTBOX ── */
function openLb(id){
  const list=getList();
  lbIdx=list.findIndex(p=>p.id===id);
  showLb(list[lbIdx]);
  document.getElementById('lb').classList.add('open');
}
function showLb(p){
  if(!p)return;
  const bg=BG_MAP[p.kat]||BG_MAP.lainnya;
  document.getElementById('lbMedia').innerHTML=p.src
    ?`<img src="${esc(p.src)}" alt="${esc(p.judul)}"/>`
    :`<div class="lb-ph" style="background:${bg};width:100%;display:flex;align-items:center;justify-content:center;font-size:90px;min-height:280px;">${esc(p.ikon||'🖼')}</div>`;
  document.getElementById('lbT').textContent=p.judul;
  document.getElementById('lbD').textContent=p.desc||'';
  const list=getList();
  document.getElementById('lbC').textContent=`${lbIdx+1} / ${list.length}`;
}
function navLb(d){const list=getList();lbIdx=(lbIdx+d+list.length)%list.length;showLb(list[lbIdx]);}
function closeLb(){document.getElementById('lb').classList.remove('open');}
document.addEventListener('keydown',e=>{
  if(!document.getElementById('lb').classList.contains('open'))return;
  if(e.key==='Escape')closeLb();
  if(e.key==='ArrowLeft')navLb(-1);
  if(e.key==='ArrowRight')navLb(1);
});

/* ── MODAL ── */
function resetDZ(){
  document.getElementById('dzPrev').style.display='none';
  document.getElementById('dzPrev').src='';
  document.getElementById('fi').value='';
  document.getElementById('dz').querySelector('.dz-icon').style.display='';
  document.querySelectorAll('#dz p').forEach(p=>p.style.display='');
}
function showPrev(src){
  const pr=document.getElementById('dzPrev');
  pr.src=src;pr.style.display='block';
  document.getElementById('dz').querySelector('.dz-icon').style.display='none';
  document.querySelectorAll('#dz p').forEach(p=>p.style.display='none');
}
function openModal(){
  editId=null;imgD=null;
  document.getElementById('mTitle').innerHTML='📷 <span>Upload Foto</span>';
  ['fJudul','fDesc','fIkon'].forEach(id=>document.getElementById(id).value='');
  document.getElementById('fKat').value='ibadah';
  document.getElementById('fTgl').value=new Date().toISOString().slice(0,10);
  resetDZ();
  document.getElementById('ov').classList.add('open');
}
function openEdit(id){
  const p=photos.find(x=>x.id===id);if(!p)return;
  editId=id;imgD=p.src||null;
  document.getElementById('mTitle').innerHTML='✏ <span>Edit Foto</span>';
  document.getElementById('fJudul').value=p.judul;
  document.getElementById('fDesc').value=p.desc||'';
  document.getElementById('fIkon').value=p.ikon||'';
  document.getElementById('fKat').value=p.kat||'ibadah';
  document.getElementById('fTgl').value=p.tgl||'';
  if(p.src)showPrev(p.src);else resetDZ();
  document.getElementById('ov').classList.add('open');
}
function closeModal(){document.getElementById('ov').classList.remove('open');editId=null;imgD=null;}
function onFile(e){
  const f=e.target.files[0];if(!f)return;
  if(f.size>5*1024*1024){toast('File terlalu besar! Maks. 5MB','err');return;}
  const r=new FileReader();
  r.onload=ev=>{imgD=ev.target.result;showPrev(imgD);};
  r.readAsDataURL(f);
}

/* drag-drop */
const dz=document.getElementById('dz');
dz.addEventListener('dragover',e=>{e.preventDefault();dz.classList.add('drag');});
dz.addEventListener('dragleave',()=>dz.classList.remove('drag'));
dz.addEventListener('drop',e=>{
  e.preventDefault();dz.classList.remove('drag');
  const f=e.dataTransfer.files[0];
  if(!f||!f.type.startsWith('image/'))return;
  const r=new FileReader();r.onload=ev=>{imgD=ev.target.result;showPrev(imgD);};r.readAsDataURL(f);
});

function save(){
  const judul=document.getElementById('fJudul').value.trim();
  const desc =document.getElementById('fDesc').value.trim();
  const ikon =document.getElementById('fIkon').value.trim()||'🖼';
  const kat  =document.getElementById('fKat').value;
  const tgl  =document.getElementById('fTgl').value;
  if(!judul){toast('Judul foto wajib diisi!','err');return;}
  const src=imgD||'';
  const h=H_POOL[nid%H_POOL.length];
  if(editId){
    const i=photos.findIndex(x=>x.id===editId);
    if(i>-1)photos[i]={...photos[i],judul,desc,ikon,kat,tgl,src};
    toast('Foto berhasil diperbarui ✓','ok');
  } else {
    photos.unshift({id:nid++,judul,desc,ikon,kat,tgl,src,h});
    localStorage.setItem('gbi_gal_n',nid);
    toast('Foto berhasil diunggah ✓','ok');
  }
  ss('gbi_gal',photos);render();closeModal();
}
function delPhoto(id){
  if(!confirm('Hapus foto ini?'))return;
  photos=photos.filter(x=>x.id!==id);
  ss('gbi_gal',photos);render();toast('Foto dihapus','err');
}

/* ── TOAST ── */
function toast(msg,type='ok'){
  const t=document.getElementById('toast');
  t.textContent=(type==='ok'?'✅ ':'🗑 ')+msg;
  t.className='toast '+type;t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),3000);
}

document.getElementById('ov').addEventListener('click',function(e){if(e.target===this)closeModal();});

render();
</script>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
  @csrf
</form>

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