@extends('admin.layouts.main')

@push('styles')
<style>
  :root {
    --bg:       #f4f6f9;
    --white:    #ffffff;
    --border:   #e4e8ef;
    --border2:  #d0d7e3;
    --cyan:     #1da8e0;
    --cyan-dk:  #0d85b5;
    --cyan-lt:  #e8f6fd;
    --gold:     #c89b3c;
    --gold-lt:  #fdf6e3;
    --text:     #1a2233;
    --muted:    #7a8499;
    --danger:   #e05555;
    --danger-lt:#fdf0f0;
    --success:  #2ea86a;
    --success-lt:#e8f7ef;
    --warn:     #e0a825;
  }

  .content-header {
    display:flex; align-items:center; justify-content:space-between;
    padding:20px 28px 0;
  }
  .content-header h1 {
    font-family:'Rajdhani',sans-serif;
    font-size:22px; font-weight:700; letter-spacing:.3px; color:var(--text);
  }
  .breadcrumb-bar {
    display:flex; align-items:center; gap:6px; font-size:12px; color:var(--muted);
  }
  .breadcrumb-bar a { color:var(--cyan); text-decoration:none; }
  .breadcrumb-bar a:hover { text-decoration:underline; }

  .content { padding:20px 28px 50px; }

  .stats-row { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:22px; }
  .stat-card {
    background:var(--white); border:1px solid var(--border);
    border-radius:11px; padding:16px 18px;
    display:flex; align-items:center; gap:14px;
    box-shadow:0 1px 4px rgba(0,0,0,.04);
    animation:fadeUp .35s ease both;
  }
  .stat-card:nth-child(1){animation-delay:.05s}
  .stat-card:nth-child(2){animation-delay:.10s}
  .stat-card:nth-child(3){animation-delay:.15s}
  .stat-card:nth-child(4){animation-delay:.20s}
  @keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
  .stat-icon { width:40px; height:40px; border-radius:9px; display:flex; align-items:center; justify-content:center; font-size:18px; }
  .ic{background:var(--cyan-lt)}   .ig{background:var(--gold-lt)}
  .is{background:var(--success-lt)} .ir{background:var(--danger-lt)}
  .stat-val { font-family:'Rajdhani',sans-serif; font-size:22px; font-weight:700; line-height:1; }
  .vc{color:var(--cyan)}    .vg{color:var(--gold)}
  .vs{color:var(--success)} .vr{color:var(--danger)}
  .stat-lbl { font-size:11.5px; color:var(--muted); margin-top:3px; }

  .card {
    background:var(--white); border:1px solid var(--border);
    border-radius:12px; overflow:hidden;
    box-shadow:0 1px 6px rgba(0,0,0,.05);
    animation:fadeUp .4s ease .22s both;
  }
  .card-header {
    display:flex; align-items:center; justify-content:space-between;
    padding:15px 20px; border-bottom:1px solid var(--border);
    background:#fafbfc; gap:12px; flex-wrap:wrap;
  }
  .card-header h3 {
    font-family:'Rajdhani',sans-serif; font-size:16px; font-weight:700;
    color:var(--text); display:flex; align-items:center; gap:8px;
  }
  .card-tools { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }

  .search-box {
    display:flex; align-items:center; gap:7px; background:var(--bg);
    border:1px solid var(--border); border-radius:7px; padding:6px 12px;
  }
  .search-box input {
    background:none; border:none; outline:none;
    color:var(--text); font-family:'Nunito',sans-serif; font-size:13px; width:170px;
  }
  .search-box input::placeholder { color:#b0b8c9; }

  .btn-tambah {
    display:inline-flex; align-items:center; gap:7px;
    background:linear-gradient(135deg,var(--cyan),var(--cyan-dk)); color:#fff;
    text-decoration:none; border:none; font-family:'Nunito',sans-serif; font-size:12.5px; font-weight:700;
    padding:8px 16px; border-radius:7px; cursor:pointer;
    transition:all .2s; box-shadow:0 3px 10px rgba(29,168,224,.25);
  }
  .btn-tambah:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(29,168,224,.35); color:#fff; }

  .act-btn {
    border:none; border-radius:6px; cursor:pointer;
    font-family:'Nunito',sans-serif; font-size:12px; font-weight:700;
    padding:6px 13px; transition:all .15s; text-decoration:none;
    display:inline-flex; align-items:center; justify-content:center;
  }
  .btn-edit { background:var(--cyan-lt); color:var(--cyan); border:1px solid rgba(29,168,224,.25); }
  .btn-edit:hover { background:var(--cyan); color:#fff; }
  .btn-del  { background:var(--danger-lt); color:var(--danger); border:1px solid rgba(224,85,85,.25); }
  .btn-del:hover  { background:var(--danger); color:#fff; }

  .table-wrap { overflow-x:auto; }
  table { width:100%; border-collapse:collapse; }
  thead tr { background:#f8f9fb; }
  thead th {
    padding:11px 18px; text-align:left; font-size:10.5px; font-weight:700;
    letter-spacing:1px; text-transform:uppercase; color:var(--muted);
    border-bottom:1px solid var(--border); white-space:nowrap;
  }
  tbody tr { border-bottom:1px solid var(--border); transition:background .14s; }
  tbody tr:last-child { border-bottom:none; }
  tbody tr:hover { background:#f6f9fd; }
  td { padding:14px 18px; font-size:13px; vertical-align:middle; }

  .loc-addr { font-size:13px; color:var(--text); line-height:1.5; }
  .pill-cyan {
    display:inline-flex; align-items:center; gap:5px;
    background:var(--cyan-lt); border:1px solid rgba(29,168,224,.2);
    color:var(--cyan); border-radius:20px; padding:4px 11px;
    font-size:12px; font-weight:600; white-space:nowrap;
  }
  .pill-gold {
    display:inline-flex; align-items:center; gap:5px;
    background:var(--gold-lt); border:1px solid rgba(200,155,60,.25);
    color:var(--gold); border-radius:20px; padding:4px 11px;
    font-size:12px; font-weight:600; white-space:nowrap;
  }
  .jam-main { font-size:13px; color:var(--text); font-weight:600; line-height:1.5; }

  .no-data  { text-align:center; padding:52px 20px; color:var(--muted); }
  .no-data .icon { font-size:44px; opacity:.25; margin-bottom:12px; }
  .no-data p { font-size:13px; }

  @media(max-width:900px) {
    .stats-row { grid-template-columns:1fr 1fr; }
  }
</style>
@endpush

@section('content')
<div class="content-header">
  <h1>Informasi Kontak Gereja</h1>
  <div class="breadcrumb-bar">
    <a href="{{ route('welcome') }}">Home</a> / <span>Kontak</span>
  </div>
</div>

<div class="content">

  <div class="stats-row">
    <div class="stat-card">
      <div class="stat-icon ic">📍</div>
      <div><div class="stat-val vc">{{ $kontak->count() }}</div><div class="stat-lbl">Total Kontak</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon ig">📞</div>
      <div><div class="stat-val vg">{{ $kontak->whereNotNull('phone')->filter(fn($item) => !empty($item->phone))->count() }}</div><div class="stat-lbl">Nomor Telepon</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon is">✉</div>
      <div><div class="stat-val vs">{{ $kontak->whereNotNull('email')->filter(fn($item) => !empty($item->email))->count() }}</div><div class="stat-lbl">Alamat Email</div></div>
    </div>
    <div class="stat-card">
      <div class="stat-icon ir">🕐</div>
      <div><div class="stat-val vr">{{ $kontak->whereNotNull('office_hours')->filter(fn($item) => !empty($item->office_hours))->count() }}</div><div class="stat-lbl">Ada Jam Sekretariat</div></div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3>✉ Informasi Kontak Gereja</h3>
      <div class="card-tools">
        <form method="GET" action="{{ route('kontak.index') }}" class="search-box">
          <span style="color:#b0b8c9;font-size:13px;">🔍</span>
          <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari kontak...">
        </form>
        <a href="{{ route('kontak.create') }}" class="btn-tambah">
          <span style="font-size:15px;font-weight:900;">＋</span> Tambah Kontak
        </a>
      </div>
    </div>

    <div class="table-wrap">
      @if($kontak->count())
        <table>
          <thead>
            <tr>
              <th style="width:40px;">#</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <th>Jam Sekretariat</th>
              <th style="width:150px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kontak as $index => $item)
              <tr>
                <td style="color:#b0b8c9;font-size:12px;">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                <td>
                  <div class="loc-addr">{{ $item->address }}</div>
                </td>
                <td><span class="pill-cyan">📞 {{ $item->phone ?: '-' }}</span></td>
                <td><span class="pill-gold">✉ {{ $item->email ?: '-' }}</span></td>
                <td>
                  <div class="jam-main">{{ $item->office_hours ?: '-' }}</div>
                </td>
                <td>
                  <div style="display:flex;gap:6px;">
                    <a href="{{ route('kontak.edit', $item->id) }}" class="act-btn btn-edit">✏ Edit</a>

                    <form action="{{ route('kontak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus kontak ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="act-btn btn-del">🗑 Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div class="no-data">
          <div class="icon">✉</div>
          <p>Belum ada data kontak. Klik <strong>Tambah Kontak</strong> untuk memulai.</p>
        </div>
      @endif
    </div>
  </div>

</div>
@endsection