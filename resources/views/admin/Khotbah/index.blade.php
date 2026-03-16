<?php
// resources/views/khotbah/index.php
// Untuk Laravel: rename ke index.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Khotbah – Admin GBI Tambunan</title>
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
    *{margin:0;padding:0;box-sizing:border-box;}
    body{background:var(--bg);font-family:'Nunito',sans-serif;color:var(--text);min-height:100vh;}

    /* ── TOPBAR ── */
    .topbar{position:fixed;top:0;left:0;right:0;z-index:200;height:56px;display:flex;align-items:center;justify-content:space-between;padding:0 20px 0 0;background:var(--white);border-bottom:1px solid var(--border);box-shadow:0 1px 8px rgba(0,0,0,.06);}
    .topbar-left{display:flex;align-items:center;width:240px;height:100%;flex-shrink:0;background:var(--sidebar);padding:0 18px;}
    .hamburger{background:none;border:none;color:rgba(255,255,255,.5);font-size:20px;cursor:pointer;margin-right:12px;transition:color .15s;}
    .hamburger:hover{color:#fff;}
    .brand{display:flex;align-items:center;gap:10px;text-decoration:none;}
    .brand-logo{width:32px;height:32px;background:linear-gradient(135deg,var(--cyan),var(--gold));border-radius:7px;display:flex;align-items:center;justify-content:center;font-family:'Rajdhani',sans-serif;font-weight:700;font-size:13px;color:#fff;flex-shrink:0;}
    .brand-name{font-family:'Rajdhani',sans-serif;font-size:16px;font-weight:700;color:#fff;}
    .brand-name span{color:var(--cyan);}
    .topbar-nav{display:flex;align-items:center;gap:2px;flex:1;padding:0 14px;}
    .topbar-nav a{color:var(--muted);font-size:13px;font-weight:600;text-decoration:none;padding:5px 12px;border-radius:6px;transition:all .15s;}
    .topbar-nav a:hover{color:var(--text);background:#f0f2f5;}
    .topbar-nav a.active{color:var(--cyan);background:var(--cyan-lt);}
    .topbar-right{display:flex;align-items:center;gap:12px;}
    .btn-viewsite{background:var(--cyan-lt);border:1px solid rgba(29,168,224,.3);color:var(--cyan);font-family:'Nunito',sans-serif;font-size:12px;font-weight:700;padding:5px 14px;border-radius:6px;cursor:pointer;transition:all .15s;}
    .btn-viewsite:hover{background:var(--cyan);color:#fff;}
    .avatar{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--gold),var(--cyan));display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#fff;cursor:pointer;}

    /* ── SIDEBAR ── */
    .sidebar{position:fixed;top:56px;left:0;bottom:0;width:240px;background:var(--sidebar);display:flex;flex-direction:column;overflow-y:auto;z-index:100;}
    .sidebar-user{display:flex;align-items:center;gap:12px;padding:18px 18px 14px;border-bottom:1px solid rgba(255,255,255,.07);}
    .sidebar-user .ava{width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--gold),var(--cyan));display:flex;align-items:center;justify-content:center;font-size:15px;font-weight:700;color:#fff;flex-shrink:0;}
    .sidebar-user .info strong{display:block;font-size:14px;font-weight:700;color:#fff;}
    .sidebar-user .info span{font-size:11px;color:var(--cyan);}
    .sidebar-search{display:flex;align-items:center;gap:8px;margin:12px 14px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:7px;padding:7px 12px;}
    .sidebar-search input{background:none;border:none;outline:none;color:#fff;font-family:'Nunito',sans-serif;font-size:13px;flex:1;}
    .sidebar-search input::placeholder{color:rgba(255,255,255,.3);}
    .nav-section{padding:10px 18px 4px;font-size:10px;font-weight:700;letter-spacing:1.4px;color:rgba(255,255,255,.25);text-transform:uppercase;}
    .sidebar nav a{display:flex;align-items:center;gap:10px;padding:9px 18px;font-size:13.5px;font-weight:600;color:rgba(255,255,255,.5);text-decoration:none;border-left:3px solid transparent;transition:all .15s;}
    .sidebar nav a:hover{color:#fff;background:rgba(255,255,255,.06);}
    .sidebar nav a.active{color:#fff;border-left-color:var(--cyan);background:rgba(29,168,224,.15);}
    .sidebar nav a .ico{font-size:15px;width:20px;text-align:center;}
    .sidebar-footer{margin-top:auto;padding:14px 18px;border-top:1px solid rgba(255,255,255,.07);font-size:11px;color:rgba(255,255,255,.3);}
    .sidebar-footer strong{color:rgba(255,255,255,.6);display:block;}

    /* ── LAYOUT ── */
    .wrapper{margin-left:240px;padding-top:56px;min-height:100vh;}
    .content-header{display:flex;align-items:center;justify-content:space-between;padding:20px 28px 0;}
    .content-header h1{font-family:'Rajdhani',sans-serif;font-size:22px;font-weight:700;}
    .breadcrumb{display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted);}
    .breadcrumb a{color:var(--cyan);text-decoration:none;}
    .content{padding:22px 28px 60px;}
    @keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}

    /* ── HERO ── */
    .page-hero{position:relative;overflow:hidden;border-radius:16px;margin-bottom:24px;background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0);padding:34px 40px;box-shadow:0 6px 24px rgba(29,168,224,.25);}
    .page-hero::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%),radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%);pointer-events:none;}
    .hero-tag{display:inline-block;background:rgba(255,255,255,.2);border:1px solid rgba(255,255,255,.35);color:#fff;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;padding:4px 12px;border-radius:20px;margin-bottom:10px;}
    .page-hero h2{font-family:'Rajdhani',sans-serif;font-size:26px;font-weight:700;color:#fff;margin-bottom:6px;}
    .page-hero p{color:rgba(255,255,255,.8);font-size:13.5px;max-width:520px;line-height:1.65;}
    .hero-actions{margin-top:18px;display:flex;gap:10px;flex-wrap:wrap;}
    .btn-hero-primary{background:#fff;color:var(--cyan);border:none;font-family:'Nunito',sans-serif;font-size:13px;font-weight:700;padding:9px 20px;border-radius:8px;cursor:pointer;transition:all .18s;box-shadow:0 3px 10px rgba(0,0,0,.1);}
    .btn-hero-primary:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(0,0,0,.15);}
    .btn-hero-outline{background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.4);font-family:'Nunito',sans-serif;font-size:13px;font-weight:700;padding:9px 20px;border-radius:8px;cursor:pointer;transition:all .18s;}
    .btn-hero-outline:hover{background:rgba(255,255,255,.25);}

    /* ── STATS ── */
    .stats-row{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:22px;}
    .stat-card{background:var(--white);border:1px solid var(--border);border-radius:11px;padding:16px 18px;display:flex;align-items:center;gap:14px;box-shadow:0 1px 4px rgba(0,0,0,.04);animation:fadeUp .35s ease both;}
    .stat-card:nth-child(1){animation-delay:.05s}.stat-card:nth-child(2){animation-delay:.10s}.stat-card:nth-child(3){animation-delay:.15s}.stat-card:nth-child(4){animation-delay:.20s}
    .stat-icon{width:40px;height:40px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:18px;}
    .ic{background:var(--cyan-lt)}.ig{background:var(--gold-lt)}.is{background:var(--success-lt)}.ip{background:var(--purple-lt)}
    .stat-val{font-family:'Rajdhani',sans-serif;font-size:22px;font-weight:700;line-height:1;}
    .vc{color:var(--cyan)}.vg{color:var(--gold)}.vs{color:var(--success)}.vp{color:var(--purple)}
    .stat-lbl{font-size:11.5px;color:var(--muted);margin-top:3px;}

    /* ── TOOLBAR ── */
    .toolbar{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:20px;flex-wrap:wrap;}
    .toolbar-left{display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
    .search-wrap{display:flex;align-items:center;background:var(--white);border:1px solid var(--border);border-radius:9px;overflow:hidden;box-shadow:0 1px 4px rgba(0,0,0,.04);}
    .search-wrap input{background:none;border:none;outline:none;color:var(--text);font-family:'Nunito',sans-serif;font-size:13px;padding:9px 14px;width:220px;}
    .search-wrap input::placeholder{color:#b0b8c9;}
    .search-wrap button{background:var(--cyan);border:none;color:#fff;padding:9px 14px;cursor:pointer;font-size:14px;transition:background .15s;}
    .search-wrap button:hover{background:var(--cyan-dk);}
    .filter-tabs{display:flex;gap:5px;}
    .tab-btn{background:var(--white);border:1px solid var(--border);color:var(--muted);font-family:'Nunito',sans-serif;font-size:12px;font-weight:700;padding:7px 14px;border-radius:7px;cursor:pointer;transition:all .15s;box-shadow:0 1px 3px rgba(0,0,0,.04);}
    .tab-btn:hover{border-color:var(--cyan);color:var(--cyan);background:var(--cyan-lt);}
    .tab-btn.active{background:var(--cyan-lt);border-color:rgba(29,168,224,.4);color:var(--cyan);}
    .add-btn{display:inline-flex;align-items:center;gap:7px;background:linear-gradient(135deg,var(--cyan),var(--cyan-dk));color:#fff;border:none;font-family:'Nunito',sans-serif;font-size:12.5px;font-weight:700;padding:9px 18px;border-radius:7px;cursor:pointer;transition:all .2s;box-shadow:0 3px 10px rgba(29,168,224,.25);white-space:nowrap;}
    .add-btn:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(29,168,224,.35);}

    /* ── KHOTBAH GRID ── */
    .khotbah-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}

    /* ── KHOTBAH CARD ── */
    .kcard{
      background:var(--white);border:1px solid var(--border);border-radius:14px;
      overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.05);
      transition:transform .22s,box-shadow .22s;
      animation:fadeUp .4s ease both;
      position:relative;
    }
    .kcard:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(0,0,0,.10);}

    /* Thumbnail area – cyan gradient like screenshot */
    .kcard-thumb{
      position:relative;width:100%;height:170px;
      background:linear-gradient(135deg,#1a7fc1,#1da8e0,#29c4f0);
      display:flex;flex-direction:column;align-items:center;justify-content:center;
      cursor:pointer;overflow:hidden;
    }
    .kcard-thumb::before{
      content:'';position:absolute;inset:0;
      background:radial-gradient(ellipse 60% 60% at 50% 50%,rgba(255,255,255,.08) 0%,transparent 70%);
    }
    .play-ring{
      width:58px;height:58px;border-radius:50%;
      border:2.5px solid rgba(255,255,255,.85);
      display:flex;align-items:center;justify-content:center;
      transition:all .2s;background:rgba(255,255,255,.12);
      backdrop-filter:blur(4px);
    }
    .kcard:hover .play-ring{background:rgba(255,255,255,.22);transform:scale(1.08);}
    .play-icon{
      width:0;height:0;
      border-top:12px solid transparent;
      border-bottom:12px solid transparent;
      border-left:20px solid rgba(255,255,255,.92);
      margin-left:4px;
    }
    .thumb-label{color:rgba(255,255,255,.8);font-size:11.5px;font-weight:600;margin-top:12px;letter-spacing:.3px;}
    .thumb-badge{
      position:absolute;top:10px;right:10px;
      font-size:10px;font-weight:700;padding:3px 10px;border-radius:20px;letter-spacing:.3px;
    }
    .tb-new{background:rgba(255,255,255,.25);color:#fff;border:1px solid rgba(255,255,255,.4);}
    .tb-series{background:var(--gold-lt);color:var(--gold);border:1px solid rgba(200,155,60,.35);}
    .tb-special{background:var(--purple-lt);color:var(--purple);border:1px solid rgba(139,92,246,.3);}
    .duration-badge{
      position:absolute;bottom:10px;right:10px;
      background:rgba(15,22,40,.7);backdrop-filter:blur(4px);
      color:#fff;font-size:10px;font-weight:700;padding:3px 8px;border-radius:5px;
    }

    /* Card body */
    .kcard-body{padding:14px 16px 16px;}
    .kcard-meta{display:flex;align-items:center;gap:8px;margin-bottom:7px;flex-wrap:wrap;}
    .meta-tag{font-size:10px;font-weight:700;padding:2px 9px;border-radius:4px;text-transform:uppercase;letter-spacing:.5px;}
    .mt-kotbah{background:var(--cyan-lt);color:var(--cyan);}
    .mt-renungan{background:var(--gold-lt);color:var(--gold);}
    .mt-kesaksian{background:var(--success-lt);color:var(--success);}
    .mt-doa{background:var(--purple-lt);color:var(--purple);}
    .kcard-title{font-family:'Rajdhani',sans-serif;font-size:16px;font-weight:700;color:var(--text);margin-bottom:5px;line-height:1.3;}
    .kcard-speaker{font-size:12.5px;color:var(--muted);margin-bottom:8px;display:flex;align-items:center;gap:5px;}
    .kcard-speaker span{color:var(--text);font-weight:600;}
    .kcard-date{font-size:11.5px;color:var(--muted);}
    .kcard-desc{font-size:12px;color:var(--muted);line-height:1.6;margin:8px 0;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}

    /* Action row */
    .kcard-actions{display:flex;align-items:center;gap:7px;margin-top:10px;padding-top:10px;border-top:1px solid var(--border);}
    .act-btn{border:none;border-radius:6px;cursor:pointer;font-family:'Nunito',sans-serif;font-size:11.5px;font-weight:700;padding:6px 13px;transition:all .15s;display:flex;align-items:center;gap:5px;}
    .btn-edit{background:var(--cyan-lt);color:var(--cyan);border:1px solid rgba(29,168,224,.25);}
    .btn-edit:hover{background:var(--cyan);color:#fff;}
    .btn-del{background:var(--danger-lt);color:var(--danger);border:1px solid rgba(224,85,85,.2);}
    .btn-del:hover{background:var(--danger);color:#fff;}
    .btn-view{background:var(--bg);color:var(--muted);border:1px solid var(--border);margin-left:auto;}
    .btn-view:hover{background:var(--border);color:var(--text);}

    /* ── EMPTY ── */
    .empty-state{text-align:center;padding:70px 20px;color:var(--muted);background:var(--white);border:1px dashed var(--border);border-radius:14px;display:none;}
    .empty-state .e-ico{font-size:52px;opacity:.3;margin-bottom:14px;}

    /* ── MODAL ── */
    .overlay{display:none;position:fixed;inset:0;z-index:300;background:rgba(26,34,51,.45);backdrop-filter:blur(4px);align-items:center;justify-content:center;}
    .overlay.open{display:flex;}
    .modal{background:var(--white);border:1px solid var(--border);border-radius:14px;padding:28px;width:560px;max-width:94vw;box-shadow:0 20px 60px rgba(0,0,0,.15);animation:mIn .22s ease;max-height:92vh;overflow-y:auto;}
    @keyframes mIn{from{opacity:0;transform:translateY(12px) scale(.97)}to{opacity:1;transform:translateY(0) scale(1)}}
    .modal-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
    .modal-head h3{font-family:'Rajdhani',sans-serif;font-size:19px;font-weight:700;color:var(--text);}
    .modal-head h3 span{color:var(--cyan);}
    .close-btn{background:#f0f2f5;border:none;color:var(--muted);width:30px;height:30px;border-radius:7px;cursor:pointer;font-size:15px;display:flex;align-items:center;justify-content:center;transition:all .14s;flex-shrink:0;}
    .close-btn:hover{background:var(--danger);color:#fff;}
    .fg{display:flex;flex-direction:column;gap:5px;margin-bottom:13px;}
    .fg label{font-size:10.5px;font-weight:700;letter-spacing:.8px;text-transform:uppercase;color:var(--muted);}
    .fg input,.fg textarea,.fg select{background:var(--bg);border:1px solid var(--border);color:var(--text);font-family:'Nunito',sans-serif;font-size:13px;padding:9px 13px;border-radius:7px;outline:none;transition:all .15s;resize:none;}
    .fg input:focus,.fg textarea:focus,.fg select:focus{border-color:var(--cyan);background:#fff;box-shadow:0 0 0 3px rgba(29,168,224,.08);}
    .fg input::placeholder,.fg textarea::placeholder{color:#b0b8c9;}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:13px;}
    .form-row3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:13px;}
    .modal-foot{display:flex;justify-content:flex-end;gap:10px;margin-top:6px;}
    .btn-cancel{background:#f0f2f5;border:1px solid var(--border);color:var(--muted);font-family:'Nunito',sans-serif;font-size:13px;font-weight:600;padding:9px 18px;border-radius:7px;cursor:pointer;}
    .btn-cancel:hover{color:var(--text);background:var(--border);}
    .btn-save{background:linear-gradient(135deg,var(--cyan),var(--cyan-dk));border:none;color:#fff;font-family:'Nunito',sans-serif;font-size:13px;font-weight:700;padding:9px 22px;border-radius:7px;cursor:pointer;transition:all .18s;box-shadow:0 3px 10px rgba(29,168,224,.25);}
    .btn-save:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(29,168,224,.35);}

    /* Video preview in modal */
    .url-preview{display:flex;align-items:center;gap:8px;background:var(--bg);border:1px solid var(--border);border-radius:7px;padding:9px 13px;margin-top:6px;}
    .url-preview .prev-thumb{width:48px;height:34px;border-radius:5px;background:linear-gradient(135deg,var(--cyan-dk),var(--cyan));display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;}
    .url-preview .prev-info{font-size:12px;color:var(--muted);}
    .url-preview .prev-info strong{display:block;font-size:12.5px;color:var(--text);}

    /* ── TOAST ── */
    .toast{position:fixed;bottom:24px;right:24px;z-index:600;background:var(--white);border:1px solid var(--border);border-radius:10px;padding:13px 20px;display:flex;align-items:center;gap:10px;font-size:13px;font-weight:600;color:var(--text);box-shadow:0 8px 32px rgba(0,0,0,.12);transform:translateY(16px);opacity:0;transition:all .28s ease;pointer-events:none;}
    .toast.show{transform:translateY(0);opacity:1;}
    .toast.ok{border-left:3px solid var(--success);}
    .toast.err{border-left:3px solid var(--danger);}

    ::-webkit-scrollbar{width:5px;}::-webkit-scrollbar-track{background:var(--bg);}::-webkit-scrollbar-thumb{background:var(--border2);border-radius:3px;}

    @media(max-width:1100px){.khotbah-grid{grid-template-columns:repeat(2,1fr);}}
    @media(max-width:900px){.sidebar{display:none;}.wrapper{margin-left:0;}.khotbah-grid{grid-template-columns:1fr;}.stats-row{grid-template-columns:1fr 1fr;}}

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
    <a href="{{ route('khotbah.index') }}" class="active">Khotbah</a>
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
  <div class="sidebar-search"><span style="color:rgba(255,255,255,.4)">🔍</span><input type="text" placeholder="Search..."/></div>
  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}"><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}"><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}" class="active"><span class="ico">🎙</span> Khotbah</a>
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
    <h1>Khotbah</h1>
    <div class="breadcrumb"><a href="#">Home</a> / <span>Khotbah</span></div>
  </div>
  <div class="content">

    <!-- HERO -->
    <div class="page-hero">
      <div class="hero-tag">🎙 Khotbah</div>
      <h2>Kelola Video Khotbah</h2>
      <p>Tambah, edit, dan kelola video khotbah, renungan, dan kesaksian jemaat GBI Tambunan.</p>
      <div class="hero-actions">
        <button class="btn-hero-primary" onclick="openAdd()">＋ Tambah Khotbah</button>
        <button class="btn-hero-outline">🔗 Sinkron YouTube</button>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon ic">🎙</div><div><div class="stat-val vc" id="stTotal">0</div><div class="stat-lbl">Total Khotbah</div></div></div>
      <div class="stat-card"><div class="stat-icon ig">📅</div><div><div class="stat-val vg" id="stBulan">0</div><div class="stat-lbl">Bulan Ini</div></div></div>
      <div class="stat-card"><div class="stat-icon is">🎥</div><div><div class="stat-val vs" id="stVideo">0</div><div class="stat-lbl">Ada Video URL</div></div></div>
      <div class="stat-card"><div class="stat-icon ip">📖</div><div><div class="stat-val vp" id="stSeries">0</div><div class="stat-lbl">Seri Khotbah</div></div></div>
    </div>

    <!-- TOOLBAR -->
    <div class="toolbar">
      <div class="toolbar-left">
        <div class="search-wrap">
          <input type="text" id="searchInput" placeholder="Cari judul / pembicara..." oninput="render()"/>
          <button>🔍</button>
        </div>
        <div class="filter-tabs">
          <button class="tab-btn active" onclick="setF('semua',this)">Semua</button>
          <button class="tab-btn" onclick="setF('khotbah',this)">Khotbah</button>
          <button class="tab-btn" onclick="setF('renungan',this)">Renungan</button>
          <button class="tab-btn" onclick="setF('kesaksian',this)">Kesaksian</button>
          <button class="tab-btn" onclick="setF('doa',this)">Doa</button>
        </div>
      </div>
      <button class="add-btn" onclick="openAdd()">＋ Tambah Khotbah</button>
    </div>

    <!-- GRID -->
    <div class="khotbah-grid" id="kGrid"></div>
    <div class="empty-state" id="emptyState">
      <div class="e-ico">🎙</div>
      <p>Tidak ada khotbah ditemukan.</p>
    </div>

  </div>
</div>

<!-- MODAL -->
<div class="overlay" id="modalOv">
  <div class="modal">
    <div class="modal-head">
      <h3 id="modalTitle">＋ <span>Tambah Khotbah</span></h3>
      <button class="close-btn" onclick="closeModal()">✕</button>
    </div>

    <div class="fg"><label>Judul Khotbah *</label><input id="fJudul" type="text" placeholder="cth. Iman dalam Cobaan"/></div>
    <div class="form-row">
      <div class="fg"><label>Nama Pembicara *</label><input id="fSpeaker" type="text" placeholder="cth. Pdm. Roberto Sibarani"/></div>
      <div class="fg"><label>Tipe Konten</label>
        <select id="fTipe">
          <option value="khotbah">Khotbah</option>
          <option value="renungan">Renungan</option>
          <option value="kesaksian">Kesaksian</option>
          <option value="doa">Doa</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="fg"><label>Tanggal</label><input id="fTgl" type="date"/></div>
      <div class="fg"><label>Durasi</label><input id="fDurasi" type="text" placeholder="cth. 45:30"/></div>
    </div>
    <div class="form-row">
      <div class="fg"><label>Seri Khotbah</label><input id="fSeri" type="text" placeholder="cth. Seri Iman (kosongkan jika tidak ada)"/></div>
      <div class="fg"><label>Badge</label>
        <select id="fBadge">
          <option value="">— Tidak ada —</option>
          <option value="new">🔴 Terbaru</option>
          <option value="series">📚 Seri</option>
          <option value="special">✨ Spesial</option>
        </select>
      </div>
    </div>
    <div class="fg"><label>URL Video (YouTube / Google Drive)</label>
      <input id="fUrl" type="url" placeholder="https://youtube.com/watch?v=..." oninput="previewUrl()"/>
      <div class="url-preview" id="urlPreview" style="display:none">
        <div class="prev-thumb">▶</div>
        <div class="prev-info"><strong id="pvTitle">Video terdeteksi</strong><span id="pvSrc"></span></div>
      </div>
    </div>
    <div class="fg"><label>Deskripsi / Sinopsis</label><textarea id="fDesc" rows="3" placeholder="Ringkasan singkat isi khotbah..."></textarea></div>
    <div class="fg"><label>Ayat Alkitab</label><input id="fAyat" type="text" placeholder="cth. Yakobus 1:2-4"/></div>

    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeModal()">Batal</button>
      <button class="btn-save" onclick="saveKhotbah()">💾 Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
const KS='gbi_khotbah_v1', KN='gbi_khotbah_nid';

const TIPE_C = {khotbah:'mt-kotbah',renungan:'mt-renungan',kesaksian:'mt-kesaksian',doa:'mt-doa'};
const TIPE_L = {khotbah:'Khotbah',renungan:'Renungan',kesaksian:'Kesaksian',doa:'Doa'};
const BADGE_C = {new:'tb-new',series:'tb-series',special:'tb-special'};
const BADGE_L = {new:'Terbaru',series:'Seri',special:'Spesial'};

/* Thumb gradient variants to add visual variety */
const THUMB_COLORS = [
  'linear-gradient(135deg,#1565c0,#1da8e0,#29c4f0)',
  'linear-gradient(135deg,#0d85b5,#1da8e0,#38d0f5)',
  'linear-gradient(135deg,#1a5fa8,#2196f3,#21cbf3)',
  'linear-gradient(135deg,#0d47a1,#1976d2,#29c4f0)',
  'linear-gradient(135deg,#01579b,#0288d1,#1da8e0)',
  'linear-gradient(135deg,#1565c0,#1e88e5,#42a5f5)',
];

const DEFAULTS = [
  {id:1,judul:'Iman dalam Cobaan',    speaker:'Pdm. Roberto Sibarani',tipe:'khotbah', tgl:'2025-01-05',durasi:'52:14',seri:'Seri Iman',     badge:'new',    url:'',desc:'Bagaimana iman kita tetap kokoh ketika menghadapi berbagai cobaan hidup.',ayat:'Yakobus 1:2-4'},
  {id:2,judul:'Kasih Kristus yang Sempurna',speaker:'Pdt. Samuel Manurung',tipe:'khotbah',tgl:'2024-12-26',durasi:'48:30',seri:'',          badge:'',       url:'',desc:'Memahami kasih Kristus yang tidak terbatas dan sempurna bagi setiap jiwa.',ayat:'Yohanes 3:16'},
  {id:3,judul:'Hidup yang Berbuah',   speaker:'Pdm. Roberto Sibarani',tipe:'khotbah', tgl:'2024-12-19',durasi:'44:00',seri:'Seri Buah Roh',badge:'series',  url:'',desc:'Menjadi murid Kristus yang menghasilkan buah kehidupan yang nyata.',ayat:'Yohanes 15:5'},
  {id:4,judul:'Ketaatan kepada Firman',speaker:'Pdt. Samuel Manurung',tipe:'khotbah', tgl:'2024-12-12',durasi:'55:20',seri:'',              badge:'',       url:'',desc:'Ketaatan bukan sekadar kewajiban, tetapi ekspresi cinta kepada Tuhan.',ayat:'Matius 7:24-25'},
  {id:5,judul:'Kuasa Doa',            speaker:'Pdm. Roberto Sibarani',tipe:'doa',     tgl:'2024-12-06',durasi:'38:45',seri:'',              badge:'',       url:'',desc:'Doa adalah senjata rohani paling ampuh yang Tuhan berikan kepada kita.',ayat:'Filipi 4:6-7'},
  {id:6,judul:'Pertumbuhan Rohani',   speaker:'Pdt. Samuel Manurung',tipe:'renungan', tgl:'2024-11-29',durasi:'30:10',seri:'',              badge:'special',url:'',desc:'Bagaimana kita bertumbuh secara rohani melalui Firman dan doa setiap hari.',ayat:'2 Petrus 3:18'},
];

function ls(k){try{const v=localStorage.getItem(k);return v?JSON.parse(v):null;}catch(e){return null;}}
function ss(k,v){localStorage.setItem(k,JSON.stringify(v));}
function esc(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}

let items = ls(KS) || JSON.parse(JSON.stringify(DEFAULTS));
let nid   = parseInt(localStorage.getItem(KN)||'7');
let curF  = 'semua', editId = null;

const now = new Date();
const thisMonth = `${now.getFullYear()}-${String(now.getMonth()+1).padStart(2,'0')}`;

/* ── RENDER ── */
function getList(){
  const q=(document.getElementById('searchInput').value||'').toLowerCase();
  return items.filter(i=>{
    const mf=curF==='semua'||i.tipe===curF;
    const mq=!q||i.judul.toLowerCase().includes(q)||(i.speaker||'').toLowerCase().includes(q)||(i.seri||'').toLowerCase().includes(q);
    return mf&&mq;
  });
}

function render(){
  const list=getList();
  const grid=document.getElementById('kGrid');
  const empty=document.getElementById('emptyState');
  updateStats();
  if(!list.length){grid.innerHTML='';empty.style.display='block';return;}
  empty.style.display='none';

  grid.innerHTML=list.map((item,i)=>{
    const tipeC=TIPE_C[item.tipe]||'mt-kotbah';
    const tipeL=TIPE_L[item.tipe]||'Khotbah';
    const badgeHtml=item.badge?`<div class="thumb-badge ${BADGE_C[item.badge]||''}">${BADGE_L[item.badge]||''}</div>`:'';
    const durHtml=item.durasi?`<div class="duration-badge">▶ ${esc(item.durasi)}</div>`:'';
    const ayatHtml=item.ayat?`<div style="font-size:11.5px;color:var(--cyan);margin-bottom:6px;font-weight:700">📖 ${esc(item.ayat)}</div>`:'';
    const seriHtml=item.seri?`<div style="font-size:11px;color:var(--muted);margin-bottom:4px;">📚 ${esc(item.seri)}</div>`:'';
    const bg=THUMB_COLORS[item.id%THUMB_COLORS.length];
    const urlHtml=item.url
      ?`<a class="act-btn btn-view" href="${esc(item.url)}" target="_blank">▶ Tonton</a>`
      :`<button class="act-btn btn-view" disabled style="opacity:.5;cursor:default;">Belum ada URL</button>`;

    return `
    <div class="kcard" style="animation-delay:${(i%6)*.06}s">
      <div class="kcard-thumb" style="background:${bg}" onclick="${item.url?`window.open('${esc(item.url)}','_blank')`:''}" title="${item.url?'Tonton video':'Belum ada URL video'}">
        <div class="play-ring"><div class="play-icon"></div></div>
        <div class="thumb-label">Video Khotbah</div>
        ${badgeHtml}
        ${durHtml}
      </div>
      <div class="kcard-body">
        <div class="kcard-meta">
          <span class="meta-tag ${tipeC}">${tipeL}</span>
        </div>
        ${seriHtml}
        <div class="kcard-title">${esc(item.judul)}</div>
        <div class="kcard-speaker">👤 <span>${esc(item.speaker)}</span></div>
        ${ayatHtml}
        <div class="kcard-date">📅 ${esc(item.tgl)}</div>
        <div class="kcard-desc">${esc(item.desc)}</div>
        <div class="kcard-actions">
          <button class="act-btn btn-edit" onclick="openEdit(${item.id})">✏ Edit</button>
          <button class="act-btn btn-del"  onclick="delItem(${item.id})">🗑 Hapus</button>
          ${urlHtml}
        </div>
      </div>
    </div>`;
  }).join('');
}

function updateStats(){
  document.getElementById('stTotal').textContent  = items.length;
  document.getElementById('stBulan').textContent  = items.filter(i=>i.tgl&&i.tgl.startsWith(thisMonth)).length;
  document.getElementById('stVideo').textContent  = items.filter(i=>i.url&&i.url.trim()).length;
  document.getElementById('stSeries').textContent = items.filter(i=>i.seri&&i.seri.trim()).length;
}

function setF(f,btn){
  curF=f;
  document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  render();
}

/* ── MODAL ── */
function clearForm(){
  ['fJudul','fSpeaker','fSeri','fUrl','fDesc','fAyat','fDurasi'].forEach(id=>document.getElementById(id).value='');
  document.getElementById('fTipe').value='khotbah';
  document.getElementById('fBadge').value='';
  document.getElementById('fTgl').value=new Date().toISOString().slice(0,10);
  document.getElementById('urlPreview').style.display='none';
}
function openAdd(){
  editId=null;
  document.getElementById('modalTitle').innerHTML='＋ <span>Tambah Khotbah</span>';
  clearForm();
  document.getElementById('modalOv').classList.add('open');
}
function openEdit(id){
  const item=items.find(x=>x.id===id);if(!item)return;
  editId=id;
  document.getElementById('modalTitle').innerHTML='✏ <span>Edit Khotbah</span>';
  document.getElementById('fJudul').value   =item.judul;
  document.getElementById('fSpeaker').value =item.speaker;
  document.getElementById('fTipe').value    =item.tipe;
  document.getElementById('fTgl').value     =item.tgl;
  document.getElementById('fDurasi').value  =item.durasi||'';
  document.getElementById('fSeri').value    =item.seri||'';
  document.getElementById('fBadge').value   =item.badge||'';
  document.getElementById('fUrl').value     =item.url||'';
  document.getElementById('fDesc').value    =item.desc||'';
  document.getElementById('fAyat').value    =item.ayat||'';
  previewUrl();
  document.getElementById('modalOv').classList.add('open');
}
function closeModal(){document.getElementById('modalOv').classList.remove('open');editId=null;}

function previewUrl(){
  const url=document.getElementById('fUrl').value.trim();
  const pv=document.getElementById('urlPreview');
  if(!url){pv.style.display='none';return;}
  let src='URL Video';
  if(url.includes('youtube.com')||url.includes('youtu.be')) src='YouTube';
  else if(url.includes('drive.google.com')) src='Google Drive';
  document.getElementById('pvTitle').textContent='Video terdeteksi ✓';
  document.getElementById('pvSrc').textContent=src+' – '+url.slice(0,40)+'...';
  pv.style.display='flex';
}

function saveKhotbah(){
  const judul  =document.getElementById('fJudul').value.trim();
  const speaker=document.getElementById('fSpeaker').value.trim();
  if(!judul){toast('Judul khotbah wajib diisi!','err');return;}
  if(!speaker){toast('Nama pembicara wajib diisi!','err');return;}
  const obj={
    judul, speaker,
    tipe  :document.getElementById('fTipe').value,
    tgl   :document.getElementById('fTgl').value,
    durasi:document.getElementById('fDurasi').value.trim(),
    seri  :document.getElementById('fSeri').value.trim(),
    badge :document.getElementById('fBadge').value,
    url   :document.getElementById('fUrl').value.trim(),
    desc  :document.getElementById('fDesc').value.trim(),
    ayat  :document.getElementById('fAyat').value.trim(),
  };
  if(editId){
    const i=items.findIndex(x=>x.id===editId);
    if(i>-1) items[i]={id:editId,...obj};
    toast('Khotbah berhasil diperbarui ✓','ok');
  } else {
    items.unshift({id:nid++,...obj});
    localStorage.setItem(KN,nid);
    toast('Khotbah berhasil ditambahkan ✓','ok');
  }
  ss(KS,items);render();closeModal();
}

function delItem(id){
  if(!confirm('Hapus khotbah ini?'))return;
  items=items.filter(x=>x.id!==id);
  ss(KS,items);render();toast('Khotbah dihapus','err');
}

/* ── TOAST ── */
function toast(msg,type='ok'){
  const t=document.getElementById('toast');
  t.textContent=(type==='ok'?'✅ ':'🗑 ')+msg;
  t.className='toast '+type;t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),3000);
}
document.getElementById('modalOv').addEventListener('click',function(e){if(e.target===this)closeModal();});

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