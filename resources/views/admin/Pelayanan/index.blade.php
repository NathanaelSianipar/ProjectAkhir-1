@extends('admin.layouts.main')

@push('styles')
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
  }

  .content-header { display:flex; align-items:center; justify-content:space-between; padding:20px 28px 0; }
  .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; }
  .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
  .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
  .content { padding:22px 28px 60px; }

  .page-hero { position:relative; overflow:hidden; border-radius:16px; margin-bottom:28px; background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0); padding:36px 40px; box-shadow:0 6px 24px rgba(29,168,224,.25); }
  .page-hero::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%), radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%); pointer-events:none; }
  .hero-tag { display:inline-block; background:rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; padding:4px 12px; border-radius:20px; margin-bottom:12px; }
  .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:28px; font-weight:700; color:#fff; margin-bottom:8px; }
  .page-hero p  { color:rgba(255,255,255,.8); font-size:14px; max-width:520px; line-height:1.65; }
  .hero-actions { margin-top:20px; display:flex; gap:10px; flex-wrap:wrap; }
  .btn-hero-primary { display:inline-flex; align-items:center; gap:7px; background:#fff; color:var(--cyan); text-decoration:none; border:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; transition:all .18s; box-shadow:0 3px 10px rgba(0,0,0,.1); }
  .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); color:var(--cyan); }

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

  .section-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; gap:12px; flex-wrap:wrap; }
  .section-title { font-family:'Rajdhani',sans-serif; font-size:18px; font-weight:700; color:var(--text); letter-spacing:.4px; display:flex; align-items:center; gap:10px; flex:1; margin-bottom:0; }
  .section-title::after { content:''; flex:1; height:1px; background:var(--border); }
  .add-btn { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; text-decoration:none; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700; padding:8px 16px; border-radius:7px; transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
  .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); color:#fff; }

  .leader-row { display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:16px; margin-bottom:28px; }
  .leader-card { background:var(--white); border:1px solid var(--border); border-radius:13px; padding:24px 18px; text-align:center; box-shadow:0 1px 5px rgba(0,0,0,.05); transition:transform .2s,box-shadow .2s; animation:fadeUp .4s ease both; }
  .leader-card:hover { transform:translateY(-3px); box-shadow:0 8px 22px rgba(0,0,0,.09); }
  .leader-avatar { width:68px; height:68px; border-radius:50%; margin:0 auto 14px; background:linear-gradient(135deg,var(--cyan-lt),var(--cyan)); display:flex; align-items:center; justify-content:center; font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; color:var(--cyan-dk); border:3px solid var(--border); overflow:hidden; }
  .leader-avatar img { width:100%; height:100%; object-fit:cover; border-radius:50%; }
  .leader-name  { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:var(--text); margin-bottom:3px; }
  .leader-role  { font-size:11px; color:var(--muted); margin-bottom:12px; }
  .leader-card-actions { display:flex; gap:6px; justify-content:center; }

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
  .anggota-label { font-size:10px; font-weight:700; letter-spacing:1px; text-transform:uppercase; color:var(--muted); margin-bottom:8px; text-align:center; }
  .anggota-row { text-align:center; font-size:12.5px; color:var(--text); margin-bottom:10px; }
  .tim-footer { display:flex; gap:6px; justify-content:flex-end; }

  .daftar-wrap { text-align:center; margin:4px 0 28px; }
  .btn-daftar { display:inline-flex; align-items:center; gap:8px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; border:none; font-family:'Nunito',sans-serif; font-size:13.5px; font-weight:700; padding:11px 28px; border-radius:30px; letter-spacing:.3px; }

  .galeri-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
  .galeri-card { background:var(--white); border:1px solid var(--border); border-radius:12px; overflow:hidden; box-shadow:0 1px 5px rgba(0,0,0,.05); transition:transform .2s,box-shadow .2s; animation:fadeUp .4s ease both; }
  .galeri-card:hover { transform:translateY(-3px); box-shadow:0 8px 22px rgba(0,0,0,.09); }
  .galeri-img { width:100%; height:160px; object-fit:cover; background:linear-gradient(135deg,var(--cyan-lt),var(--border)); display:flex; align-items:center; justify-content:center; font-size:36px; color:var(--muted); overflow:hidden; }
  .galeri-img img { width:100%; height:160px; object-fit:cover; display:block; }
  .galeri-body { padding:14px 16px; }
  .galeri-title { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:var(--text); margin-bottom:4px; }
  .galeri-desc  { font-size:12px; color:var(--muted); line-height:1.55; margin-bottom:10px; }
  .galeri-footer { display:flex; gap:6px; justify-content:flex-end; }

  .act-sm { border:none; border-radius:6px; cursor:pointer; font-family:'Nunito',sans-serif; font-size:11px; font-weight:700; padding:5px 11px; transition:all .15s; text-decoration:none; display:inline-flex; align-items:center; justify-content:center; }
  .btn-e { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.2); }
  .btn-e:hover { background:var(--cyan); color:#fff; }
  .btn-d { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.2); }
  .btn-d:hover { background:var(--danger); color:#fff; }

  .empty-box {
    text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);
    border:1px dashed var(--border);border-radius:12px;
  }

  @media(max-width:1100px) { .tim-grid { grid-template-columns:1fr 1fr; } .galeri-grid { grid-template-columns:1fr 1fr; } }
  @media(max-width:900px)  { .tim-grid,.galeri-grid{grid-template-columns:1fr;} .stats-row{grid-template-columns:1fr 1fr;} }
</style>
@endpush

@section('content')
<div class="content-header">
  <h1>Pelayanan & Komunitas</h1>
  <div class="breadcrumb-bar"><a href="{{ route('welcome') }}">Home</a> / <span>Pelayanan</span></div>
</div>

<div class="content">

  <div class="page-hero">
    <div class="hero-tag">🙌 Pelayanan</div>
    <h2>Pelayanan & Komunitas</h2>
    <p>Bergabunglah dalam pelayanan dan temukan tempat Anda untuk melayani Tuhan. Kelola data pelayanan dari sini.</p>
    <div class="hero-actions">
      <a href="{{ route('pelayanan.create') }}" class="btn-hero-primary">＋ Tambah Data Pelayanan</a>
    </div>
  </div>

  <div class="stats-row">
    <div class="stat-card"><div class="stat-icon ic">👤</div><div><div class="stat-val vc">{{ $pelayanan->where('category', 'kepemimpinan')->count() }}</div><div class="stat-lbl">Pemimpin</div></div></div>
    <div class="stat-card"><div class="stat-icon ig">🙌</div><div><div class="stat-val vg">{{ $pelayanan->where('category', 'tim')->count() }}</div><div class="stat-lbl">Tim Pelayanan</div></div></div>
    <div class="stat-card"><div class="stat-icon is">🖼</div><div><div class="stat-val vs">{{ $pelayanan->where('category', 'aksi')->count() }}</div><div class="stat-lbl">Pelayanan dalam Aksi</div></div></div>
    <div class="stat-card"><div class="stat-icon ip">📦</div><div><div class="stat-val vp">{{ $pelayanan->count() }}</div><div class="stat-lbl">Total Data</div></div></div>
  </div>

  @php
    $warnaMap = ['c','g','s','r','p','o','pk'];
    $kepemimpinan = $pelayanan->where('category', 'kepemimpinan')->values();
    $tim = $pelayanan->where('category', 'tim')->values();
    $aksi = $pelayanan->where('category', 'aksi')->values();
  @endphp

  <div class="section-head">
    <div class="section-title">👤 Kepemimpinan</div>
    <a href="{{ route('pelayanan.create') }}" class="add-btn">＋ Tambah Pemimpin</a>
  </div>

  @if($kepemimpinan->count())
    <div class="leader-row">
      @foreach($kepemimpinan as $item)
        <div class="leader-card">
          <div class="leader-avatar">
            @if($item->photo)
              <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->title }}">
            @else
              {{ strtoupper(substr($item->leader ?: $item->title, 0, 2)) }}
            @endif
          </div>
          <div class="leader-name">{{ $item->leader ?: $item->title }}</div>
          <div class="leader-role">{{ $item->title }}</div>
          <div class="leader-card-actions">
            <a href="{{ route('pelayanan.edit', $item->id) }}" class="act-sm btn-e">✏ Edit</a>
            <form action="{{ route('pelayanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="act-sm btn-d">🗑 Hapus</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="empty-box">Belum ada data kepemimpinan.</div>
  @endif

  <div class="section-head">
    <div class="section-title">🙌 Tim Pelayanan</div>
    <a href="{{ route('pelayanan.create') }}" class="add-btn">＋ Tambah Tim</a>
  </div>

  @if($tim->count())
    <div class="tim-grid">
      @foreach($tim as $index => $item)
        @php $warna = $warnaMap[$index % count($warnaMap)]; @endphp
        <div class="tim-card {{ $warna }}">
          <div class="tim-icon">{{ $item->icon ?: '🙌' }}</div>
          <div class="tim-name">{{ $item->title }}</div>
          <div class="tim-desc">{{ $item->description ?: '-' }}</div>
          <hr class="tim-divider"/>
          <div class="anggota-label">Anggota Tim</div>

@if($item->anggotas->count())
    @foreach($item->anggotas as $anggota)
        <div class="anggota-row">
            {{ $anggota->nama }}
            @if($anggota->bagian)
                - <strong>{{ $anggota->bagian }}</strong>
            @endif
        </div>
    @endforeach
@else
    <div class="anggota-row">{{ $item->leader ?: '-' }}</div>
@endif
          <div class="tim-footer">
            <a href="{{ route('pelayanan.edit', $item->id) }}" class="act-sm btn-e">✏ Edit</a>
            <form action="{{ route('pelayanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="act-sm btn-d">🗑 Hapus</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="empty-box">Belum ada tim pelayanan.</div>
  @endif

  <div class="daftar-wrap">
    <button class="btn-daftar">🙏 Bergabung dengan Pelayanan</button>
  </div>

  <div class="section-head">
    <div class="section-title">🖼 Pelayanan dalam Aksi</div>
    <a href="{{ route('pelayanan.create') }}" class="add-btn">＋ Tambah Foto</a>
  </div>

  @if($aksi->count())
    <div class="galeri-grid">
      @foreach($aksi as $item)
        <div class="galeri-card">
          <div class="galeri-img">
            @if($item->photo)
              <img src="{{ asset('storage/'.$item->photo) }}" alt="{{ $item->title }}">
            @else
              {{ $item->icon ?: '🖼' }}
            @endif
          </div>
          <div class="galeri-body">
            <div class="galeri-title">{{ $item->title }}</div>
            <div class="galeri-desc">{{ $item->description ?: '-' }}</div>
            <div class="galeri-footer">
              <a href="{{ route('pelayanan.edit', $item->id) }}" class="act-sm btn-e">✏ Edit</a>
              <form action="{{ route('pelayanan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="act-sm btn-d">🗑 Hapus</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="empty-box">Belum ada dokumentasi pelayanan dalam aksi.</div>
  @endif

</div>
@endsection