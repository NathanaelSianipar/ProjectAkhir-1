<?php
// resources/views/welcome.php
// Untuk Laravel: rename ke welcome.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard – Gereja GBI Tambunan</title>
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
      --gold2:     #e8a000;
      --gold-lt:   #fdf6e3;
      --danger:    #e05555;
      --danger-lt: #fdf0f0;
      --success:   #2ea86a;
      --success-lt:#e8f7ef;
      --sidebar:   #1e2430;
      --sidebar2:  #252e3e;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: var(--bg); font-family: 'Nunito', sans-serif; color: var(--text); min-height: 100vh; overflow-x: hidden; }

    /* ── TOP BAR ── */
    .topbar { position: fixed; top: 0; left: 0; right: 0; z-index: 100; display: flex; align-items: center; justify-content: space-between; height: 60px; padding: 0 24px 0 0; background: var(--white); border-bottom: 1px solid var(--border); box-shadow: 0 1px 8px rgba(0,0,0,.06); }
    .topbar-brand { display: flex; align-items: center; width: 220px; height: 100%; flex-shrink: 0; background: var(--sidebar); padding: 0 20px; gap: 10px; }
    .topbar-logo { width: 34px; height: 34px; background: linear-gradient(135deg, var(--cyan), var(--gold)); border-radius: 8px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-family: 'Rajdhani', sans-serif; font-weight: 700; font-size: 14px; color: #fff; }
    .topbar-brand h1 { font-family: 'Rajdhani', sans-serif; font-size: 16px; font-weight: 700; color: #fff; letter-spacing: .4px; }
    .topbar-brand h1 .c { color: var(--cyan); }
    .topbar-brand h1 .g { color: var(--gold); font-size: 11px; font-weight: 600; }
    .topbar-nav { display: flex; gap: 2px; flex: 1; padding: 0 16px; }
    .topbar-nav a { color: var(--muted); font-size: 13px; font-weight: 600; text-decoration: none; padding: 6px 12px; border-radius: 6px; transition: all .15s; }
    .topbar-nav a:hover { color: var(--text); background: #f0f2f5; }
    .topbar-nav a.active { color: var(--cyan); background: var(--cyan-lt); }
    .topbar-right { display: flex; align-items: center; gap: 14px; }
    .view-site-btn { background: var(--cyan-lt); border: 1px solid rgba(29,168,224,.3); color: var(--cyan); font-family: 'Nunito', sans-serif; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 6px; cursor: pointer; transition: all .2s; }
    .view-site-btn:hover { background: var(--cyan); color: #fff; }

    /* ── TOPBAR BADGE (avatar — sync dari profil) ── */
    .topbar-badge {
      width: 34px; height: 34px; border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), var(--cyan));
      display: flex; align-items: center; justify-content: center;
      font-family: 'Rajdhani', sans-serif; font-size: 13px; font-weight: 700; color: #fff;
      cursor: pointer; overflow: hidden; text-decoration: none;
      border: 2px solid rgba(29,168,224,.25); flex-shrink: 0;
      transition: box-shadow .15s;
    }
    .topbar-badge:hover { box-shadow: 0 0 0 3px rgba(29,168,224,.2); }
    .topbar-badge img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }

    /* ── LAYOUT ── */
    .layout { display: flex; padding-top: 60px; }

    /* ── SIDEBAR ── */
    .sidebar { position: fixed; top: 60px; left: 0; bottom: 0; width: 220px; background: var(--sidebar); padding: 20px 0; display: flex; flex-direction: column; overflow-y: auto; }
    .sidebar-section { padding: 0 16px 6px; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; color: rgba(255,255,255,.25); text-transform: uppercase; margin-top: 10px; }
    .sidebar a { display: flex; align-items: center; gap: 10px; padding: 10px 20px; font-size: 13.5px; font-weight: 600; color: rgba(255,255,255,.5); text-decoration: none; transition: all .18s; border-left: 3px solid transparent; }
    .sidebar a:hover { color: #fff; background: rgba(255,255,255,.06); }
    .sidebar a.active { color: #fff; border-left-color: var(--cyan); background: rgba(29,168,224,.15); }
    .sidebar a .icon { font-size: 15px; width: 20px; text-align: center; }

    /* ── SIDEBAR FOOTER — sync dari profil ── */
    .sidebar-footer { margin-top: auto; padding: 14px 20px; border-top: 1px solid rgba(255,255,255,.07); display: flex; align-items: center; gap: 10px; }
    .sf-ava { width: 36px; height: 36px; border-radius: 50%; flex-shrink: 0; background: linear-gradient(135deg, var(--gold), var(--cyan)); display: flex; align-items: center; justify-content: center; font-family: 'Rajdhani', sans-serif; font-size: 13px; font-weight: 700; color: #fff; overflow: hidden; }
    .sf-ava img { width: 100%; height: 100%; object-fit: cover; }
    .sf-info { min-width: 0; }
    .sf-name { font-size: 13px; font-weight: 700; color: rgba(255,255,255,.85); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .sf-role { font-size: 11px; color: var(--cyan); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .sf-meta { font-size: 10px; color: rgba(255,255,255,.25); margin-top: 2px; }

    /* ── MAIN ── */
    .main { margin-left: 220px; padding: 32px 32px 60px; min-height: calc(100vh - 60px); flex: 1; }

    /* ── WELCOME HERO ── */
    .welcome-hero { position: relative; border-radius: 16px; overflow: hidden; padding: 36px 40px; margin-bottom: 32px; background: linear-gradient(135deg, var(--cyan-dk) 0%, var(--cyan) 60%, #29c4f0 100%); box-shadow: 0 6px 24px rgba(29,168,224,.25); }
    .welcome-hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 55% 80% at 95% 50%, rgba(255,255,255,.12) 0%, transparent 65%), radial-gradient(ellipse 35% 60% at 5% 85%, rgba(200,155,60,.18) 0%, transparent 55%); pointer-events: none; }
    .hero-tag { display: inline-block; background: rgba(255,255,255,.2); border: 1px solid rgba(255,255,255,.35); color: #fff; font-size: 11px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; padding: 4px 12px; border-radius: 20px; margin-bottom: 14px; }
    .welcome-hero h2 { font-family: 'Rajdhani', sans-serif; font-size: 30px; font-weight: 700; line-height: 1.15; margin-bottom: 10px; color: #fff; }
    .hero-admin-name { color: var(--gold-lt); }
    .welcome-hero p { color: rgba(255,255,255,.8); font-size: 14px; max-width: 480px; line-height: 1.65; }
    .hero-stats { position: absolute; right: 40px; top: 50%; transform: translateY(-50%); display: flex; gap: 28px; }
    .stat-item { text-align: center; }
    .stat-num { font-family: 'Rajdhani', sans-serif; font-size: 30px; font-weight: 700; line-height: 1; color: #fff; }
    .stat-num.g { color: var(--gold-lt); }
    .stat-num.w { color: rgba(255,255,255,.85); }
    .stat-label { font-size: 11px; color: rgba(255,255,255,.65); margin-top: 4px; letter-spacing: .4px; }

    /* ── SECTION TITLE ── */
    .section-title { font-family: 'Rajdhani', sans-serif; font-size: 18px; font-weight: 700; color: var(--text); letter-spacing: .4px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
    .section-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }

    /* ── GRID CARDS ── */
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(210px, 1fr)); gap: 16px; margin-bottom: 36px; }
    .card { position: relative; background: var(--white); border: 1px solid var(--border); border-radius: 14px; padding: 24px 20px 20px; cursor: pointer; overflow: hidden; transition: transform .22s, border-color .22s, box-shadow .22s; animation: fadeUp .4s ease both; box-shadow: 0 1px 4px rgba(0,0,0,.04); }
    .card:hover { transform: translateY(-4px); box-shadow: 0 10px 28px rgba(0,0,0,.10); }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .card:nth-child(1){animation-delay:.05s}.card:nth-child(2){animation-delay:.10s}.card:nth-child(3){animation-delay:.15s}.card:nth-child(4){animation-delay:.20s}.card:nth-child(5){animation-delay:.25s}.card:nth-child(6){animation-delay:.30s}.card:nth-child(7){animation-delay:.35s}
    .card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: 14px 14px 0 0; opacity: 0; transition: opacity .22s; }
    .card:hover::before { opacity: 1; }
    .card.cyan::before  { background: linear-gradient(90deg, var(--cyan), #29c4f0); }
    .card.gold::before  { background: linear-gradient(90deg, var(--gold), #f0c050); }
    .card.white::before { background: linear-gradient(90deg, var(--border2), #b0b8c9); }
    .card:hover.cyan  { border-color: rgba(29,168,224,.4); }
    .card:hover.gold  { border-color: rgba(200,155,60,.4); }
    .card:hover.white { border-color: var(--border2); }
    .card-icon-wrap { width: 46px; height: 46px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 21px; margin-bottom: 14px; transition: transform .22s; }
    .card:hover .card-icon-wrap { transform: scale(1.08); }
    .card.cyan  .card-icon-wrap { background: var(--cyan-lt); }
    .card.gold  .card-icon-wrap { background: var(--gold-lt); }
    .card.white .card-icon-wrap { background: #f4f6f9; }
    .card-title { font-family: 'Rajdhani', sans-serif; font-size: 16px; font-weight: 700; color: var(--text); margin-bottom: 6px; letter-spacing: .3px; }
    .card-desc { font-size: 12px; color: var(--muted); line-height: 1.55; }
    .card-arrow { position: absolute; bottom: 16px; right: 16px; font-size: 16px; opacity: 0; transform: translateX(-6px); transition: all .22s; }
    .card:hover .card-arrow { opacity: 1; transform: translateX(0); }
    .card.cyan  .card-arrow { color: var(--cyan); }
    .card.gold  .card-arrow { color: var(--gold); }
    .card.white .card-arrow { color: var(--muted); }

    /* ── ACTIVITY ── */
    .activity-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .activity-box { background: var(--white); border: 1px solid var(--border); border-radius: 14px; padding: 20px; box-shadow: 0 1px 4px rgba(0,0,0,.04); }
    .activity-box h3 { font-family: 'Rajdhani', sans-serif; font-size: 15px; font-weight: 700; color: var(--text); margin-bottom: 14px; }
    .activity-item { display: flex; align-items: flex-start; gap: 12px; padding: 10px 0; border-bottom: 1px solid var(--border); font-size: 13px; }
    .activity-item:last-child { border-bottom: none; }
    .activity-dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 5px; flex-shrink: 0; }
    .activity-dot.c { background: var(--cyan); }
    .activity-dot.g { background: var(--gold); }
    .activity-text { flex: 1; color: var(--muted); line-height: 1.5; }
    .activity-text strong { color: var(--text); font-weight: 700; }
    .activity-time { font-size: 11px; color: #b0b8c9; white-space: nowrap; margin-top: 2px; }
    .schedule-item { display: flex; align-items: center; gap: 14px; padding: 10px 0; border-bottom: 1px solid var(--border); }
    .schedule-item:last-child { border-bottom: none; }
    .sched-day { width: 44px; height: 44px; border-radius: 10px; background: var(--cyan-lt); border: 1px solid rgba(29,168,224,.2); display: flex; flex-direction: column; align-items: center; justify-content: center; flex-shrink: 0; }
    .sched-day .d { font-family:'Rajdhani',sans-serif; font-size:17px; font-weight:700; color:var(--cyan); line-height:1; }
    .sched-day .m { font-size:9px; color:var(--muted); letter-spacing:.5px; }
    .sched-info { flex: 1; }
    .sched-info strong { font-size: 13px; color: var(--text); display: block; font-weight: 700; }
    .sched-info span  { font-size: 11px; color: var(--muted); }
    .sched-badge { font-size: 10px; font-weight: 700; padding: 3px 10px; border-radius: 20px; letter-spacing: .4px; }
    .sched-badge.live { background: var(--cyan-lt); color: var(--cyan); border: 1px solid rgba(29,168,224,.3); }
    .sched-badge.soon { background: var(--gold-lt); color: var(--gold); border: 1px solid rgba(200,155,60,.3); }

    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--border2); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #b0b8c9; }
    @media (max-width: 900px) { .sidebar { display: none; } .main { margin-left: 0; padding: 20px; } .hero-stats { display: none; } .activity-grid { grid-template-columns: 1fr; } .topbar-brand { width: auto; } }
  </style>
</head>
<body>

<!-- TOP BAR -->
<header class="topbar">
  <div class="topbar-brand">
    <div class="topbar-logo">GBI</div>
    <h1>GBI <span class="c">Tambunan</span> &nbsp;<span class="g">ADMIN</span></h1>
  </div>
  <nav class="topbar-nav">
    <a href="#" class="active">Beranda</a>
    <a href="{{ route('tentang.index') }}">Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}">Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}">Galeri</a>
    <a href="{{ route('khotbah.index') }}">Khotbah</a>
    <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
    <a href="{{ route('kontaks.index') }}">Kontak</a>
  </nav>
  <div class="topbar-right">
    <a href="{{ route('home') }}">
      <button class="view-site-btn">🌐 Lihat Website</button>
    </a>
    <!-- Foto/inisial admin — otomatis sync dari profil -->
    <a href="{{ route('profil.index') }}" class="topbar-badge" id="topbarBadge" title="Profil Saya">A</a>
  </div>
</header>

<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-section">Menu Utama</div>
    <a href="{{ route('welcome') }}" class="active"><span class="icon">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}"><span class="icon">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}"><span class="icon">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}"><span class="icon">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="icon">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}"><span class="icon">🙌</span> Pelayanan</a>
    <a href="{{ route('kontaks.index') }}"><span class="icon">✉</span> Kontak</a>
    <div class="sidebar-section" style="margin-top:18px;">Pengaturan</div>
    <a href="{{ route('profil.index') }}"><span class="icon">👤</span> Profil Admin</a>
    <a href="#"><span class="icon">⚙</span> Pengaturan</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span class="icon">🚪</span> Keluar
    </a>

    <!-- Footer sidebar: avatar + nama + jabatan — sync dari profil -->
    <div class="sidebar-footer">
      <div class="sf-ava" id="sfAva">A</div>
      <div class="sf-info">
        <div class="sf-name" id="sfName">Admin GBI</div>
        <div class="sf-role" id="sfRole">Administrator</div>
        <div class="sf-meta">Kelompok 5 PA-1 · v1.0.0</div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="main">

    <div class="welcome-hero">
      <div class="hero-tag">✦ Panel Admin</div>
      <h2>Selamat Datang,<br>
        <span class="hero-admin-name" id="heroName">Admin GBI Tambunan</span> 👋
      </h2>
      <p>Kelola seluruh konten website gereja dari sini. Perubahan yang kamu buat akan langsung terlihat oleh jemaat dan pengunjung umum.</p>
      <div class="hero-stats">
        <div class="stat-item"><div class="stat-num">12</div><div class="stat-label">Khotbah</div></div>
        <div class="stat-item"><div class="stat-num g">8</div><div class="stat-label">Galeri</div></div>
        <div class="stat-item"><div class="stat-num w">5</div><div class="stat-label">Pelayanan</div></div>
      </div>
    </div>

    <div class="section-title">Kelola Konten Website</div>
    <div class="grid">
      <a href="{{ route('tentang.index') }}" style="text-decoration:none">
      <div class="card cyan"><div class="card-icon-wrap">📋</div><div class="card-title">Tentang Kami</div><div class="card-desc">Edit visi, misi, sejarah, dan profil gereja yang tampil di halaman publik.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('jadwals.index') }}" style="text-decoration:none">
      <div class="card gold"><div class="card-icon-wrap">📅</div><div class="card-title">Jadwal Ibadah</div><div class="card-desc">Tambah atau ubah jadwal kebaktian mingguan, doa, dan acara khusus.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('galeris.index') }}" style="text-decoration:none">
      <div class="card white"><div class="card-icon-wrap">🖼</div><div class="card-title">Galeri</div><div class="card-desc">Upload foto dan video dokumentasi kegiatan gereja untuk ditampilkan publik.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('khotbah.index') }}" style="text-decoration:none">
      <div class="card cyan"><div class="card-icon-wrap">🎙</div><div class="card-title">Khotbah</div><div class="card-desc">Kelola rekaman dan ringkasan khotbah yang bisa diakses jemaat kapan saja.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('pelayanan.index') }}" style="text-decoration:none">
      <div class="card gold"><div class="card-icon-wrap">🙌</div><div class="card-title">Pelayanan</div><div class="card-desc">Atur informasi departemen pelayanan, komsel, dan kegiatan komunitas gereja.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('kontaks.index') }}" style="text-decoration:none">
      <div class="card white"><div class="card-icon-wrap">✉</div><div class="card-title">Kontak</div><div class="card-desc">Perbarui nomor telepon, alamat, email, dan tautan media sosial gereja.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('welcome') }}" style="text-decoration:none">
      <div class="card cyan"><div class="card-icon-wrap">🏠</div><div class="card-title">Beranda</div><div class="card-desc">Edit banner utama, teks selamat datang, dan konten featured di halaman depan.</div><div class="card-arrow">→</div></div>
      </a>
    </div>

    <div class="section-title">Aktivitas & Jadwal</div>
    <div class="activity-grid">
      <div class="activity-box">
        <h3>⚡ Aktivitas Terbaru</h3>
        <div class="activity-item"><div class="activity-dot c"></div><div class="activity-text"><strong>Khotbah baru ditambahkan</strong><br>"Kasih yang Tak Berkesudahan" – Pdt. Samuel</div><div class="activity-time">2j lalu</div></div>
        <div class="activity-item"><div class="activity-dot g"></div><div class="activity-text"><strong>Jadwal Ibadah diperbarui</strong><br>Ibadah Minggu Pagi pukul 08.00 WIB</div><div class="activity-time">5j lalu</div></div>
        <div class="activity-item"><div class="activity-dot c"></div><div class="activity-text"><strong>5 foto galeri diunggah</strong><br>Dokumentasi Natal 2024</div><div class="activity-time">1 hr lalu</div></div>
        <div class="activity-item"><div class="activity-dot g"></div><div class="activity-text"><strong>Profil gereja diperbarui</strong><br>Bagian visi &amp; misi telah diedit</div><div class="activity-time">3 hr lalu</div></div>
      </div>
      <div class="activity-box">
        <h3>📅 Jadwal Mendatang</h3>
        <div class="schedule-item"><div class="sched-day"><div class="d">09</div><div class="m">MAR</div></div><div class="sched-info"><strong>Ibadah Minggu Pagi</strong><span>08.00 – 10.00 WIB · Gedung Utama</span></div><div class="sched-badge live">BESOK</div></div>
        <div class="schedule-item"><div class="sched-day"><div class="d">12</div><div class="m">MAR</div></div><div class="sched-info"><strong>Doa Semalam Suntuk</strong><span>20.00 WIB · Ruang Doa</span></div><div class="sched-badge soon">SOON</div></div>
        <div class="schedule-item"><div class="sched-day"><div class="d">16</div><div class="m">MAR</div></div><div class="sched-info"><strong>Ibadah Minggu + Baptisan</strong><span>08.00 WIB · Gedung Utama</span></div><div class="sched-badge soon">SOON</div></div>
        <div class="schedule-item"><div class="sched-day"><div class="d">22</div><div class="m">MAR</div></div><div class="sched-info"><strong>Pertemuan Pemuda</strong><span>16.00 WIB · Aula Samping</span></div><div class="sched-badge soon">SOON</div></div>
      </div>
    </div>

  </main>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>

<!-- ═══════════════════════════════════
     PROFILE SYNC — membaca localStorage
     key 'gbi_profile_v1' (key yang sama
     dipakai halaman profil) dan mengupdate:
       · #topbarBadge   → foto/inisial
       · #sfAva         → foto/inisial sidebar
       · #sfName        → nama
       · #sfRole        → jabatan
       · #heroName      → sapaan di hero
═══════════════════════════════════ -->
<script>
(function () {
  const KEY = 'gbi_profile_v1';

  function initials(name) {
    return (name || 'A').split(' ').map(w => w[0]).join('').toUpperCase().slice(0, 2);
  }

  function txt(id, val) {
    const el = document.getElementById(id);
    if (el) el.textContent = val || '';
  }

  function setAvatar(id, nama, foto, circle) {
    const el = document.getElementById(id);
    if (!el) return;
    if (foto) {
      const r = circle ? 'border-radius:50%' : '';
      el.innerHTML = `<img src="${foto}" alt="" style="width:100%;height:100%;object-fit:cover;${r}"/>`;
    } else {
      el.innerHTML = initials(nama);
    }
  }

  function sync() {
    let p = null;
    try { const r = localStorage.getItem(KEY); if (r) p = JSON.parse(r); } catch (_) {}
    if (!p) return;

    setAvatar('topbarBadge', p.nama, p.foto, true);   // topbar
    setAvatar('sfAva',       p.nama, p.foto, false);  // sidebar footer
    txt('sfName',  p.nama);
    txt('sfRole',  p.jabatan);
    txt('heroName', p.nama || 'Admin GBI Tambunan');  // sapaan hero
  }

  /* load saat halaman pertama tampil */
  sync();

  /* sync real-time: tab profil dan dashboard buka bersamaan */
  window.addEventListener('storage', e => { if (e.key === KEY) sync(); });

  /* sync saat kembali ke tab ini setelah buka profil di tab lain */
  window.addEventListener('focus', sync);
  document.addEventListener('visibilitychange', () => {
    if (document.visibilityState === 'visible') sync();
  });
})();
</script>

</body>
</html>