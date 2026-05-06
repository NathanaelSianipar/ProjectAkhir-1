@extends('Pelayanan.layouts.guest')

@section('content')

<style>
body {
    background: #f4f9ff;
}

.hero {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    padding: 90px 0;
    color: white;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 40px,
        rgba(255,255,255,0.03) 40px,
        rgba(255,255,255,0.03) 41px
    );
    pointer-events: none;
}

.hero h1 {
    font-weight: 800;
    font-size: 38px;
    position: relative;
}

.hero p {
    opacity: 0.9;
    font-size: 17px;
    position: relative;
}

.section-title {
    font-weight: 700;
    font-size: 28px;
}

.divider {
    height: 4px;
    width: 80px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    margin: 15px auto 20px;
    border-radius: 20px;
}

.card-modern {
    border: none;
    border-radius: 20px;
    padding: 25px;
    background: white;
    transition: all 0.35s ease;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    height: 100%;
}

.card-modern:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.icon-modern {
    width: 60px;
    height: 60px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
}

.section-bg {
    background: linear-gradient(180deg, #eaf4ff, #ffffff);
    padding: 80px 0;
}

.section-plain {
    padding: 80px 0;
}

/* Sejarah */
.sejarah-card {
    border: none;
    border-radius: 20px;
    padding: 40px 50px;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.sejarah-card::before {
    content: '\201C';
    position: absolute;
    top: -10px;
    left: 30px;
    font-size: 120px;
    color: #005bea;
    opacity: 0.08;
    font-family: Georgia, serif;
    line-height: 1;
}

/* Visi Misi */
.visi-misi-card {
    border: none;
    border-radius: 20px;
    padding: 35px 30px;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    height: 100%;
    transition: all 0.35s ease;
    position: relative;
    overflow: hidden;
}

.visi-misi-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.13);
}

.visi-misi-card .accent-bar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    border-radius: 20px 20px 0 0;
}

/* Gembala */
.gembala-card {
    border: none;
    border-radius: 20px;
    padding: 40px 30px;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    max-width: 640px;
    margin: 0 auto;
    transition: all 0.35s ease;
}

.gembala-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.13);
}

.gembala-img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid #fff;
    box-shadow: 0 8px 24px rgba(0,91,234,0.2);
}

.gembala-avatar {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    background: linear-gradient(135deg, #005bea, #00c6fb);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    color: white;
    margin: 0 auto 20px;
    box-shadow: 0 8px 24px rgba(0,91,234,0.25);
}

.badge-jabatan {
    display: inline-block;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    color: white;
    border-radius: 30px;
    padding: 5px 18px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-bottom: 14px;
}
</style>

@if($data)

{{-- ── HERO ── --}}
<section class="hero">
    <div class="container">
        <h1>{{ $data->header_title }}</h1>
        <p>{{ $data->header_description }}</p>
    </div>
</section>

{{-- ── SEJARAH ── --}}
<section class="section-plain">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Sejarah Gereja</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-card">
            <div class="d-flex align-items-start gap-4 flex-wrap flex-md-nowrap">
                <div class="icon-modern bg-primary bg-opacity-25 text-primary flex-shrink-0">
                    <i class="bi bi-book-half"></i>
                </div>
                <p class="text-muted mb-0" style="line-height:1.85;font-size:15.5px;">
                    {{ $data->sejarah }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ── VISI & MISI ── --}}
<section class="section-bg">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Visi &amp; Misi</h2>
            <div class="divider"></div>
        </div>
        <div class="row g-4 justify-content-center">

            <div class="col-md-5">
                <div class="visi-misi-card text-center">
                    <div class="accent-bar"></div>
                    <div class="icon-modern bg-primary bg-opacity-25 text-primary mx-auto">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Visi</h4>
                    <p class="text-muted mb-0" style="line-height:1.8;">{{ $data->visi }}</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="visi-misi-card text-center">
                    <div class="accent-bar"></div>
                    <div class="icon-modern bg-primary bg-opacity-25 text-primary mx-auto">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Misi</h4>
                    <p class="text-muted mb-0" style="line-height:1.8;">{{ $data->misi }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ── GEMBALA ── --}}
<section class="section-plain">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Gembala Sidang</h2>
            <div class="divider"></div>
        </div>

        <div class="gembala-card text-center">

            @if($data->gembala_foto)
                <img src="{{ asset('storage/' . $data->gembala_foto) }}"
                     class="gembala-img mb-4"
                     alt="{{ $data->gembala_nama }}">
            @else
                <div class="gembala-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
            @endif

            <h4 class="fw-bold mb-1">{{ $data->gembala_nama }}</h4>

            @if($data->gembala_jabatan)
                <div class="badge-jabatan">{{ $data->gembala_jabatan }}</div>
            @endif

            @if($data->gembala_deskripsi)
                <p class="text-muted mt-2 mb-0"
                   style="line-height:1.85;font-size:14.5px;max-width:480px;margin:0 auto;">
                    {{ $data->gembala_deskripsi }}
                </p>
            @endif

        </div>
    </div>
</section>

@else

{{-- ── EMPTY STATE ── --}}
<section class="hero">
    <div class="container">
        <h1>Tentang Gereja</h1>
        <p>Mengenal lebih dalam rumah Tuhan kita</p>
    </div>
</section>

<section class="section-plain">
    <div class="container text-center">
        <div class="card-modern d-inline-block px-5 py-5">
            <div class="icon-modern bg-primary bg-opacity-25 text-primary mx-auto">
                <i class="bi bi-info-circle"></i>
            </div>
            <h4 class="fw-bold mb-2">Data Belum Tersedia</h4>
            <p class="text-muted mb-0">Informasi tentang gereja belum diisi. Silakan hubungi administrator.</p>
        </div>
    </div>
</section>

@endif

@endsection