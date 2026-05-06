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
}

.hero h1 {
    font-weight: 800;
    font-size: 38px;
}

.hero p {
    opacity: 0.9;
    font-size: 17px;
}

.section-title {
    font-weight: 700;
    font-size: 28px;
}

.divider {
    height: 4px;
    width: 80px;
    background: linear-gradient(90deg,#005bea,#00c6fb);
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

.btn-modern {
    border-radius: 50px;
    font-size: 13px;
    padding: 6px 18px;
}

.badge-modern {
    border-radius: 30px;
    padding: 6px 14px;
    font-size: 12px;
}

.section-bg {
    background: linear-gradient(180deg,#eaf4ff,#ffffff);
    padding: 80px 0;
}
</style>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <h1>Jadwal Ibadah & Kegiatan</h1>
        <p>Mari bertumbuh bersama dalam iman, doa, dan persekutuan</p>
    </div>
</section>

<!-- JADWAL -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="section-title">Jadwal Mingguan</h2>
        <div class="divider"></div>
    </div>

    <div class="container mt-5">
        @forelse ($jadwalMingguan as $hari => $kegiatanList)
            <h4 class="fw-bold text-center mb-4">{{ $hari }}</h4>
            <div class="row g-4 justify-content-center mb-5">
                @foreach ($kegiatanList as $kegiatan)
                    <div class="col-md-4">
                        <div class="card-modern text-start">
                            <div class="icon-modern bg-primary bg-opacity-25 text-primary">
                                <i class="{{ $kegiatan->icon ?: 'bi bi-calendar-event' }}"></i>
                            </div>

                            <h6 class="fw-bold mb-2">{{ $kegiatan->title }}</h6>

                            <p class="text-muted small mb-1">
                                <i class="bi bi-clock"></i>
                                {{ $kegiatan->start_time }}{{ $kegiatan->end_time ? ' - ' . $kegiatan->end_time : '' }} WIB
                            </p>

                            <p class="text-muted small mb-2">
                                <i class="bi bi-geo-alt"></i> {{ $kegiatan->location ?: '-' }}
                            </p>

                            <p class="text-muted small">{{ $kegiatan->description }}</p>

                            <a href="#" class="btn btn-outline-primary btn-modern mt-2">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="text-center">
                <p>Belum ada jadwal mingguan.</p>
            </div>
        @endforelse
    </div>
</section>

<!-- ACARA KHUSUS -->
<section class="section-bg">
    <div class="container text-center">
        <h2 class="section-title">Acara Khusus</h2>
        <div class="divider"></div>
    </div>

    <div class="container mt-5">
        <div class="row g-4 justify-content-center">
            @forelse ($acaraKhusus as $acara)
                <div class="col-md-4">
                    <div class="card-modern text-start">
                        <div class="icon-modern bg-primary bg-opacity-25 text-primary">
                            <i class="{{ $acara->icon ?: 'bi bi-calendar2-check-fill' }}"></i>
                        </div>

                        <h6 class="fw-bold mb-2">{{ $acara->title }}</h6>
                        <p class="text-muted small">{{ $acara->description }}</p>

                        <span class="badge bg-primary badge-modern">
                            {{ $acara->day ?: 'Acara Khusus' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <p>Belum ada acara khusus.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection