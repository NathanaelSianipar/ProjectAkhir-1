@extends('admin.layouts.main')

@push('styles')
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
  }

  .content-header { display:flex; align-items:center; justify-content:space-between; padding:20px 28px 0; }
  .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; }
  .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
  .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
  .content { padding:22px 28px 60px; }

  .page-hero { position:relative; overflow:hidden; border-radius:16px; margin-bottom:24px; background:linear-gradient(135deg,var(--cyan-dk),var(--cyan),#29c4f0); padding:34px 40px; box-shadow:0 6px 24px rgba(29,168,224,.25); }
  .page-hero::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 50% 80% at 95% 50%,rgba(255,255,255,.12) 0%,transparent 65%),radial-gradient(ellipse 35% 60% at 5% 90%,rgba(200,155,60,.18) 0%,transparent 55%); pointer-events:none; }
  .hero-tag { display:inline-block; background:rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff; font-size:11px; font-weight:700; letter-spacing:1.2px; text-transform:uppercase; padding:4px 12px; border-radius:20px; margin-bottom:10px; }
  .page-hero h2 { font-family:'Rajdhani',sans-serif; font-size:26px; font-weight:700; color:#fff; margin-bottom:6px; }
  .page-hero p { color:rgba(255,255,255,.8); font-size:13.5px; max-width:520px; line-height:1.65; }
  .hero-actions { margin-top:18px; display:flex; gap:10px; flex-wrap:wrap; }
  .btn-hero-primary { display:inline-flex; align-items:center; justify-content:center; background:#fff; color:var(--cyan); border:none; text-decoration:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(0,0,0,.1); }
  .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); color:var(--cyan); }
  .btn-hero-outline { background:rgba(255,255,255,.15); color:#fff; border:1px solid rgba(255,255,255,.4); font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; }
  .btn-hero-outline:hover { background:rgba(255,255,255,.25); }

  .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:22px; }
  .stat-card { background:var(--white); border:1px solid var(--border); border-radius:11px; padding:16px 18px; display:flex; align-items:center; gap:14px; box-shadow:0 1px 4px rgba(0,0,0,.04); animation:fadeUp .35s ease both; }
  .stat-card:nth-child(1){animation-delay:.05s}.stat-card:nth-child(2){animation-delay:.10s}.stat-card:nth-child(3){animation-delay:.15s}.stat-card:nth-child(4){animation-delay:.20s}
  @keyframes fadeUp{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
  .stat-icon{width:40px;height:40px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:18px;}
  .ic{background:var(--cyan-lt)}.ig{background:var(--gold-lt)}.is{background:var(--success-lt)}.ip{background:var(--purple-lt)}
  .stat-val{font-family:'Rajdhani',sans-serif;font-size:22px;font-weight:700;line-height:1;}
  .vc{color:var(--cyan)}.vg{color:var(--gold)}.vs{color:var(--success)}.vp{color:var(--purple)}
  .stat-lbl{font-size:11.5px;color:var(--muted);margin-top:3px;}

  .toolbar { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:20px; flex-wrap:wrap; }
  .toolbar-left { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
  .search-wrap { display:flex; align-items:center; background:var(--white); border:1px solid var(--border); border-radius:9px; overflow:hidden; box-shadow:0 1px 4px rgba(0,0,0,.04); }
  .search-wrap input { background:none; border:none; outline:none; color:var(--text); font-family:'Nunito',sans-serif; font-size:13px; padding:9px 14px; width:210px; }
  .search-wrap input::placeholder { color:#b0b8c9; }
  .search-wrap button { background:var(--cyan); border:none; color:#fff; padding:9px 14px; cursor:pointer; font-size:14px; transition:background .15s; }
  .search-wrap button:hover { background:var(--cyan-dk); }
  .add-btn { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; text-decoration:none; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700; padding:9px 18px; border-radius:7px; cursor:pointer; transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25); white-space:nowrap; }
  .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); color:#fff; }

  .masonry { columns:3; column-gap:16px; }
  .pcard { break-inside:avoid; display:block; background:var(--white); border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:16px; box-shadow:0 1px 5px rgba(0,0,0,.06); transition:transform .22s, box-shadow .22s; cursor:pointer; position:relative; animation:fadeUp .4s ease both; }
  .pcard:hover { transform:translateY(-4px); box-shadow:0 12px 30px rgba(0,0,0,.11); }
  .pcard:hover .pcard-actions { opacity:1; }
  .pcard-img { width:100%; overflow:hidden; position:relative; display:flex; align-items:center; justify-content:center; }
  .pcard-img img { width:100%; display:block; transition:transform .3s; }
  .pcard:hover .pcard-img img { transform:scale(1.04); }
  .pcard-placeholder { width:100%; display:flex; align-items:center; justify-content:center; font-size:52px; transition:transform .3s; height:240px; }
  .pcard:hover .pcard-placeholder { transform:scale(1.06); }
  .b-date { position:absolute; top:9px; left:9px; background:rgba(15,22,40,.62); backdrop-filter:blur(3px); color:#fff; font-size:10px; font-weight:700; padding:3px 8px; border-radius:5px; letter-spacing:.3px; }
  .pcard-actions { position:absolute; bottom:0; left:0; right:0; background:linear-gradient(to top,rgba(15,22,40,.72),transparent); padding:28px 12px 12px; display:flex; gap:6px; justify-content:flex-end; opacity:0; transition:opacity .2s; }
  .a-btn { border:none; border-radius:6px; cursor:pointer; font-family:'Nunito',sans-serif; font-size:11.5px; font-weight:700; padding:5px 12px; transition:all .14s; text-decoration:none; }
  .a-edit { background:rgba(255,255,255,.93); color:var(--text); }
  .a-edit:hover { background:#fff; color:var(--text); }
  .a-del  { background:rgba(224,85,85,.88); color:#fff; }
  .a-del:hover { background:var(--danger); }
  .pcard-body { padding:12px 15px 15px; }
  .pcard-title { font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700; color:var(--text); margin-bottom:4px; line-height:1.3; }
  .pcard-desc  { font-size:12px; color:var(--muted); line-height:1.55; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }

  .empty-state { text-align:center; padding:60px 20px; color:var(--muted); background:var(--white); border:1px dashed var(--border); border-radius:14px; }
  .empty-state .ei { font-size:50px; opacity:.3; margin-bottom:14px; }

  @media(max-width:1100px){.masonry{columns:2;}}
  @media(max-width:768px){.masonry{columns:1;}.stats-row{grid-template-columns:1fr 1fr;}.content{padding:16px 16px 60px;}.content-header{padding:14px 16px 0;}}
</style>
@endpush

@section('content')

<div class="content-header">
  <h1>Galeri</h1>
  <div class="breadcrumb-bar"><a href="{{ route('welcome') }}">Home</a> / <span>Galeri</span></div>
</div>

<div class="content">

  <div class="page-hero">
    <div class="hero-tag">🖼 Dokumentasi</div>
    <h2>Galeri & Dokumentasi Kegiatan</h2>
    <p>Abadikan setiap momen pelayanan, ibadah, dan kebersamaan jemaat GBI Tambunan.</p>
    <div class="hero-actions">
      <a href="{{ route('galeri.create') }}" class="btn-hero-primary">＋ Upload Foto</a>
      <button class="btn-hero-outline" type="button">📤 Bagikan Galeri</button>
    </div>
  </div>

  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-icon ic">🖼</div>
      <div>
        <div class="stat-val vc">{{ $galeri->count() }}</div>
        <div class="stat-lbl">Total Foto</div>
      </div>
    </div>

    <div class="stat-card">
      <div class="stat-icon ig">📅</div>
      <div>
        <div class="stat-val vg">{{ $galeri->whereNotNull('event_date')->count() }}</div>
        <div class="stat-lbl">Dengan Tanggal</div>
      </div>
    </div>

    <div class="stat-card">
      <div class="stat-icon is">📝</div>
      <div>
        <div class="stat-val vs">{{ $galeri->filter(fn($item) => !empty($item->description))->count() }}</div>
        <div class="stat-lbl">Ada Deskripsi</div>
      </div>
    </div>

    <div class="stat-card">
      <div class="stat-icon ip">🆕</div>
      <div>
        <div class="stat-val vp">{{ $galeri->take(5)->count() }}</div>
        <div class="stat-lbl">Data Terbaru</div>
      </div>
    </div>
  </div>

  <div class="toolbar">
    <div class="toolbar-left">
      <form method="GET" action="{{ route('galeri.index') }}" class="search-wrap">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari Galeri...">
        <button type="submit">🔍</button>
      </form>
    </div>
    <a href="{{ route('galeri.create') }}" class="add-btn">＋ Upload Foto</a>
  </div>

  @if($galeri->count())
    <div class="masonry">
      @foreach($galeri as $item)
        <div class="pcard">
          <div class="pcard-img">
            @if($item->event_date)
              <div class="b-date">{{ \Carbon\Carbon::parse($item->event_date)->format('d M Y') }}</div>
            @endif

            @if($item->image)
              <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
            @else
              <div class="pcard-placeholder" style="background:linear-gradient(135deg,#f3f4f6,#e5e7eb)">🖼</div>
            @endif

            <div class="pcard-actions" onclick="event.stopPropagation()">
              <a href="{{ route('galeri.edit', $item->id) }}" class="a-btn a-edit">✏ Edit</a>

              <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus foto ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="a-btn a-del">🗑 Hapus</button>
              </form>
            </div>
          </div>

          <div class="pcard-body">
            <div class="pcard-title">{{ $item->title }}</div>
            <div class="pcard-desc">{{ $item->description ?: '-' }}</div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="empty-state">
      <div class="ei">🖼</div>
      <p>Tidak ada foto ditemukan. Coba upload foto baru.</p>
    </div>
  @endif

</div>
@endsection