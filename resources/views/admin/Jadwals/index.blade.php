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
  }

  .content-header { display:flex; align-items:center; justify-content:space-between; padding:20px 28px 0; }
  .content-header h1 { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; }
  .breadcrumb-bar { display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted); }
  .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
  .content { padding:22px 28px 60px; }

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
  .hero-actions { margin-top:20px; display:flex; gap:10px; flex-wrap:wrap; }
  .btn-hero-primary { display:inline-flex; align-items:center; justify-content:center; text-decoration:none; background:#fff; color:var(--cyan); border:none; font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; box-shadow:0 3px 10px rgba(0,0,0,.1); }
  .btn-hero-primary:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(0,0,0,.15); color:var(--cyan); }
  .btn-hero-outline { display:inline-flex; align-items:center; justify-content:center; text-decoration:none; background:rgba(255,255,255,.15); color:#fff; border:1px solid rgba(255,255,255,.4); font-family:'Nunito',sans-serif; font-size:13px; font-weight:700; padding:9px 20px; border-radius:8px; cursor:pointer; transition:all .18s; }
  .btn-hero-outline:hover { background:rgba(255,255,255,.25); color:#fff; }

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

  .section-head { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; gap:12px; flex-wrap:wrap; }
  .section-title { font-family:'Rajdhani',sans-serif; font-size:18px; font-weight:700; color:var(--text); letter-spacing:.4px; display:flex; align-items:center; gap:10px; flex:1; }
  .section-title::after { content:''; flex:1; height:1px; background:var(--border); }

  .day-label {
    display:inline-flex; align-items:center; gap:8px;
    font-family:'Rajdhani',sans-serif; font-size:15px; font-weight:700;
    color:var(--text); letter-spacing:.4px;
    padding:6px 16px; background:var(--white); border:1px solid var(--border);
    border-radius:8px; margin-bottom:14px;
    box-shadow:0 1px 3px rgba(0,0,0,.04);
  }
  .day-label.senin   { border-left:3px solid var(--cyan); }
  .day-label.selasa  { border-left:3px solid var(--purple); }
  .day-label.rabu    { border-left:3px solid var(--success); }
  .day-label.kamis   { border-left:3px solid var(--orange); }
  .day-label.jumat   { border-left:3px solid var(--gold); }
  .day-label.sabtu   { border-left:3px solid var(--danger); }
  .day-label.minggu  { border-left:3px solid var(--cyan); }
  .day-label.khusus  { border-left:3px solid var(--purple); }

  .jadwal-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-bottom:24px; }

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

  .jcard-footer { display:flex; align-items:center; justify-content:space-between; gap:8px; flex-wrap:wrap; }
  .btn-detail {
    display:inline-flex; align-items:center; gap:5px;
    font-family:'Nunito',sans-serif; font-size:12px; font-weight:700;
    padding:5px 14px; border-radius:6px; transition:all .15s; border:1px solid;
    text-decoration:none;
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
  .btn-edit { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.2); text-decoration:none; display:inline-flex; align-items:center; }
  .btn-edit:hover { background:var(--cyan); color:#fff; }
  .btn-del  { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.2); }
  .btn-del:hover  { background:var(--danger); color:#fff; }

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

  .add-btn { display:inline-flex; align-items:center; gap:7px; background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff; text-decoration:none; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700; padding:8px 16px; border-radius:7px; cursor:pointer; transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25); }
  .add-btn:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); color:#fff; }

  @media(max-width:1100px) { .jadwal-grid { grid-template-columns:1fr 1fr; } }
  @media(max-width:900px)  { .jadwal-grid{grid-template-columns:1fr;} .stats-row{grid-template-columns:1fr 1fr;} }
</style>
@endpush

@section('content')
<div class="content-header">
  <h1>Jadwal Ibadah & Kegiatan</h1>
  <div class="breadcrumb-bar"><a href="{{ route('welcome') }}">Home</a> / <span>Jadwal Ibadah</span></div>
</div>

<div class="content">
  <div class="page-hero">
    <div class="hero-tag">📅 Jadwal Ibadah</div>
    <h2>Jadwal Ibadah & Kegiatan</h2>
    <p>Mari bertumbuh bersama dalam iman, doa, dan persekutuan. Kelola jadwal ibadah mingguan dan acara khusus gereja dari sini.</p>
    <div class="hero-actions">
      <a href="{{ route('jadwal.create') }}" class="btn-hero-primary">＋ Tambah Jadwal</a>
      <a href="{{ route('jadwal.create') }}" class="btn-hero-outline">✨ Tambah Acara Khusus</a>
    </div>
  </div>

  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-icon ic">📅</div>
      <div><div class="stat-val vc">{{ $jadwal->where('category', 'mingguan')->count() }}</div><div class="stat-lbl">Jadwal Mingguan</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon ig">✨</div>
      <div><div class="stat-val vg">{{ $jadwal->where('category', 'acara_khusus')->count() }}</div><div class="stat-lbl">Acara Khusus</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon is">⛪</div>
      <div><div class="stat-val vs">{{ $jadwal->where('category', 'mingguan')->pluck('day')->unique()->count() }}</div><div class="stat-lbl">Hari Aktif</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon ip">📍</div>
      <div><div class="stat-val vp">{{ $jadwal->whereNotNull('location')->pluck('location')->unique()->count() }}</div><div class="stat-lbl">Lokasi</div></div>
    </div>
  </div>

  <div class="section-head">
    <div class="section-title">📅 Jadwal Mingguan</div>
    <a href="{{ route('jadwal.create') }}" class="add-btn">＋ Tambah Jadwal</a>
  </div>

  @php
    $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
    $hariClass = [
      'Senin' => 'senin',
      'Selasa' => 'selasa',
      'Rabu' => 'rabu',
      'Kamis' => 'kamis',
      'Jumat' => 'jumat',
      'Sabtu' => 'sabtu',
      'Minggu' => 'minggu',
    ];
    $hariIcon = [
      'Senin' => '☀',
      'Selasa' => '🌟',
      'Rabu' => '🕊',
      'Kamis' => '🔔',
      'Jumat' => '🌙',
      'Sabtu' => '🔥',
      'Minggu' => '✝',
    ];
    $warnaCycle = ['c', 'g', 's', 'r', 'p', 'o'];
  @endphp

  @php $adaMingguan = false; @endphp
  @foreach($hariList as $hari)
    @php
      $perHari = $jadwal->where('category', 'mingguan')->where('day', $hari)->values();
    @endphp

    @if($perHari->count())
      @php $adaMingguan = true; @endphp
      <div class="day-label {{ $hariClass[$hari] }}">{{ $hariIcon[$hari] }} {{ $hari }}</div>
      <div class="jadwal-grid">
        @foreach($perHari as $index => $item)
          @php
            $warna = $warnaCycle[$index % count($warnaCycle)];
          @endphp
          <div class="jcard {{ $warna }}">
            <div class="jcard-icon">{{ $item->icon ?: '📅' }}</div>
            <div class="jcard-title">{{ $item->title }}</div>
            <div class="jcard-meta">
              <span>🕐 {{ $item->start_time }}{{ $item->end_time ? ' - ' . $item->end_time : '' }}</span>
              <span>📍 {{ $item->location ?: '-' }}</span>
            </div>
            <div class="jcard-desc">{{ $item->description ?: '-' }}</div>
            <div class="jcard-footer">
              <span class="btn-detail">Detail</span>
              <div class="jcard-actions">
                <a href="{{ route('jadwal.edit', $item->id) }}" class="act-btn btn-edit">✏</a>
                <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus jadwal ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="act-btn btn-del">🗑</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  @endforeach

  @if(!$adaMingguan)
    <div style="text-align:center; padding:32px; color:var(--muted); font-size:13px; background:var(--white); border:1px dashed var(--border); border-radius:12px; margin-bottom:24px;">
      Belum ada jadwal mingguan. Klik <strong>Tambah Jadwal</strong> untuk menambahkan.
    </div>
  @endif

  <div class="section-head" style="margin-top:8px;">
    <div class="section-title">✨ Acara Khusus</div>
    <a href="{{ route('jadwal.create') }}" class="add-btn">＋ Tambah Acara</a>
  </div>

  @php
    $acaraKhusus = $jadwal->where('category', 'acara_khusus')->values();
  @endphp

  @if($acaraKhusus->count())
    <div class="jadwal-grid">
      @foreach($acaraKhusus as $index => $item)
        @php
          $warna = $warnaCycle[$index % count($warnaCycle)];
        @endphp
        <div class="jcard {{ $warna }}">
          <div class="jcard-icon">{{ $item->icon ?: '✨' }}</div>
          <div class="jcard-title">{{ $item->title }}</div>
          <div class="jcard-desc">{{ $item->description ?: '-' }}</div>
          <div class="jcard-footer">
            <span class="bulan-badge b-{{ $warna }}">{{ $item->day ?: 'Acara Khusus' }}</span>
            <div class="jcard-actions">
              <a href="{{ route('jadwal.edit', $item->id) }}" class="act-btn btn-edit">✏</a>
              <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus acara ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="act-btn btn-del">🗑</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div style="text-align:center;padding:32px;color:var(--muted);font-size:13px;background:var(--white);border:1px dashed var(--border);border-radius:12px;">
      Belum ada acara khusus. Klik <strong>Tambah Acara</strong> untuk menambahkan.
    </div>
  @endif
</div>
@endsection