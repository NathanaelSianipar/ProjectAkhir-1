<?php
// resources/views/profile/index.php
// Untuk Laravel: rename ke index.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profil – Admin GBI Tambunan</title>
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:        #f4f6f9;
      --white:     #ffffff;
      --border:    #e4e8ef;
      --text:      #1a2233;
      --muted:     #7a8499;
      --muted2:    #a0aab8;
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
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
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
    .topbar-right { display:flex; align-items:center; gap:12px; }
    .btn-viewsite { background:var(--cyan-lt); border:1px solid rgba(29,168,224,.3); color:var(--cyan); font-family:'Nunito',sans-serif; font-size:12px; font-weight:700; padding:5px 14px; border-radius:6px; cursor:pointer; transition:all .15s; }
    .btn-viewsite:hover { background:var(--cyan); color:#fff; }
    .topbar-ava { width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#fff; cursor:pointer; overflow:hidden; border:2px solid rgba(29,168,224,.3); flex-shrink:0; }
    .topbar-ava img { width:100%; height:100%; object-fit:cover; }

    /* ── SIDEBAR ── */
    .sidebar { position:fixed; top:56px; left:0; bottom:0; width:240px; background:var(--sidebar); display:flex; flex-direction:column; overflow-y:auto; z-index:100; }
    .sidebar-user { display:flex; align-items:center; gap:12px; padding:18px 18px 14px; border-bottom:1px solid rgba(255,255,255,.07); }
    .sidebar-ava { width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:15px; font-weight:700; color:#fff; flex-shrink:0; overflow:hidden; }
    .sidebar-ava img { width:100%; height:100%; object-fit:cover; }
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
    .page-head { display:flex; align-items:center; justify-content:space-between; padding:24px 32px 0; }
    .page-head h1 { font-family:'Rajdhani',sans-serif; font-size:20px; font-weight:700; }
    .breadcrumb { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
    .breadcrumb a { color:var(--cyan); text-decoration:none; }
    .content { padding:20px 32px 60px; }

    /* ── PROFILE CENTERED CARD ── */
    @keyframes fadeUp { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }

    .profile-wrap {
      max-width: 600px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    /* ── AVATAR SECTION ── */
    .avatar-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 36px 28px 28px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      box-shadow: 0 1px 6px rgba(0,0,0,.05);
      animation: fadeUp .3s ease both;
      position: relative;
    }

    /* subtle top accent line */
    .avatar-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--cyan), var(--gold));
      border-radius: 16px 16px 0 0;
    }

    /* Avatar circle */
    .ava-circle {
      width: 96px; height: 96px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), var(--cyan));
      display: flex; align-items: center; justify-content: center;
      font-family: 'Rajdhani', sans-serif;
      font-size: 32px; font-weight: 700; color: #fff;
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(29,168,224,.25);
      flex-shrink: 0;
    }
    .ava-circle img {
      width: 100%; height: 100%;
      object-fit: cover;
      position: absolute; inset: 0;
    }

    /* Upload overlay on hover */
    .ava-upload-overlay {
      position: absolute; inset: 0;
      background: rgba(15,22,40,.55);
      border-radius: 50%;
      display: flex; flex-direction:column; align-items:center; justify-content:center;
      opacity: 0;
      transition: opacity .2s;
      cursor: pointer;
      gap: 3px;
    }
    .ava-circle:hover .ava-upload-overlay { opacity: 1; }
    .ava-upload-overlay span { font-size: 18px; }
    .ava-upload-overlay p { font-size: 9px; font-weight: 700; color: #fff; letter-spacing: .3px; }
    .ava-file-input { display: none; }

    .ava-hint { font-size: 11px; color: var(--muted2); margin-top: 8px; }

    .profile-name-display {
      font-family: 'Rajdhani', sans-serif;
      font-size: 22px; font-weight: 700;
      color: var(--text); margin-top: 14px;
    }
    .profile-role-display {
      display: inline-flex; align-items: center; gap: 5px;
      background: var(--cyan-lt); color: var(--cyan);
      font-size: 11px; font-weight: 700;
      padding: 3px 12px; border-radius: 20px;
      border: 1px solid rgba(29,168,224,.22);
      margin-top: 6px;
    }
    .profile-joined {
      font-size: 12px; color: var(--muted2);
      margin-top: 8px;
    }

    /* ── DATA CARD ── */
    .data-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 1px 6px rgba(0,0,0,.05);
      animation: fadeUp .35s ease both;
    }
    .data-card:nth-child(2) { animation-delay: .05s; }
    .data-card:nth-child(3) { animation-delay: .10s; }

    .card-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
    }
    .card-header-left {
      display: flex; align-items: center; gap: 8px;
      font-family: 'Rajdhani', sans-serif;
      font-size: 14px; font-weight: 700; color: var(--text);
    }
    .card-header-left .ch-ico {
      width: 28px; height: 28px; border-radius: 7px;
      background: var(--cyan-lt);
      display: flex; align-items: center; justify-content: center;
      font-size: 13px;
    }

    /* Edit / Save toggle button */
    .edit-toggle {
      background: none; border: 1px solid var(--border);
      color: var(--muted); font-family: 'Nunito', sans-serif;
      font-size: 12px; font-weight: 700;
      padding: 5px 13px; border-radius: 7px;
      cursor: pointer; transition: all .15s;
      display: flex; align-items: center; gap: 5px;
    }
    .edit-toggle:hover { border-color: var(--cyan); color: var(--cyan); background: var(--cyan-lt); }
    .edit-toggle.saving { background: var(--cyan); border-color: var(--cyan); color: #fff; }

    /* Field rows */
    .field-row {
      display: grid;
      grid-template-columns: 140px 1fr;
      align-items: center;
      padding: 13px 20px;
      border-bottom: 1px solid var(--border);
      gap: 12px;
      transition: background .15s;
    }
    .field-row:last-child { border-bottom: none; }
    .field-row:hover { background: #fafbfc; }

    .field-label {
      font-size: 12px; font-weight: 700;
      color: var(--muted); letter-spacing: .3px;
    }
    .field-value {
      font-size: 13.5px; color: var(--text); font-weight: 600;
      line-height: 1.4;
    }
    .field-value.empty { color: var(--muted2); font-style: italic; font-weight: 400; }

    /* Editable input */
    .field-input {
      background: var(--bg);
      border: 1px solid var(--border);
      color: var(--text);
      font-family: 'Nunito', sans-serif;
      font-size: 13.5px; font-weight: 600;
      padding: 7px 11px;
      border-radius: 7px;
      outline: none;
      width: 100%;
      transition: all .15s;
      display: none; /* hidden when viewing */
    }
    .field-input:focus {
      border-color: var(--cyan);
      background: #fff;
      box-shadow: 0 0 0 3px rgba(29,168,224,.08);
    }
    .field-input::placeholder { color: #b5bfce; font-weight: 400; }

    /* Save / Cancel buttons */
    .btn-cancel-sm {
      background: var(--bg); border: 1px solid var(--border);
      color: var(--muted); font-family: 'Nunito', sans-serif;
      font-size: 12.5px; font-weight: 700;
      padding: 7px 16px; border-radius: 7px; cursor: pointer; transition: all .14s;
    }
    .btn-cancel-sm:hover { color: var(--text); background: #eceef2; }
    .btn-save-sm {
      background: linear-gradient(135deg, var(--cyan), var(--cyan-dk));
      border: none; color: #fff; font-family: 'Nunito', sans-serif;
      font-size: 12.5px; font-weight: 700;
      padding: 7px 18px; border-radius: 7px; cursor: pointer;
      box-shadow: 0 2px 8px rgba(29,168,224,.25);
      transition: all .18s;
    }
    .btn-save-sm:hover { transform: translateY(-1px); box-shadow: 0 4px 14px rgba(29,168,224,.35); }

    /* ── INLINE EDIT (nama & jabatan di kartu avatar) ── */
    .inline-edit-wrap {
      position: relative;
      cursor: text;
    }
    .inline-edit-wrap:hover .profile-name-display,
    .inline-edit-wrap:hover .profile-role-display {
      outline: 1.5px dashed rgba(29,168,224,.4);
      border-radius: 6px;
    }
    /* pencil hint on hover */
    .inline-edit-wrap::after {
      content: '✏';
      position: absolute;
      right: -20px; top: 50%;
      transform: translateY(-50%);
      font-size: 11px;
      color: var(--cyan);
      opacity: 0;
      transition: opacity .15s;
      pointer-events: none;
    }
    .inline-edit-wrap:hover::after { opacity: 1; }

    .inline-edit-input {
      background: var(--bg);
      border: 1.5px solid var(--cyan);
      border-radius: 8px;
      outline: none;
      box-shadow: 0 0 0 3px rgba(29,168,224,.1);
      font-family: 'Nunito', sans-serif;
      color: var(--text);
      text-align: center;
      transition: all .15s;
    }
    .name-input {
      font-family: 'Rajdhani', sans-serif;
      font-size: 20px; font-weight: 700;
      padding: 5px 14px;
      width: 240px; max-width: 100%;
    }
    .role-input {
      font-size: 12px; font-weight: 700;
      padding: 4px 14px;
      width: 180px; max-width: 100%;
      color: var(--cyan);
    }
    .role-wrap { margin-top: 6px; }

    /* ── TOAST ── */
    .toast { position:fixed; bottom:24px; right:24px; z-index:600; background:var(--white); border:1px solid var(--border); border-radius:10px; padding:12px 18px; display:flex; align-items:center; gap:9px; font-size:13px; font-weight:600; color:var(--text); box-shadow:0 8px 32px rgba(0,0,0,.12); transform:translateY(16px); opacity:0; transition:all .26s ease; pointer-events:none; }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast.ok  { border-left:3px solid var(--success); }
    .toast.err { border-left:3px solid var(--danger); }

    ::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-track{background:var(--bg);} ::-webkit-scrollbar-thumb{background:#d0d7e3;border-radius:3px;}
    @media(max-width:900px){ .sidebar{display:none;} .wrapper{margin-left:0;} .content{padding:16px 16px 60px;} .field-row{grid-template-columns:110px 1fr;} }
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
    <a href="{{ route('welcome') }}">Dashboard</a><a href="{{ route('tentang.index') }}">Tentang Kami</a><a href="{{ route('jadwals.index') }}">Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}">Galeri</a><a href="{{ route('khotbah.index') }}">Khotbah</a><a href="{{ route('pelayanan.index') }}">Pelayanan</a><a href="{{ route('kontaks.index') }}">Kontak</a>
  </nav>
  <div class="topbar-right">
    <a href="{{ route('home') }}"><button class="btn-viewsite">🌐 Lihat Website</button></a>
    <div class="topbar-ava" id="topbarAva">A</div>
  </div>
</header>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-user">
    <div class="sidebar-ava" id="sidebarAva">A</div>
    <div class="info">
      <strong id="sidebarName">Admin GBI</strong>
      <span id="sidebarRole">Administrator</span>
    </div>
  </div>
  <div class="sidebar-search"><span style="color:rgba(255,255,255,.4)">🔍</span><input type="text" placeholder="Search..."/></div>
  <div class="nav-section">Menu Utama</div>
  <nav>
    <a href="{{ route('welcome') }}"><span class="ico">⊞</span> Dashboard</a>
    <a href="{{ route('tentang.index') }}"><span class="ico">ℹ</span> Tentang Kami</a>
    <a href="{{ route('jadwals.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}"><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="ico">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}"><span class="ico">🙌</span> Pelayanan</a>
    <a href="{{ route('kontaks.index') }}"><span class="ico">✉</span> Kontak</a>
  </nav>
  <div class="nav-section">Pengaturan</div>
  <nav>
    <a href="{{ route('profil.index') }}" class="active"><span class="ico">👤</span> Profil Saya</a>
    <a href="#"><span class="ico">⚙</span> Pengaturan</a>
    <a href="{{ route('login.perform') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="ico">🚪</span> Keluar</a>
  </nav>
  <div class="sidebar-footer"><strong>Kelompok 5 PA-1</strong>Version 1.0.0</div>
</aside>

<!-- MAIN -->
<div class="wrapper">
  <div class="page-head">
    <h1>Profil Saya</h1>
    <div class="breadcrumb"><a href="#">Home</a> / <span>Profil</span></div>
  </div>

  <div class="content">
    <div class="profile-wrap">

      <!-- ── AVATAR CARD ── -->
      <div class="avatar-card">
        <div class="ava-circle" onclick="document.getElementById('avaFileInput').click()" title="Klik untuk ganti foto">
          <span id="avaInitials">A</span>
          <img id="avaImg" src="" alt="" style="display:none"/>
          <div class="ava-upload-overlay">
            <span>📷</span>
            <p>Ganti Foto</p>
          </div>
        </div>
        <input type="file" id="avaFileInput" class="ava-file-input" accept="image/*" onchange="handleAvaUpload(event)"/>
        <div class="ava-hint">Klik foto untuk menggantinya · JPG, PNG maks. 2MB</div>

        <!-- Nama — klik untuk edit inline -->
        <div class="inline-edit-wrap" id="wrapNamaCard" title="Klik untuk ubah nama">
          <div class="profile-name-display" id="profileNameDisplay" onclick="startInlineEdit('NamaCard')">Admin GBI</div>
          <input class="inline-edit-input name-input" id="inputNamaCard" type="text" value="Admin GBI"
            onblur="saveInlineEdit('NamaCard')"
            onkeydown="if(event.key==='Enter')saveInlineEdit('NamaCard'); if(event.key==='Escape')cancelInlineEdit('NamaCard')"
            style="display:none"/>
        </div>

        <!-- Jabatan / Role — klik untuk edit inline -->
        <div class="inline-edit-wrap role-wrap" id="wrapJabatanCard" title="Klik untuk ubah jabatan">
          <div class="profile-role-display" id="profileRoleDisplay" onclick="startInlineEdit('JabatanCard')">
            <span>●</span> <span id="profileRoleText">Administrator</span>
          </div>
          <input class="inline-edit-input role-input" id="inputJabatanCard" type="text" value="Administrator"
            onblur="saveInlineEdit('JabatanCard')"
            onkeydown="if(event.key==='Enter')saveInlineEdit('JabatanCard'); if(event.key==='Escape')cancelInlineEdit('JabatanCard')"
            style="display:none"/>
        </div>

        <div class="profile-joined">Bergabung sejak Maret 2024</div>
      </div>

      <!-- ── DATA PRIBADI ── -->
      <div class="data-card" id="cardInfo">
        <div class="card-header">
          <div class="card-header-left">
            <div class="ch-ico">👤</div>
            Data Pribadi
          </div>
          <button class="edit-toggle" id="btnEditInfo" onclick="toggleEdit('info')">✏ Edit</button>
        </div>

        <!-- Nama -->
        <div class="field-row">
          <div class="field-label">Nama Lengkap</div>
          <div>
            <div class="field-value" id="vNama">Admin GBI</div>
            <input class="field-input" id="iNama" type="text" value="Admin GBI" placeholder="Nama lengkap"/>
          </div>
        </div>
        <!-- Username -->
        <div class="field-row">
          <div class="field-label">Username</div>
          <div>
            <div class="field-value" id="vUsername">admin_gbi</div>
            <input class="field-input" id="iUsername" type="text" value="admin_gbi" placeholder="Username"/>
          </div>
        </div>
        <!-- Jabatan -->
        <div class="field-row">
          <div class="field-label">Jabatan</div>
          <div>
            <div class="field-value" id="vJabatan">Administrator</div>
            <input class="field-input" id="iJabatan" type="text" value="Administrator" placeholder="Jabatan"/>
          </div>
        </div>
        <!-- Email -->
        <div class="field-row">
          <div class="field-label">Email</div>
          <div>
            <div class="field-value" id="vEmail">admin@gbitambunan.org</div>
            <input class="field-input" id="iEmail" type="email" value="admin@gbitambunan.org" placeholder="Email aktif"/>
          </div>
        </div>
        <!-- Telepon -->
        <div class="field-row">
          <div class="field-label">Telepon</div>
          <div>
            <div class="field-value" id="vPhone">+62 812-3456-7890</div>
            <input class="field-input" id="iPhone" type="tel" value="+62 812-3456-7890" placeholder="Nomor telepon"/>
          </div>
        </div>
        <!-- Lokasi -->
        <div class="field-row">
          <div class="field-label">Lokasi</div>
          <div>
            <div class="field-value" id="vLokasi">Balige, Sumatera Utara</div>
            <input class="field-input" id="iLokasi" type="text" value="Balige, Sumatera Utara" placeholder="Kota, Provinsi"/>
          </div>
        </div>

        <!-- Footer buttons (hidden by default) -->
        <div id="infoFooter" style="display:none; padding:14px 20px; border-top:1px solid var(--border); display:none; justify-content:flex-end; gap:8px;">
          <button class="btn-cancel-sm" onclick="cancelEdit('info')">Batal</button>
          <button class="btn-save-sm"   onclick="saveEdit('info')">💾 Simpan</button>
        </div>
      </div>



    </div><!-- /profile-wrap -->
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
/* ── STATE ── */
const KEY = 'gbi_profile_v1';
function loadProfile() {
  try { const v = localStorage.getItem(KEY); return v ? JSON.parse(v) : null; } catch(e) { return null; }
}
function saveProfile(d) { localStorage.setItem(KEY, JSON.stringify(d)); }

let profile = loadProfile() || {
  nama:'Admin GBI', username:'admin_gbi', jabatan:'Administrator',
  email:'admin@gbitambunan.org', phone:'+62 812-3456-7890',
  lokasi:'Balige, Sumatera Utara', foto:''
};

/* ── INIT ── */
function initUI() {
  set('vNama',    profile.nama);     setVal('iNama',    profile.nama);
  set('vUsername',profile.username); setVal('iUsername',profile.username);
  set('vJabatan', profile.jabatan);  setVal('iJabatan', profile.jabatan);
  set('vEmail',   profile.email);    setVal('iEmail',   profile.email);
  set('vPhone',   profile.phone);    setVal('iPhone',   profile.phone);
  set('vLokasi',  profile.lokasi);   setVal('iLokasi',  profile.lokasi);

  // Avatar card name & role
  set('profileNameDisplay', profile.nama);
  set('profileRoleText',    profile.jabatan);
  setVal('inputNamaCard',    profile.nama);
  setVal('inputJabatanCard', profile.jabatan);

  set('sidebarName', profile.nama);
  set('sidebarRole', profile.jabatan);
  document.getElementById('avaInitials').textContent = initials(profile.nama);

  if (profile.foto) applyAvatar(profile.foto);
}

function set(id, val)    { const el=document.getElementById(id); if(el) el.textContent=val||''; }
function setVal(id, val) { const el=document.getElementById(id); if(el) el.value=val||''; }
function initials(name)  { return (name||'A').split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2); }

/* ── AVATAR UPLOAD ── */
function handleAvaUpload(e) {
  const file = e.target.files[0];
  if (!file) return;
  if (file.size > 2 * 1024 * 1024) { toast('Ukuran file maks. 2MB','err'); return; }
  if (!file.type.startsWith('image/')) { toast('File harus berupa gambar','err'); return; }
  const reader = new FileReader();
  reader.onload = ev => {
    profile.foto = ev.target.result;
    saveProfile(profile);
    applyAvatar(ev.target.result);
    toast('Foto profil berhasil diperbarui ✓','ok');
  };
  reader.readAsDataURL(file);
  e.target.value = '';
}

function applyAvatar(src) {
  const img   = document.getElementById('avaImg');
  const inits = document.getElementById('avaInitials');
  img.src = src; img.style.display = 'block';
  inits.style.display = 'none';
  document.getElementById('topbarAva').innerHTML =
    `<img src="${src}" style="width:100%;height:100%;object-fit:cover;border-radius:50%"/>`;
  document.getElementById('sidebarAva').innerHTML =
    `<img src="${src}" style="width:100%;height:100%;object-fit:cover;"/>`;
}

/* ── INLINE EDIT: nama & jabatan di kartu avatar ── */
function startInlineEdit(key) {
  const isName = key === 'NamaCard';
  const displayId = isName ? 'profileNameDisplay' : 'profileRoleDisplay';
  const inputId   = 'input' + key;

  document.getElementById(displayId).style.display = 'none';
  const inp = document.getElementById(inputId);
  inp.style.display = 'inline-block';
  inp.focus();
  inp.select();
}

function saveInlineEdit(key) {
  const isName  = key === 'NamaCard';
  const inputId = 'input' + key;
  const inp     = document.getElementById(inputId);
  const val     = inp.value.trim();

  if (!val) { cancelInlineEdit(key); return; }

  if (isName) {
    profile.nama = val;
    set('profileNameDisplay', val);
    set('vNama', val); setVal('iNama', val);
    set('sidebarName', val);
    document.getElementById('avaInitials').textContent = initials(val);
    inp.style.display = 'none';
    document.getElementById('profileNameDisplay').style.display = '';
  } else {
    profile.jabatan = val;
    set('profileRoleText', val);
    set('vJabatan', val); setVal('iJabatan', val);
    set('sidebarRole', val);
    inp.style.display = 'none';
    document.getElementById('profileRoleDisplay').style.display = '';
  }

  saveProfile(profile);
  toast('Diperbarui ✓','ok');
}

function cancelInlineEdit(key) {
  const isName    = key === 'NamaCard';
  const displayId = isName ? 'profileNameDisplay' : 'profileRoleDisplay';
  const inputId   = 'input' + key;
  document.getElementById(inputId).style.display  = 'none';
  document.getElementById(displayId).style.display = '';
  // restore original value
  setVal(inputId, isName ? profile.nama : profile.jabatan);
}

/* ── TOGGLE EDIT: INFO CARD ── */
let infoEditing = false;
function toggleEdit(section) {
  infoEditing = !infoEditing;
  const btn    = document.getElementById('btnEditInfo');
  const footer = document.getElementById('infoFooter');

  document.querySelectorAll('#cardInfo .field-value').forEach(el => {
    el.style.display = infoEditing ? 'none' : '';
  });
  document.querySelectorAll('#cardInfo .field-input').forEach(el => {
    el.style.display = infoEditing ? 'block' : 'none';
  });

  footer.style.display = infoEditing ? 'flex' : 'none';
  btn.textContent = infoEditing ? '✕ Batal' : '✏ Edit';
  btn.classList.toggle('saving', infoEditing);

  if (!infoEditing) {
    setVal('iNama',    profile.nama);
    setVal('iUsername',profile.username);
    setVal('iJabatan', profile.jabatan);
    setVal('iEmail',   profile.email);
    setVal('iPhone',   profile.phone);
    setVal('iLokasi',  profile.lokasi);
  }
}

function cancelEdit(section) {
  if (infoEditing) toggleEdit(section);
}

function saveEdit(section) {
  const nama     = document.getElementById('iNama').value.trim();
  const username = document.getElementById('iUsername').value.trim();
  const jabatan  = document.getElementById('iJabatan').value.trim();
  const email    = document.getElementById('iEmail').value.trim();
  const phone    = document.getElementById('iPhone').value.trim();
  const lokasi   = document.getElementById('iLokasi').value.trim();

  if (!nama)  { toast('Nama lengkap wajib diisi','err'); return; }
  if (!email) { toast('Email wajib diisi','err'); return; }

  profile = { ...profile, nama, username, jabatan, email, phone, lokasi };
  saveProfile(profile);

  set('vNama',    nama);
  set('vUsername',username);
  set('vJabatan', jabatan);
  set('vEmail',   email);
  set('vPhone',   phone);
  set('vLokasi',  lokasi);

  // Sync avatar card
  set('profileNameDisplay', nama);
  set('profileRoleText',    jabatan);
  setVal('inputNamaCard',    nama);
  setVal('inputJabatanCard', jabatan);

  set('sidebarName', nama);
  set('sidebarRole', jabatan);
  document.getElementById('avaInitials').textContent = initials(nama);

  infoEditing = false;
  document.querySelectorAll('#cardInfo .field-value').forEach(el => el.style.display = '');
  document.querySelectorAll('#cardInfo .field-input').forEach(el => el.style.display = 'none');
  document.getElementById('infoFooter').style.display = 'none';
  const btn = document.getElementById('btnEditInfo');
  btn.textContent = '✏ Edit';
  btn.classList.remove('saving');

  toast('Data berhasil disimpan ✓','ok');
}

/* ── TOAST ── */
function toast(msg, type='ok') {
  const t = document.getElementById('toast');
  t.textContent = (type==='ok' ? '✅ ' : '⚠️ ') + msg;
  t.className = 'toast ' + type;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 3000);
}

initUI();
</script>
</body>
</html>