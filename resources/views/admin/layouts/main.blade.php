<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin – GBI Tambunan</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet"/>

  @php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

    $authUser = Auth::user();

    $displayRole = match($authUser->role ?? '') {
        'super_admin' => 'Super Admin',
        'admin' => 'Admin',
        'pelayanan' => 'Pelayanan',
        default => 'Administrator',
    };

    $displayName = $authUser->name ?? 'Admin GBI';

    $displayPhoto = null;
    if (!empty($authUser->foto) && Storage::disk('public')->exists($authUser->foto)) {
        $displayPhoto = Storage::url($authUser->foto);
    }

    $words = preg_split('/\s+/', trim($displayName));
    $initials = '';

    if (!empty($words)) {
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
            if (strlen($initials) >= 2) {
                break;
            }
        }
    }

    $initials = $initials ?: 'A';
  @endphp

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

    .topbar {
      position:fixed; top:0; left:0; right:0; z-index:200; height:56px;
      display:flex; align-items:center; justify-content:space-between;
      padding:0 20px 0 0;
      background:var(--white); border-bottom:1px solid var(--border);
      box-shadow:0 1px 8px rgba(0,0,0,.06);
    }

    .topbar-left {
      display:flex; align-items:center; width:240px; height:100%; flex-shrink:0;
      background:var(--sidebar); padding:0 18px;
    }

    .hamburger {
      background:none; border:none; color:rgba(255,255,255,.5);
      font-size:20px; cursor:pointer; margin-right:12px;
    }

    .brand { display:flex; align-items:center; gap:10px; text-decoration:none; }
    .brand-logo {
      width:32px; height:32px;
      background:linear-gradient(135deg,var(--cyan),var(--gold));
      border-radius:7px; display:flex; align-items:center; justify-content:center;
      font-family:'Rajdhani',sans-serif; font-weight:700; font-size:13px; color:#fff; flex-shrink:0;
    }
    .brand-name { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:#fff; }
    .brand-name span { color:var(--cyan); }

    .topbar-nav { display:flex; align-items:center; gap:2px; flex:1; padding:0 14px; }
    .topbar-nav a {
      color:var(--muted); font-size:13px; font-weight:600; text-decoration:none;
      padding:5px 12px; border-radius:6px; transition:all .15s;
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
      font-size:12px; font-weight:700; color:#fff; cursor:pointer; overflow:hidden;
      text-transform:uppercase; text-decoration:none;
    }
    .avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; display:block; }

    .sidebar {
      position:fixed; top:56px; left:0; bottom:0; width:240px;
      background:var(--sidebar); display:flex; flex-direction:column;
      overflow-y:auto; z-index:100;
    }

    .sidebar-user {
      display:flex; align-items:center; gap:12px;
      padding:18px 18px 14px; border-bottom:1px solid rgba(255,255,255,.07);
    }

    .sidebar-user .ava {
      width:40px; height:40px; border-radius:50%;
      background:linear-gradient(135deg,var(--gold),var(--cyan));
      display:flex; align-items:center; justify-content:center;
      font-size:15px; font-weight:700; color:#fff; flex-shrink:0; overflow:hidden;
      text-transform:uppercase;
    }
    .sidebar-user .ava img { width:100%; height:100%; object-fit:cover; border-radius:50%; display:block; }

    .sidebar-user .info strong { display:block; font-size:14px; font-weight:700; color:#fff; }
    .sidebar-user .info span  { font-size:11px; color:var(--cyan); }

    .sidebar-search {
      display:flex; align-items:center; gap:8px;
      margin:12px 14px;
      background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.1);
      border-radius:7px; padding:7px 12px;
    }

    .sidebar-search input {
      background:none; border:none; outline:none;
      color:#fff; font-family:'Nunito',sans-serif; font-size:13px; flex:1;
    }
    .sidebar-search input::placeholder { color:rgba(255,255,255,.3); }

    .nav-section {
      padding:10px 18px 4px;
      font-size:10px; font-weight:700; letter-spacing:1.4px;
      color:rgba(255,255,255,.25); text-transform:uppercase;
    }

    .sidebar nav a {
      display:flex; align-items:center; gap:10px;
      padding:9px 18px; font-size:13.5px; font-weight:600;
      color:rgba(255,255,255,.5); text-decoration:none;
      border-left:3px solid transparent; transition:all .15s;
    }
    .sidebar nav a:hover { color:#fff; background:rgba(255,255,255,.06); }
    .sidebar nav a.active { color:#fff; border-left-color:var(--cyan); background:rgba(29,168,224,.15); }

    .sidebar nav a .ico { font-size:15px; width:20px; text-align:center; }

    .sidebar-footer {
      margin-top:auto; padding:14px 18px;
      border-top:1px solid rgba(255,255,255,.07);
      font-size:11px; color:rgba(255,255,255,.3);
    }
    .sidebar-footer strong { color:rgba(255,255,255,.6); display:block; }

    .wrapper { margin-left:240px; padding-top:56px; min-height:100vh; }

    ::-webkit-scrollbar { width:5px; }
    ::-webkit-scrollbar-track { background:var(--bg); }
    ::-webkit-scrollbar-thumb { background:var(--border2); border-radius:3px; }

    @media(max-width:900px) {
      .sidebar { display:none; }
      .wrapper { margin-left:0; }
      .topbar-nav { display:none; }
    }
  </style>

  @stack('styles')
</head>
<body>

<header class="topbar">
  <div class="topbar-left">
    <button class="hamburger">☰</button>
    <a class="brand" href="{{ route('welcome') }}">
      <div class="brand-logo">GBI</div>
      <span class="brand-name">GBI <span>Tambunan</span></span>
    </a>
  </div>

  <nav class="topbar-nav">
    <a href="{{ route('welcome') }}" @if(request()->routeIs('welcome')) class="active" @endif>Beranda</a>
    <a href="{{ route('tentang.index') }}" @if(request()->routeIs('tentang.*')) class="active" @endif>Tentang Kami</a>
    <a href="{{ route('jadwal.index') }}" @if(request()->routeIs('jadwal.*')) class="active" @endif>Jadwal Ibadah</a>
    <a href="{{ route('galeri.index') }}" @if(request()->routeIs('galeri.*')) class="active" @endif>Galeri</a>
    <a href="{{ route('khotbah.index') }}" @if(request()->routeIs('khotbah.*')) class="active" @endif>Khotbah</a>
    <a href="{{ route('admin.pelayanan.index') }}" @if(request()->routeIs('pelayanan.*')) class="active" @endif>Pelayanan</a>
    <a href="{{ route('kontak.index') }}" @if(request()->routeIs('kontak.*')) class="active" @endif>Kontak</a>
    <a href="{{ route('pengumuman.index') }}" @if(request()->routeIs('pengumuman.*')) class="active" @endif>Pengumuman</a>
    <a href="{{ route('accounts.index') }}" @if(request()->routeIs('accounts.*')) class="active" @endif>Akun</a>
  </nav>

  <div class="topbar-right">
    <button class="btn-viewsite" onclick="window.open('{{ route('home') }}','_blank')">🌐 Lihat Website</button>

    <a href="{{ route('profil.index') }}" class="avatar">
      @if($displayPhoto)
        <img src="{{ $displayPhoto }}" alt="{{ $displayName }}">
      @else
        {{ $initials }}
      @endif
    </a>
  </div>
</header>

<aside class="sidebar">
  <div class="sidebar-user">
    <div class="ava">
      @if($displayPhoto)
        <img src="{{ $displayPhoto }}" alt="{{ $displayName }}">
      @else
        {{ $initials }}
      @endif
    </div>
    <div class="info">
      <strong>{{ $displayName }}</strong>
      <span>{{ $displayRole }}</span>
    </div>
  </div>

  <div class="sidebar-search">
    <span style="color:rgba(255,255,255,.4)">🔍</span>
    <input type="text" placeholder="Search..."/>
  </div>

  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}" @if(request()->routeIs('welcome')) class="active" @endif><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}" @if(request()->routeIs('tentang.*')) class="active" @endif><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwal.index') }}" @if(request()->routeIs('jadwal.*')) class="active" @endif><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeri.index') }}" @if(request()->routeIs('galeri.*')) class="active" @endif><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}" @if(request()->routeIs('khotbah.*')) class="active" @endif><span class="ico">🎙</span> Khotbah</a>
    <a href="{{ route('admin.pelayanan.index') }}" @if(request()->routeIs('pelayanan.*')) class="active" @endif><span class="ico">🙌</span> Pelayanan</a>
    <a href="{{ route('kontak.index') }}" @if(request()->routeIs('kontak.*')) class="active" @endif><span class="ico">✉</span> Kontak</a>
    <a href="{{ route('pengumuman.index') }}" @if(request()->routeIs('pengumuman.*')) class="active" @endif><span class="ico">📢</span> Pengumuman</a>
    <a href="{{ route('accounts.index') }}" @if(request()->routeIs('accounts.*')) class="active" @endif><span class="ico">🔒</span> Akun</a>
  </nav>

  <div class="nav-section">Pengaturan</div>
  <nav>
    <a href="{{ route('profil.index') }}" @if(request()->routeIs('profil.*')) class="active" @endif><span class="ico">👤</span> Profil Admin</a>
    <a href="{{ route('logout') }}" onclick="confirmLogout(event)">
      <span class="ico">🚪</span> Keluar
    </a>
  </nav>

  <div class="sidebar-footer">
    <strong>Kelompok 5 PA-1</strong>Version 1.0.0
  </div>
</aside>

<div class="wrapper">
  @yield('content')
</div>

<!-- FORM LOGOUT -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

@stack('scripts')

<script>
function confirmLogout(e) {
    e.preventDefault();

    if (confirm("Apakah Anda yakin ingin keluar?")) {
        document.getElementById('logout-form').submit();
    }
}
</script>

</body>
</html>