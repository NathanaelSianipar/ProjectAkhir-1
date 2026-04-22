@php
    use Illuminate\Support\Facades\Auth;
    $authUser = Auth::user();
@endphp

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

    .layout { display: flex; padding-top: 60px; }

    .sidebar { position: fixed; top: 60px; left: 0; bottom: 0; width: 220px; background: var(--sidebar); padding: 20px 0; display: flex; flex-direction: column; overflow-y: auto; }
    .sidebar-section { padding: 0 16px 6px; font-size: 10px; font-weight: 700; letter-spacing: 1.5px; color: rgba(255,255,255,.25); text-transform: uppercase; margin-top: 10px; }
    .sidebar a { display: flex; align-items: center; gap: 10px; padding: 10px 20px; font-size: 13.5px; font-weight: 600; color: rgba(255,255,255,.5); text-decoration: none; transition: all .18s; border-left: 3px solid transparent; }
    .sidebar a:hover { color: #fff; background: rgba(255,255,255,.06); }
    .sidebar a.active { color: #fff; border-left-color: var(--cyan); background: rgba(29,168,224,.15); }

    .sidebar-footer { margin-top: auto; padding: 14px 20px; border-top: 1px solid rgba(255,255,255,.07); display: flex; align-items: center; gap: 10px; }
    .sf-ava { width: 36px; height: 36px; border-radius: 50%; flex-shrink: 0; background: linear-gradient(135deg, var(--gold), var(--cyan)); display: flex; align-items: center; justify-content: center; overflow: hidden; }
    .sf-ava img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
    .sf-info { min-width: 0; }
    .sf-name { font-size: 13px; font-weight: 700; color: rgba(255,255,255,.85); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .sf-role { font-size: 11px; color: var(--cyan); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .sf-meta { font-size: 10px; color: rgba(255,255,255,.25); margin-top: 2px; }

    .main { margin-left: 220px; padding: 32px 32px 60px; min-height: calc(100vh - 60px); flex: 1; }

    .welcome-hero { position: relative; border-radius: 16px; overflow: hidden; padding: 36px 40px; margin-bottom: 32px; background: linear-gradient(135deg, var(--cyan-dk) 0%, var(--cyan) 60%, #29c4f0 100%); box-shadow: 0 6px 24px rgba(29,168,224,.25); }
    .welcome-hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 55% 80% at 95% 50%, rgba(255,255,255,.12) 0%, transparent 65%), radial-gradient(ellipse 35% 60% at 5% 85%, rgba(200,155,60,.18) 0%, transparent 55%); pointer-events: none; }
    .hero-tag { display: inline-block; background: rgba(255,255,255,.2); border: 1px solid rgba(255,255,255,.35); color: #fff; font-size: 11px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; padding: 4px 12px; border-radius: 20px; margin-bottom: 14px; }
    .welcome-hero h2 { font-family: 'Rajdhani', sans-serif; font-size: 30px; font-weight: 700; line-height: 1.15; margin-bottom: 10px; color: #fff; }
    .hero-admin-name { color: var(--gold-lt); }
    .welcome-hero p { color: rgba(255,255,255,.8); font-size: 14px; max-width: 480px; line-height: 1.65; }
    .hero-stats { position: absolute; right: 40px; top: 50%; transform: translateY(-50%); display: flex; align-items: center; }
    .hero-logo-wrap { display: flex; flex-direction: column; align-items: center; gap: 8px; }
    .hero-logo-circle { width: 90px; height: 90px; border-radius: 50%; background: rgba(255,255,255,.2); border: 2px solid rgba(255,255,255,.45); display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 20px rgba(0,0,0,.15); backdrop-filter: blur(4px); overflow: hidden; }
    .hero-logo-circle img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
    .hero-logo-name { font-family: 'Rajdhani', sans-serif; font-size: 13px; font-weight: 700; color: rgba(255,255,255,.85); letter-spacing: 1px; text-align: center; text-transform: uppercase; }

    .section-title { font-family: 'Rajdhani', sans-serif; font-size: 18px; font-weight: 700; color: var(--text); letter-spacing: .4px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
    .section-title::after { content: ''; flex: 1; height: 1px; background: var(--border); }

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

    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--border2); border-radius: 3px; }
    ::-webkit-scrollbar-thumb:hover { background: #b0b8c9; }

    @media (max-width: 900px) {
      .sidebar { display: none; }
      .main { margin-left: 0; padding: 20px; }
      .hero-stats { display: none; }
      .topbar-brand { width: auto; }
    }
  </style>
</head>
<body>

<header class="topbar">
  <div class="topbar-brand">
    <div class="topbar-logo">GBI</div>
    <h1>GBI <span class="c">Tambunan</span> &nbsp;<span class="g">ADMIN</span></h1>
  </div>

  <nav class="topbar-nav">
    <a href="#" class="active">Beranda</a>
    <a href="{{ route('tentang.index') }}">Tentang Kami</a>
    <a href="{{ route('jadwal.index') }}">Jadwal Ibadah</a>
    <a href="{{ route('galeri.index') }}">Galeri</a>
    <a href="{{ route('khotbah.index') }}">Khotbah</a>
    <a href="{{ route('pelayanan.index') }}">Pelayanan</a>
    <a href="{{ route('kontak.index') }}">Kontak</a>
    <a href="{{ route('pengumuman.index') }}">Pengumuman</a>
    <a href="{{ route('accounts.index') }}">Akun</a>
  </nav>

  <div class="topbar-right">
    <a href="{{ route('home') }}">
      <button class="view-site-btn">🌐 Lihat Website</button>
    </a>

    <a href="{{ route('profil.index') }}" class="topbar-badge" title="Profil Saya">
      <img src="{{ $authUser->foto_url }}" alt="{{ $authUser->name }}">
    </a>
  </div>
</header>

<div class="layout">
  <aside class="sidebar">
    <div class="sidebar-section">Menu Utama</div>
    <a href="{{ route('welcome') }}" class="active"><span class="icon">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}"><span class="icon">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwal.index') }}"><span class="icon">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeri.index') }}"><span class="icon">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="icon">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}"><span class="icon">🙌</span> Pelayanan</a>
    <a href="{{ route('kontak.index') }}"><span class="icon">✉</span> Kontak</a>
    <a href="{{ route('pengumuman.index') }}"><span class="icon">📢</span> Pengumuman</a>
    <a href="{{ route('accounts.index') }}"><span class="icon">🔒</span> Akun</a>

    <div class="sidebar-section" style="margin-top:18px;">Pengaturan</div>
    <a href="{{ route('profil.index') }}"><span class="icon">👤</span> Profil Admin</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span class="icon">🚪</span> Keluar
    </a>

    <div class="sidebar-footer">
      <div class="sf-ava">
        <img src="{{ $authUser->foto_url }}" alt="{{ $authUser->name }}">
      </div>
      <div class="sf-info">
        <div class="sf-name">{{ $authUser->name }}</div>
        <div class="sf-role">{{ $authUser->role_label }}</div>
        <div class="sf-meta">Kelompok 5 PA-1 · v1.0.0</div>
      </div>
    </div>
  </aside>

  <main class="main">
    <div class="welcome-hero">
      <div class="hero-tag">✦ Panel Admin</div>
      <h2>Selamat Datang,<br>
        <span class="hero-admin-name">{{ $authUser->name }}</span> 👋
      </h2>
      <p>Kelola seluruh konten website gereja dari sini. Perubahan yang kamu buat akan langsung terlihat oleh jemaat dan pengunjung umum.</p>

      <div class="hero-stats">
        <div class="hero-logo-wrap">
          <div class="hero-logo-circle">
            <img src="{{ $authUser->foto_url }}" alt="{{ $authUser->name }}">
          </div>
          <div class="hero-logo-name">{{ $authUser->role_label }}</div>
        </div>
      </div>
    </div>

    <div class="section-title">Kelola Konten Website</div>
    <div class="grid">
      <a href="{{ route('tentang.index') }}" style="text-decoration:none">
        <div class="card cyan"><div class="card-icon-wrap">📋</div><div class="card-title">Tentang Kami</div><div class="card-desc">Edit visi, misi, sejarah, dan profil gereja yang tampil di halaman publik.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('jadwal.index') }}" style="text-decoration:none">
        <div class="card gold"><div class="card-icon-wrap">📅</div><div class="card-title">Jadwal Ibadah</div><div class="card-desc">Tambah atau ubah jadwal kebaktian mingguan, doa, dan acara khusus.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('galeri.index') }}" style="text-decoration:none">
        <div class="card white"><div class="card-icon-wrap">🖼</div><div class="card-title">Galeri</div><div class="card-desc">Upload foto dan video dokumentasi kegiatan gereja untuk ditampilkan publik.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('khotbah.index') }}" style="text-decoration:none">
        <div class="card cyan"><div class="card-icon-wrap">🎙</div><div class="card-title">Khotbah</div><div class="card-desc">Kelola rekaman dan ringkasan khotbah yang bisa diakses jemaat kapan saja.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('pelayanan.index') }}" style="text-decoration:none">
        <div class="card gold"><div class="card-icon-wrap">🙌</div><div class="card-title">Pelayanan</div><div class="card-desc">Atur informasi departemen pelayanan, komsel, dan kegiatan komunitas gereja.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('kontak.index') }}" style="text-decoration:none">
        <div class="card white"><div class="card-icon-wrap">✉</div><div class="card-title">Kontak</div><div class="card-desc">Perbarui nomor telepon, alamat, email, dan tautan media sosial gereja.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('welcome') }}" style="text-decoration:none">
        <div class="card cyan"><div class="card-icon-wrap">🏠</div><div class="card-title">Beranda</div><div class="card-desc">Edit banner utama, teks selamat datang, dan konten featured di halaman depan.</div><div class="card-arrow">→</div></div>
      </a>
      <a href="{{ route('pengumuman.index') }}" style="text-decoration:none">
        <div class="card white"><div class="card-icon-wrap">📢</div><div class="card-title">Pengumuman</div><div class="card-desc">Kelola pengumuman penting yang akan ditampilkan di halaman publik.</div><div class="card-arrow">→</div></div>
      </a>
      
      <a href="{{ route('accounts.index') }}" style="text-decoration:none">
        <div class="card gold"><div class="card-icon-wrap">🔒</div><div class="card-title">Akun</div><div class="card-desc">Kelola akun admin, super admin, dan pelayanan.</div><div class="card-arrow">→</div></div>
      </a>
    </div>
  </main>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">@csrf</form>
</body>
</html>