<?php
// resources/views/pelayanan/index.php
// Untuk Laravel: rename ke index.blade.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pelayanan – Admin GBI Tambunan</title>
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
      --pink:       #ec4899;
      --pink-lt:    #fdf2f8;
      --sidebar:    #1e2430;
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:var(--bg); font-family:'Nunito',sans-serif; color:var(--text); min-height:100vh; }

    /* ─── TOPBAR ─── */
    .topbar { position:fixed; top:0; left:0; right:0; z-index:200; height:56px; display:flex; align-items:center; justify-content:space-between; padding:0 20px 0 0; background:var(--white); border-bottom:1px solid var(--border); box-shadow:0 1px 8px rgba(0,0,0,.06); }
    .topbar-left { display:flex; align-items:center; width:240px; height:100%; flex-shrink:0; background:var(--sidebar); padding:0 18px; }
    .hamburger { background:none; border:none; color:rgba(255,255,255,.5); font-size:20px; cursor:pointer; margin-right:12px; transition:color .15s; }
    .hamburger:hover { color:#fff; }
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
    .avatar { width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg,var(--gold),var(--cyan)); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:700; color:#fff; cursor:pointer; }

    /* ─── SIDEBAR ─── */
    .sidebar { position:fixed; top:56px; left:0; bottom:0; width:240px; background:var(--sidebar); display:flex; flex-direction:column; overflow-y:auto; z-index:100; }
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
    .page-hero { position:relative; overflow:hidden; border-radius:16px; margin-bottom:28px; background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0); padding:36px 40px; box-shadow:0 6px 24px rgba(29,168,224,.25); }
    .page-hero::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%), radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%); pointer-events:none; }
    .hero-tag { display:inline-block; background:rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; padding:4px 12px; border-radius:20px; margin-bottom:12px; }
    .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:28px; font-weight:700; color:#fff; margin-bottom:8px; }
    .page-hero p  { color:rgba(255,255,255,.8); font-size:14px; max-width:520px; line-height:1.65; }
    .hero-actions { margin-top:20px; display:flex; gap:10px; flex-wrap:wrap; }
    .btn-hero-primary { background:#fff; color:var(--cyan); border:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(0,0,0,.1); }
    .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); }
    .btn-hero-outline { background:rgba(255,255,255,.15); color:#fff; border:1px solid rgba(255,255,255,.4); font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; }
    .btn-hero-outline:hover { background:rgba(255,255,255,.25); }

    /* ─── STATS ─── */
    .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:26px; }
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
    .section-title { font-family:'Rajdhani',sans-serif; font-size:18px; font-weight:700; color:var(--text); letter-spacing:.4px; display:flex; align-items:center; gap:10px; flex:1; margin-bottom:0; }
    .section-title::after { content:''; flex:1; height:1px; background:var(--border); }
    .add-btn { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700; padding:8px 16px; border-radius:7px; cursor:pointer; transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
    .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }
    .edit-btn { display:inline-flex; align-items:center; gap:6px; background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.25); font-family:'Nunito',sans-serif; font-size:12px; font-weight:700; padding:6px 14px; border-radius:7px; cursor:pointer; transition:all .15s; }
    .edit-btn:hover { background:var(--cyan); color:#fff; }

    /* ─── KEPEMIMPINAN ─── */
    .leader-row { display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:16px; margin-bottom:28px; }
    .leader-card { background:var(--white); border:1px solid var(--border); border-radius:13px; padding:24px 18px; text-align:center; box-shadow:0 1px 5px rgba(0,0,0,.05); transition:transform .2s,box-shadow .2s; animation:fadeUp .4s ease both; }
    .leader-card:hover { transform:translateY(-3px); box-shadow:0 8px 22px rgba(0,0,0,.09); }
    .leader-avatar { width:68px; height:68px; border-radius:50%; margin:0 auto 14px; background:linear-gradient(135deg,var(--cyan-lt),var(--cyan)); display:flex; align-items:center; justify-content:center; font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; color:var(--cyan-dk); border:3px solid var(--border); overflow:hidden; position:relative; cursor:pointer; transition:all .2s; }
    .leader-avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
    .leader-avatar:hover .ava-overlay { opacity:1; }
    .ava-overlay { position:absolute; inset:0; border-radius:50%; background:rgba(15,22,40,.55); display:flex; flex-direction:column; align-items:center; justify-content:center; opacity:0; transition:opacity .2s; gap:2px; }
    .ava-overlay span { font-size:16px; }
    .ava-overlay p { font-size:8px; font-weight:700; color:#fff; letter-spacing:.3px; }
    .leader-name  { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:var(--text); margin-bottom:3px; }
    .leader-role  { font-size:11px; color:var(--muted); margin-bottom:12px; }
    .leader-card-actions { display:flex; gap:6px; justify-content:center; }
    .act-sm { border:none; border-radius:6px; cursor:pointer; font-family:'Nunito',sans-serif; font-size:11px; font-weight:700; padding:5px 11px; transition:all .15s; }
    .btn-e { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.2); }
    .btn-e:hover { background:var(--cyan); color:#fff; }
    .btn-d { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.2); }
    .btn-d:hover { background:var(--danger); color:#fff; }

    /* ─── TIM PELAYANAN ─── */
    .tim-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-bottom:28px; }
    .tim-card { background:var(--white); border:1px solid var(--border); border-radius:13px; padding:22px 20px; box-shadow:0 1px 5px rgba(0,0,0,.05); transition:transform .2s,box-shadow .2s; animation:fadeUp .4s ease both; position:relative; overflow:hidden; }
    .tim-card::before { content:''; position:absolute; top:0; left:0; right:0; height:3px; border-radius:13px 13px 0 0; }
    .tim-card.c::before{background:linear-gradient(90deg,var(--cyan),#29c4f0)}
    .tim-card.g::before{background:linear-gradient(90deg,var(--gold),#f0c050)}
    .tim-card.s::before{background:linear-gradient(90deg,var(--success),#4cdb8f)}
    .tim-card.r::before{background:linear-gradient(90deg,var(--danger),#ff7a7a)}
    .tim-card.p::before{background:linear-gradient(90deg,var(--purple),#a78bfa)}
    .tim-card.o::before{background:linear-gradient(90deg,var(--orange),#fbbf24)}
    .tim-card.pk::before{background:linear-gradient(90deg,var(--pink),#f9a8d4)}
    .tim-card:hover { transform:translateY(-3px); box-shadow:0 8px 22px rgba(0,0,0,.09); }
    .tim-icon { width:48px; height:48px; border-radius:50%; margin:0 auto 12px; display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:700; font-family:'Rajdhani',sans-serif; }
    .tim-card.c .tim-icon{background:var(--cyan-lt);color:var(--cyan)}
    .tim-card.g .tim-icon{background:var(--gold-lt);color:var(--gold)}
    .tim-card.s .tim-icon{background:var(--success-lt);color:var(--success)}
    .tim-card.r .tim-icon{background:var(--danger-lt);color:var(--danger)}
    .tim-card.p .tim-icon{background:var(--purple-lt);color:var(--purple)}
    .tim-card.o .tim-icon{background:var(--orange-lt);color:var(--orange)}
    .tim-card.pk .tim-icon{background:var(--pink-lt);color:var(--pink)}
    .tim-name { font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700; color:var(--text); text-align:center; margin-bottom:4px; }
    .tim-desc { font-size:12px; color:var(--muted); text-align:center; margin-bottom:14px; line-height:1.5; }
    .tim-divider { border:none; border-top:1px solid var(--border); margin-bottom:12px; }
    .anggota-label { font-size:10px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:var(--muted); margin-bottom:8px; }
    .anggota-list { display:flex; flex-direction:column; gap:5px; margin-bottom:14px; }
    .anggota-row { display:flex; align-items:center; justify-content:space-between; font-size:12.5px; }
    .anggota-nama { color:var(--text); font-weight:600; }
    .anggota-peran {
      font-size:10.5px; font-weight:700; padding:2px 9px; border-radius:20px; letter-spacing:.3px;
    }
    .tim-card.c .anggota-peran{background:var(--cyan-lt);color:var(--cyan)}
    .tim-card.g .anggota-peran{background:var(--gold-lt);color:var(--gold)}
    .tim-card.s .anggota-peran{background:var(--success-lt);color:var(--success)}
    .tim-card.r .anggota-peran{background:var(--danger-lt);color:var(--danger)}
    .tim-card.p .anggota-peran{background:var(--purple-lt);color:var(--purple)}
    .tim-card.o .anggota-peran{background:var(--orange-lt);color:var(--orange)}
    .tim-card.pk .anggota-peran{background:var(--pink-lt);color:var(--pink)}
    .tim-footer { display:flex; gap:6px; justify-content:flex-end; }

    /* ─── DAFTAR BTN ─── */
    .daftar-wrap { text-align:center; margin:4px 0 28px; }
    .btn-daftar { display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; border:none; font-family:'Nunito',sans-serif; font-size:13.5px; font-weight:700; padding:11px 28px; border-radius:30px; cursor:pointer; transition:all .2s; box-shadow:0 4px 14px rgba(29,168,224,.3); letter-spacing:.3px; }
    .btn-daftar:hover { transform:translateY(-2px); box-shadow:0 8px 22px rgba(29,168,224,.4); }

    /* ─── GALERI AKSI ─── */
    .galeri-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
    .galeri-card { background:var(--white); border:1px solid var(--border); border-radius:12px; overflow:hidden; box-shadow:0 1px 5px rgba(0,0,0,.05); transition:transform .2s,box-shadow .2s; animation:fadeUp .4s ease both; }
    .galeri-card:hover { transform:translateY(-3px); box-shadow:0 8px 22px rgba(0,0,0,.09); }
    .galeri-img { width:100%; height:160px; object-fit:cover; background:linear-gradient(135deg,var(--cyan-lt),var(--border)); display:flex; align-items:center; justify-content:center; font-size:36px; color:var(--muted); position:relative; overflow:hidden; cursor:pointer; }
    .galeri-img img { width:100%; height:160px; object-fit:cover; display:block; }
    .galeri-img:hover .gimg-overlay { opacity:1; }
    .gimg-overlay { position:absolute; inset:0; background:rgba(15,22,40,.55); display:flex; flex-direction:column; align-items:center; justify-content:center; opacity:0; transition:opacity .2s; gap:4px; }
    .gimg-overlay span { font-size:22px; }
    .gimg-overlay p { font-size:10px; font-weight:700; color:#fff; letter-spacing:.3px; }

    /* Drop zone in modal */
    .photo-drop { border:2px dashed var(--border2); border-radius:9px; padding:20px; text-align:center; cursor:pointer; transition:all .18s; background:var(--bg); margin-bottom:13px; position:relative; }
    .photo-drop:hover,.photo-drop.drag { border-color:var(--cyan); background:var(--cyan-lt); }
    .photo-drop .pd-icon { font-size:26px; margin-bottom:6px; }
    .photo-drop p { font-size:12.5px; color:var(--muted); }
    .photo-drop span { color:var(--cyan); font-weight:700; }
    .photo-drop input[type=file] { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; }
    .photo-drop .pd-preview { width:100%; height:120px; object-fit:cover; border-radius:7px; margin-top:10px; display:none; border:1px solid var(--border); }
    .galeri-body { padding:14px 16px; }
    .galeri-title { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:var(--text); margin-bottom:4px; }
    .galeri-desc  { font-size:12px; color:var(--muted); line-height:1.55; margin-bottom:10px; }
    .galeri-footer { display:flex; gap:6px; justify-content:flex-end; }

    /* ─── MODAL ─── */
    .overlay { display:none; position:fixed; inset:0; z-index:300; background:rgba(26,34,51,.45); backdrop-filter:blur(4px); align-items:center; justify-content:center; }
    .overlay.open { display:flex; }
    .modal { background:var(--white); border:1px solid var(--border); border-radius:14px; padding:28px; width:560px; max-width:94vw; box-shadow:0 20px 60px rgba(0,0,0,.15); animation:mIn .22s ease; max-height:90vh; overflow-y:auto; }
    @keyframes mIn { from{opacity:0;transform:translateY(12px) scale(.97)} to{opacity:1;transform:translateY(0) scale(1)} }
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
    .modal-foot { display:flex; justify-content:flex-end; gap:10px; margin-top:6px; }
    .btn-cancel { background:#f0f2f5; border:1px solid var(--border); color:var(--muted); font-family:'Nunito',sans-serif; font-size:13px; font-weight:600; padding:9px 18px; border-radius:7px; cursor:pointer; transition:all .14s; }
    .btn-cancel:hover { color:var(--text); background:var(--border); }
    .btn-save { background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); border:none; color:#fff; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 22px; border-radius:7px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
    .btn-save:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); }

    /* Anggota builder inside modal */
    .anggota-builder { border:1px solid var(--border); border-radius:8px; padding:12px; background:var(--bg); margin-bottom:13px; }
    .anggota-builder-title { font-size:10.5px; font-weight:700; letter-spacing:.8px; text-transform:uppercase; color:var(--muted); margin-bottom:10px; }
    .anggota-row-input { display:grid; grid-template-columns:1fr 1fr auto; gap:8px; margin-bottom:7px; align-items:center; }
    .anggota-row-input input { background:var(--white); border:1px solid var(--border); color:var(--text); font-family:'Nunito',sans-serif; font-size:12.5px; padding:7px 10px; border-radius:6px; outline:none; transition:border-color .15s; }
    .anggota-row-input input:focus { border-color:var(--cyan); }
    .btn-rm-anggota { background:var(--danger-lt); border:1px solid rgba(224,85,85,.2); color:var(--danger); border-radius:6px; cursor:pointer; font-size:13px; width:28px; height:28px; display:flex; align-items:center; justify-content:center; flex-shrink:0; transition:all .14s; }
    .btn-rm-anggota:hover { background:var(--danger); color:#fff; }
    .btn-add-anggota { background:var(--cyan-lt); border:1px solid rgba(29,168,224,.2); color:var(--cyan); font-family:'Nunito',sans-serif; font-size:12px; font-weight:700; padding:6px 14px; border-radius:6px; cursor:pointer; transition:all .14s; }
    .btn-add-anggota:hover { background:var(--cyan); color:#fff; }

    /* ─── TOAST ─── */
    .toast { position:fixed; bottom:24px; right:24px; z-index:400; background:var(--white); border:1px solid var(--border); border-radius:10px; padding:13px 20px; display:flex; align-items:center; gap:10px; font-size:13px; font-weight:600; color:var(--text); box-shadow:0 8px 32px rgba(0,0,0,.12); transform:translateY(16px); opacity:0; transition:all .28s ease; pointer-events:none; }
    .toast.show { transform:translateY(0); opacity:1; }
    .toast.ok  { border-left:3px solid var(--success); }
    .toast.err { border-left:3px solid var(--danger); }

    ::-webkit-scrollbar { width:5px; }
    ::-webkit-scrollbar-track { background:var(--bg); }
    ::-webkit-scrollbar-thumb { background:var(--border2); border-radius:3px; }
    ::-webkit-scrollbar-thumb:hover { background:#b0b8c9; }

    @media(max-width:1100px) { .tim-grid { grid-template-columns:1fr 1fr; } .galeri-grid { grid-template-columns:1fr 1fr; } }
    @media(max-width:900px)  { .sidebar{display:none;} .wrapper{margin-left:0;} .tim-grid,.galeri-grid{grid-template-columns:1fr;} .stats-row{grid-template-columns:1fr 1fr;} }

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
    <a href="{{ route('pelayanan.index') }}" class="active">Pelayanan</a>
    <a href="{{ route('kontaks.index') }}" >Kontak</a>
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
    <a href="{{ route('jadwals.index') }}"><span class="ico">📅</span> Jadwal Ibadah</a>
    <a href="{{ route('galeris.index') }}"><span class="ico">🖼</span> Galeri</a>
    <a href="{{ route('khotbah.index') }}"><span class="ico">🎙</span> Khotbah</a>
    <a href="{{ route('pelayanan.index') }}" class="active"><span class="ico">🙌</span> Pelayanan</a>
    <a href="{{ route('kontaks.index') }}" ><span class="ico">✉</span> Kontak</a>
  </nav>
  <div class="nav-section">Pengaturan</div>
  <nav>
    <a href="{{ route('profil.index') }}"><span class="ico">👤</span> Profil Admin</a>
    <a href="#"><span class="ico">⚙</span> Pengaturan</a>
    <a href="#"><span class="ico">🚪</span> Keluar</a>
  </nav>
  <div class="sidebar-footer"><strong>Kelompok 5 PA-1</strong>Version 1.0.0</div>
</aside>

<!-- WRAPPER -->
<div class="wrapper">
  <div class="content-header">
    <h1>Pelayanan & Komunitas</h1>
    <div class="breadcrumb-bar"><a href="#">Home</a> / <span>Pelayanan</span></div>
  </div>

  <div class="content">

    <!-- HERO -->
    <div class="page-hero">
      <div class="hero-tag">🙌 Pelayanan</div>
      <h2>Pelayanan & Komunitas</h2>
      <p>Bergabunglah dalam pelayanan dan temukan tempat Anda untuk melayani Tuhan. Kelola tim, anggota, dan dokumentasi pelayanan dari sini.</p>
      <div class="hero-actions">
        <button class="btn-hero-primary" onclick="openModal('pemimpin')">＋ Tambah Pemimpin</button>
        <button class="btn-hero-outline" onclick="openModal('tim')">＋ Tambah Tim</button>
        <button class="btn-hero-outline" onclick="openModal('galeri')">🖼 Tambah Foto</button>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-row">
      <div class="stat-card"><div class="stat-icon ic">👤</div><div><div class="stat-val vc" id="statPemimpin">2</div><div class="stat-lbl">Pemimpin</div></div></div>
      <div class="stat-card"><div class="stat-icon ig">🙌</div><div><div class="stat-val vg" id="statTim">6</div><div class="stat-lbl">Tim Pelayanan</div></div></div>
      <div class="stat-card"><div class="stat-icon is">👥</div><div><div class="stat-val vs" id="statAnggota">0</div><div class="stat-lbl">Total Anggota</div></div></div>
      <div class="stat-card"><div class="stat-icon ip">🖼</div><div><div class="stat-val vp" id="statFoto">6</div><div class="stat-lbl">Foto Dokumentasi</div></div></div>
    </div>

    <!-- ══ KEPEMIMPINAN ══ -->
    <div class="section-head">
      <div class="section-title">👤 Kepemimpinan</div>
      <button class="add-btn" onclick="openModal('pemimpin')">＋ Tambah Pemimpin</button>
    </div>
    <div class="leader-row" id="leaderGrid"></div>

    <!-- ══ TIM PELAYANAN ══ -->
    <div class="section-head">
      <div class="section-title">🙌 Tim Pelayanan</div>
      <button class="add-btn" onclick="openModal('tim')">＋ Tambah Tim</button>
    </div>
    <div class="tim-grid" id="timGrid"></div>

    <!-- Daftar -->
    <div class="daftar-wrap">
      <button class="btn-daftar">🙏 Bergabung dengan Pelayanan</button>
    </div>

    <!-- ══ PELAYANAN DALAM AKSI ══ -->
    <div class="section-head">
      <div class="section-title">🖼 Pelayanan dalam Aksi</div>
      <button class="add-btn" onclick="openModal('galeri')">＋ Tambah Foto</button>
    </div>
    <div class="galeri-grid" id="galeriGrid"></div>

  </div>
</div>

<!-- ══ MODAL: PEMIMPIN ══ -->
<div class="overlay" id="modalPemimpin">
  <div class="modal">
    <div class="modal-head">
      <h3 id="titlePemimpin">➕ Tambah <span>Pemimpin</span></h3>
      <button class="close-btn" onclick="closeAll()">✕</button>
    </div>
    <div class="form-row">
      <div class="fg"><label>Nama Lengkap *</label><input id="pNama" type="text" placeholder="cth. Pdm. Roberto Sibarani"/></div>
      <div class="fg"><label>Jabatan *</label><input id="pJabatan" type="text" placeholder="cth. Gembala Sidang"/></div>
    </div>
    <div class="fg"><label>Nama Pendek *</label><input id="pPendek" type="text" placeholder="cth. Pdm. Roberto Sibarani, M.Th"/></div>
    <div class="fg"><label>Inisial Avatar (maks 2 huruf)</label><input id="pInisial" maxlength="2" type="text" placeholder="cth. RS" style="text-transform:uppercase"/></div>

    <!-- Upload foto pemimpin -->
    <div class="photo-drop" id="pdPemimpin">
      <div class="pd-icon">📷</div>
      <p>Klik atau drag foto pemimpin · <span>JPG/PNG maks 2MB</span></p>
      <input type="file" id="pFotoInput" accept="image/*" onchange="onPFoto(event)"/>
      <img id="pFotoPreview" class="pd-preview"/>
    </div>

    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeAll()">Batal</button>
      <button class="btn-save" onclick="savePemimpin()">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: TIM ══ -->
<div class="overlay" id="modalTim">
  <div class="modal">
    <div class="modal-head">
      <h3 id="titleTim">➕ Tambah <span>Tim Pelayanan</span></h3>
      <button class="close-btn" onclick="closeAll()">✕</button>
    </div>
    <div class="form-row">
      <div class="fg"><label>Nama Tim *</label><input id="tNama" type="text" placeholder="cth. Tim Musik"/></div>
      <div class="fg">
        <label>Warna Aksen</label>
        <select id="tWarna">
          <option value="c">Biru Cyan</option>
          <option value="g">Gold</option>
          <option value="s">Hijau</option>
          <option value="r">Merah</option>
          <option value="p">Ungu</option>
          <option value="o">Orange</option>
          <option value="pk">Pink</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="fg"><label>Ikon (emoji)</label><input id="tIkon" maxlength="4" type="text" placeholder="cth. 🎵"/></div>
      <div class="fg"><label>Deskripsi Singkat</label><input id="tDesc" type="text" placeholder="cth. Melayani dalam pujian"/></div>
    </div>
    <div class="anggota-builder">
      <div class="anggota-builder-title">Anggota Tim</div>
      <div id="anggotaInputs"></div>
      <button class="btn-add-anggota" onclick="addAnggotaRow()">＋ Tambah Anggota</button>
    </div>
    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeAll()">Batal</button>
      <button class="btn-save" onclick="saveTim()">💾 Simpan</button>
    </div>
  </div>
</div>

<!-- ══ MODAL: GALERI ══ -->
<div class="overlay" id="modalGaleri">
  <div class="modal">
    <div class="modal-head">
      <h3 id="titleGaleri">🖼 Tambah <span>Foto</span></h3>
      <button class="close-btn" onclick="closeAll()">✕</button>
    </div>
    <div class="fg"><label>Judul Foto *</label><input id="gJudul" type="text" placeholder="cth. Baptisan di Danau Toba"/></div>
    <div class="fg"><label>Deskripsi</label><textarea id="gDesc" rows="2" placeholder="Keterangan singkat..."></textarea></div>
    <div class="fg"><label>Ikon (emoji, tampil jika tidak ada foto)</label><input id="gIkon" maxlength="4" type="text" placeholder="cth. 💧"/></div>

    <!-- Upload foto galeri -->
    <div class="photo-drop" id="pdGaleri">
      <div class="pd-icon">🖼</div>
      <p>Klik atau drag foto · <span>JPG/PNG maks 5MB</span></p>
      <input type="file" id="gFotoInput" accept="image/*" onchange="onGFoto(event)"/>
      <img id="gFotoPreview" class="pd-preview"/>
    </div>

    <div class="modal-foot">
      <button class="btn-cancel" onclick="closeAll()">Batal</button>
      <button class="btn-save" onclick="saveGaleri()">💾 Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
const KP='gbi_pel_pemimpin', KT='gbi_pel_tim', KG='gbi_pel_galeri', KN='gbi_pel_nextid';

const DEF_PEMIMPIN = [
  { id:1, nama:'Pdm. Roberto Sibarani, M.Th', pendek:'Pdm. Roberto Sibarani, M.Th', jabatan:'Gembala Sidang', inisial:'RS' },
  { id:2, nama:'Sheba Purba',                 pendek:'Sheba Purba',                 jabatan:'Ibu Gembala',    inisial:'SP' },
];
const DEF_TIM = [
  { id:3,  nama:'Tim Musik',          ikon:'🎵', desc:'Melayani dalam pujian dan penyembahan', warna:'c', anggota:[{nama:'Anna Hudson',peran:'Singer'},{nama:'Budi Simamora',peran:'Singer'},{nama:'Mustafa',peran:'Pianist'},{nama:'Yordan',peran:'Bassist'}] },
  { id:4,  nama:'Tim Multimedia',     ikon:'💻', desc:'Mengelola teknologi dan media ibadah',  warna:'s', anggota:[{nama:'Jevrensi Siregar',peran:'Multimedia'},{nama:'Claudia Naomi',peran:'Multimedia'}] },
  { id:5,  nama:'Tim Tamborin',       ikon:'🥁', desc:'Melayani dalam tarian pujian',          warna:'g', anggota:[{nama:'Indah Siregar',peran:'Tamborin'},{nama:'Nita Napitupulu',peran:'Tamborin'}] },
  { id:6,  nama:'Tim Worship Leader', ikon:'🎤', desc:'Memimpin puji dan penyembahan',         warna:'p', anggota:[{nama:'Lika Naomi Sibarani',peran:'WL'},{nama:'Tasya',peran:'WL'},{nama:'Noa Manurung',peran:'WL'}] },
  { id:7,  nama:'Tim Singer',         ikon:'🎙', desc:'Melayani sebagai penyanyi latar',       warna:'r', anggota:[{nama:'Pau Ortu',peran:'Singer'},{nama:'Doris',peran:'Singer'},{nama:'Eva Riner',peran:'Singer'},{nama:'Ruth',peran:'Singer'}] },
  { id:8,  nama:'Sekolah Minggu',     ikon:'📚', desc:'Pelayanan anak-anak dengan pengajaran firman Tuhan', warna:'o', anggota:[{nama:'Ibu Rosel',peran:'Guru Sekolah Minggu'}] },
];
const DEF_GALERI = [
  { id:9,  judul:'Baptisan di Danau Toba',    desc:'Momen istimewa saat anggota baru menerima baptisan di danau.',         ikon:'💧' },
  { id:10, judul:'Ibadah Minggu',              desc:'Kebersamaan dalam ibadah setiap hari Minggu.',                          ikon:'⛪' },
  { id:11, judul:'Rapat Doa – Pemahaman Firman',desc:'Pembelajaran mendalam tentang firman Tuhan.',                          ikon:'📖' },
  { id:12, judul:'Pelayanan Sosial Bencana',  desc:'Berbagi kasih kepada sesama melalui pelayanan sosial.',                  ikon:'🤝' },
  { id:13, judul:'Acara Anak Tambunan',       desc:'Kegembiraan anak-anak dalam acara gereja.',                              ikon:'👧' },
  { id:14, judul:'Pengurus Jemaat',           desc:'Tim pengurus yang setia dan berdedikasi melayani Tuhan.',                ikon:'👥' },
];

function load(k,d){ try{ const v=localStorage.getItem(k); return v?JSON.parse(v):null; }catch(e){return null;} }
function save(k,v){ localStorage.setItem(k,JSON.stringify(v)); }
function esc(s){ return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'); }

let pemimpin = load(KP)||JSON.parse(JSON.stringify(DEF_PEMIMPIN));
let tims     = load(KT)||JSON.parse(JSON.stringify(DEF_TIM));
let galeris  = load(KG)||JSON.parse(JSON.stringify(DEF_GALERI));
let nextId   = parseInt(localStorage.getItem(KN)||'15');
let editPId=null, editTId=null, editGId=null;

/* ── RENDER ALL ── */
function renderAll(){ renderPemimpin(); renderTim(); renderGaleri(); updateStats(); }

function renderPemimpin(){
  const g = document.getElementById('leaderGrid');
  g.innerHTML = pemimpin.length ? pemimpin.map((p,i)=>{
    const avaContent = p.foto
      ? `<img src="${p.foto}" alt="${esc(p.nama)}"/>`
      : esc(p.inisial||p.nama.slice(0,2).toUpperCase());
    return `
    <div class="leader-card" style="animation-delay:${i*.07}s">
      <div class="leader-avatar" onclick="triggerPFoto(${p.id})" title="Klik untuk ganti foto">
        ${avaContent}
        <div class="ava-overlay"><span>📷</span><p>Ganti Foto</p></div>
      </div>
      <div class="leader-name">${esc(p.pendek||p.nama)}</div>
      <div class="leader-role">${esc(p.jabatan)}</div>
      <div class="leader-card-actions">
        <button class="act-sm btn-e" onclick="openEditPemimpin(${p.id})">✏ Edit</button>
        <button class="act-sm btn-d" onclick="delPemimpin(${p.id})">🗑 Hapus</button>
      </div>
    </div>`}).join('')
  : '<div style="grid-column:1/-1;text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);border:1px dashed var(--border);border-radius:12px;">Belum ada pemimpin.</div>';
}

function renderTim(){
  const g = document.getElementById('timGrid');
  g.innerHTML = tims.length ? tims.map((t,i)=>`
    <div class="tim-card ${esc(t.warna)}" style="animation-delay:${i*.06}s">
      <div class="tim-icon">${esc(t.ikon||'🙌')}</div>
      <div class="tim-name">${esc(t.nama)}</div>
      <div class="tim-desc">${esc(t.desc)}</div>
      <hr class="tim-divider"/>
      <div class="anggota-label">Anggota Tim</div>
      <div class="anggota-list">
        ${(t.anggota||[]).slice(0,4).map(a=>`
          <div class="anggota-row">
            <span class="anggota-nama">${esc(a.nama)}</span>
            <span class="anggota-peran">${esc(a.peran)}</span>
          </div>`).join('')}
        ${(t.anggota||[]).length>4?`<div style="font-size:11px;color:var(--muted);text-align:right;">+${t.anggota.length-4} lainnya</div>`:''}
      </div>
      <div class="tim-footer">
        <button class="act-sm btn-e" onclick="openEditTim(${t.id})">✏ Edit</button>
        <button class="act-sm btn-d" onclick="delTim(${t.id})">🗑 Hapus</button>
      </div>
    </div>`).join('')
  : '<div style="grid-column:1/-1;text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);border:1px dashed var(--border);border-radius:12px;">Belum ada tim pelayanan.</div>';
}

function renderGaleri(){
  const g = document.getElementById('galeriGrid');
  g.innerHTML = galeris.length ? galeris.map((f,i)=>{
    const imgContent = f.foto
      ? `<img src="${f.foto}" alt="${esc(f.judul)}"/>`
      : esc(f.ikon||'🖼');
    return `
    <div class="galeri-card" style="animation-delay:${i*.06}s">
      <div class="galeri-img" onclick="triggerGFoto(${f.id})" title="Klik untuk ganti foto">
        ${imgContent}
        <div class="gimg-overlay"><span>📷</span><p>Ganti Foto</p></div>
      </div>
      <div class="galeri-body">
        <div class="galeri-title">${esc(f.judul)}</div>
        <div class="galeri-desc">${esc(f.desc)}</div>
        <div class="galeri-footer">
          <button class="act-sm btn-e" onclick="openEditGaleri(${f.id})">✏ Edit</button>
          <button class="act-sm btn-d" onclick="delGaleri(${f.id})">🗑 Hapus</button>
        </div>
      </div>
    </div>`}).join('')
  : '<div style="grid-column:1/-1;text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);border:1px dashed var(--border);border-radius:12px;">Belum ada foto dokumentasi.</div>';
}

function updateStats(){
  document.getElementById('statPemimpin').textContent = pemimpin.length;
  document.getElementById('statTim').textContent      = tims.length;
  document.getElementById('statAnggota').textContent  = tims.reduce((s,t)=>s+(t.anggota||[]).length,0);
  document.getElementById('statFoto').textContent     = galeris.length;
}

/* ── Helpers reset drop zone ── */
function resetPDrop(){
  document.getElementById('pFotoPreview').style.display='none';
  document.getElementById('pFotoPreview').src='';
  document.getElementById('pFotoInput').value='';
  document.getElementById('pdPemimpin').querySelector('.pd-icon').style.display='';
  document.querySelectorAll('#pdPemimpin p').forEach(e=>e.style.display='');
  _pFoto=null;
}
function resetGDrop(){
  document.getElementById('gFotoPreview').style.display='none';
  document.getElementById('gFotoPreview').src='';
  document.getElementById('gFotoInput').value='';
  document.getElementById('pdGaleri').querySelector('.pd-icon').style.display='';
  document.querySelectorAll('#pdGaleri p').forEach(e=>e.style.display='');
  _gFoto=null;
}
function showPPreview(src){
  document.getElementById('pFotoPreview').src=src;
  document.getElementById('pFotoPreview').style.display='block';
  document.getElementById('pdPemimpin').querySelector('.pd-icon').style.display='none';
  document.querySelectorAll('#pdPemimpin p').forEach(e=>e.style.display='none');
}
function showGPreview(src){
  document.getElementById('gFotoPreview').src=src;
  document.getElementById('gFotoPreview').style.display='block';
  document.getElementById('pdGaleri').querySelector('.pd-icon').style.display='none';
  document.querySelectorAll('#pdGaleri p').forEach(e=>e.style.display='none');
}

/* ── MODAL: OPEN ── */
function openModal(type){
  if(type==='pemimpin'){
    editPId=null;
    document.getElementById('titlePemimpin').innerHTML='➕ Tambah <span>Pemimpin</span>';
    ['pNama','pJabatan','pPendek','pInisial'].forEach(id=>document.getElementById(id).value='');
    resetPDrop();
    document.getElementById('modalPemimpin').classList.add('open');
  } else if(type==='tim'){
    editTId=null;
    document.getElementById('titleTim').innerHTML='➕ Tambah <span>Tim Pelayanan</span>';
    ['tNama','tIkon','tDesc'].forEach(id=>document.getElementById(id).value='');
    document.getElementById('tWarna').value='c';
    document.getElementById('anggotaInputs').innerHTML='';
    addAnggotaRow();
    document.getElementById('modalTim').classList.add('open');
  } else {
    editGId=null;
    document.getElementById('titleGaleri').innerHTML='🖼 Tambah <span>Foto</span>';
    ['gJudul','gDesc','gIkon'].forEach(id=>document.getElementById(id).value='');
    resetGDrop();
    document.getElementById('modalGaleri').classList.add('open');
  }
}

function openEditPemimpin(id){
  const p=pemimpin.find(x=>x.id===id); if(!p) return;
  editPId=id;
  document.getElementById('titlePemimpin').innerHTML='✏ Edit <span>Pemimpin</span>';
  document.getElementById('pNama').value    = p.nama;
  document.getElementById('pJabatan').value = p.jabatan;
  document.getElementById('pPendek').value  = p.pendek||p.nama;
  document.getElementById('pInisial').value = p.inisial||'';
  if(p.foto){ _pFoto=p.foto; showPPreview(p.foto); } else resetPDrop();
  document.getElementById('modalPemimpin').classList.add('open');
}

function openEditTim(id){
  const t=tims.find(x=>x.id===id); if(!t) return;
  editTId=id;
  document.getElementById('titleTim').innerHTML='✏ Edit <span>Tim Pelayanan</span>';
  document.getElementById('tNama').value  = t.nama;
  document.getElementById('tIkon').value  = t.ikon||'';
  document.getElementById('tDesc').value  = t.desc||'';
  document.getElementById('tWarna').value = t.warna||'c';
  const ai = document.getElementById('anggotaInputs');
  ai.innerHTML='';
  (t.anggota||[]).forEach(a=>addAnggotaRow(a.nama,a.peran));
  if(!(t.anggota||[]).length) addAnggotaRow();
  document.getElementById('modalTim').classList.add('open');
}

function openEditGaleri(id){
  const f=galeris.find(x=>x.id===id); if(!f) return;
  editGId=id;
  document.getElementById('titleGaleri').innerHTML='✏ Edit <span>Foto</span>';
  document.getElementById('gJudul').value = f.judul;
  document.getElementById('gDesc').value  = f.desc||'';
  document.getElementById('gIkon').value  = f.ikon||'';
  if(f.foto){ _gFoto=f.foto; showGPreview(f.foto); } else resetGDrop();
  document.getElementById('modalGaleri').classList.add('open');
}

function closeAll(){
  ['modalPemimpin','modalTim','modalGaleri'].forEach(id=>document.getElementById(id).classList.remove('open'));
  editPId=editTId=editGId=null;
  resetPDrop(); resetGDrop();
}

/* ── ANGGOTA ROWS ── */
function addAnggotaRow(nama='',peran=''){
  const wrap=document.getElementById('anggotaInputs');
  const div=document.createElement('div');
  div.className='anggota-row-input';
  div.innerHTML=`
    <input type="text" placeholder="Nama anggota" value="${esc(nama)}" class="ar-nama"/>
    <input type="text" placeholder="Peran / jabatan" value="${esc(peran)}" class="ar-peran"/>
    <button class="btn-rm-anggota" onclick="this.closest('.anggota-row-input').remove()" title="Hapus">✕</button>`;
  wrap.appendChild(div);
}

function getAnggotaRows(){
  return [...document.querySelectorAll('#anggotaInputs .anggota-row-input')].map(row=>({
    nama:  row.querySelector('.ar-nama').value.trim(),
    peran: row.querySelector('.ar-peran').value.trim(),
  })).filter(a=>a.nama);
}

/* ── SAVE ── */
function savePemimpin(){
  const nama    = document.getElementById('pNama').value.trim();
  const jabatan = document.getElementById('pJabatan').value.trim();
  const pendek  = document.getElementById('pPendek').value.trim() || nama;
  const inisial = document.getElementById('pInisial').value.trim().toUpperCase() || nama.slice(0,2).toUpperCase();
  const foto    = _pFoto || '';
  if(!nama||!jabatan){ toast('Nama dan jabatan wajib diisi!','err'); return; }
  if(editPId){ const i=pemimpin.findIndex(x=>x.id===editPId); if(i>-1) pemimpin[i]={id:editPId,nama,jabatan,pendek,inisial,foto}; toast('Pemimpin diperbarui ✓','ok'); }
  else { pemimpin.push({id:nextId++,nama,jabatan,pendek,inisial,foto}); localStorage.setItem(KN,nextId); toast('Pemimpin ditambahkan ✓','ok'); }
  save(KP,pemimpin); renderAll(); closeAll();
}

function saveTim(){
  const nama   = document.getElementById('tNama').value.trim();
  const ikon   = document.getElementById('tIkon').value.trim()||'🙌';
  const desc   = document.getElementById('tDesc').value.trim();
  const warna  = document.getElementById('tWarna').value;
  const anggota= getAnggotaRows();
  if(!nama){ toast('Nama tim wajib diisi!','err'); return; }
  if(editTId){ const i=tims.findIndex(x=>x.id===editTId); if(i>-1) tims[i]={id:editTId,nama,ikon,desc,warna,anggota}; toast('Tim diperbarui ✓','ok'); }
  else { tims.push({id:nextId++,nama,ikon,desc,warna,anggota}); localStorage.setItem(KN,nextId); toast('Tim ditambahkan ✓','ok'); }
  save(KT,tims); renderAll(); closeAll();
}

function saveGaleri(){
  const judul = document.getElementById('gJudul').value.trim();
  const desc  = document.getElementById('gDesc').value.trim();
  const ikon  = document.getElementById('gIkon').value.trim()||'🖼';
  const foto  = _gFoto || '';
  if(!judul){ toast('Judul foto wajib diisi!','err'); return; }
  if(editGId){ const i=galeris.findIndex(x=>x.id===editGId); if(i>-1) galeris[i]={id:editGId,judul,desc,ikon,foto}; toast('Foto diperbarui ✓','ok'); }
  else { galeris.push({id:nextId++,judul,desc,ikon,foto}); localStorage.setItem(KN,nextId); toast('Foto ditambahkan ✓','ok'); }
  save(KG,galeris); renderAll(); closeAll();
}

/* ── DELETE ── */
function delPemimpin(id){ if(!confirm('Hapus pemimpin ini?')) return; pemimpin=pemimpin.filter(x=>x.id!==id); save(KP,pemimpin); renderAll(); toast('Pemimpin dihapus','err'); }
function delTim(id){ if(!confirm('Hapus tim ini?')) return; tims=tims.filter(x=>x.id!==id); save(KT,tims); renderAll(); toast('Tim dihapus','err'); }
function delGaleri(id){ if(!confirm('Hapus foto ini?')) return; galeris=galeris.filter(x=>x.id!==id); save(KG,galeris); renderAll(); toast('Foto dihapus','err'); }

/* ── FOTO UPLOAD VARS ── */
let _pFoto = null; // foto pemimpin sementara
let _gFoto = null; // foto galeri sementara

/* ── FILE INPUT HANDLERS ── */
function onPFoto(e){
  const f=e.target.files[0]; if(!f) return;
  if(f.size>2*1024*1024){ toast('File terlalu besar! Maks 2MB','err'); return; }
  const r=new FileReader();
  r.onload=ev=>{ _pFoto=ev.target.result; showPPreview(_pFoto); };
  r.readAsDataURL(f);
}
function onGFoto(e){
  const f=e.target.files[0]; if(!f) return;
  if(f.size>5*1024*1024){ toast('File terlalu besar! Maks 5MB','err'); return; }
  const r=new FileReader();
  r.onload=ev=>{ _gFoto=ev.target.result; showGPreview(_gFoto); };
  r.readAsDataURL(f);
}

/* ── QUICK PHOTO (klik avatar/galeri langsung) ── */
let _quickPId=null, _quickGId=null;
function triggerPFoto(id){
  _quickPId=id;
  const inp=document.createElement('input');
  inp.type='file'; inp.accept='image/*';
  inp.onchange=e=>{
    const f=e.target.files[0]; if(!f) return;
    if(f.size>2*1024*1024){ toast('Maks 2MB','err'); return; }
    const r=new FileReader();
    r.onload=ev=>{
      const idx=pemimpin.findIndex(x=>x.id===_quickPId);
      if(idx>-1){ pemimpin[idx].foto=ev.target.result; save(KP,pemimpin); renderAll(); toast('Foto pemimpin diperbarui ✓','ok'); }
    };
    r.readAsDataURL(f);
  };
  inp.click();
}
function triggerGFoto(id){
  _quickGId=id;
  const inp=document.createElement('input');
  inp.type='file'; inp.accept='image/*';
  inp.onchange=e=>{
    const f=e.target.files[0]; if(!f) return;
    if(f.size>5*1024*1024){ toast('Maks 5MB','err'); return; }
    const r=new FileReader();
    r.onload=ev=>{
      const idx=galeris.findIndex(x=>x.id===_quickGId);
      if(idx>-1){ galeris[idx].foto=ev.target.result; save(KG,galeris); renderAll(); toast('Foto berhasil diperbarui ✓','ok'); }
    };
    r.readAsDataURL(f);
  };
  inp.click();
}

/* drag-drop untuk drop zone pemimpin */
const pdP=document.getElementById('pdPemimpin');
pdP.addEventListener('dragover',e=>{e.preventDefault();pdP.classList.add('drag');});
pdP.addEventListener('dragleave',()=>pdP.classList.remove('drag'));
pdP.addEventListener('drop',e=>{
  e.preventDefault();pdP.classList.remove('drag');
  const f=e.dataTransfer.files[0]; if(!f||!f.type.startsWith('image/')) return;
  const fakeE={target:{files:[f]}}; onPFoto(fakeE);
});

/* drag-drop untuk drop zone galeri */
const pdG=document.getElementById('pdGaleri');
pdG.addEventListener('dragover',e=>{e.preventDefault();pdG.classList.add('drag');});
pdG.addEventListener('dragleave',()=>pdG.classList.remove('drag'));
pdG.addEventListener('drop',e=>{
  e.preventDefault();pdG.classList.remove('drag');
  const f=e.dataTransfer.files[0]; if(!f||!f.type.startsWith('image/')) return;
  const fakeE={target:{files:[f]}}; onGFoto(fakeE);
});

/* ── TOAST ── */
function toast(msg,type='ok'){
  const t=document.getElementById('toast');
  t.textContent=(type==='ok'?'✅ ':'🗑 ')+msg;
  t.className='toast '+type; t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),3000);
}

document.querySelectorAll('.overlay').forEach(el=>{
  el.addEventListener('click',function(e){ if(e.target===this) closeAll(); });
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