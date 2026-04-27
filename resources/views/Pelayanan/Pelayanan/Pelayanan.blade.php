@extends('layouts.app')

@section('content')

<style>
.pelayanan-cta-section {
    padding-top: 80px;
    padding-bottom: 80px;
}

.pelayanan-cta-text {
    max-width: 760px;
    line-height: 1.8;
    font-size: 15px;
}

.pelayanan-benefit-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 28px 20px;
    box-shadow: 0 10px 28px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.pelayanan-benefit-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 32px rgba(0,0,0,0.1);
}

.pelayanan-benefit-card .icon-box {
    width: 72px;
    height: 72px;
    margin: 0 auto 10px;
    border-radius: 50%;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
}

.pelayanan-benefit-card .icon-xl {
    font-size: 28px;
}

.pelayanan-benefit-card h6 {
    font-size: 16px;
}

.pelayanan-benefit-card p {
    line-height: 1.7;
}

@media (max-width: 768px) {
    .pelayanan-cta-text {
        font-size: 14px;
        padding: 0 10px;
    }

    .pelayanan-benefit-card {
        padding: 24px 18px;
    }
}
</style>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">
        <h1 class="fw-bold">Pelayanan & Komunitas</h1>
        <p>Berbagilah dalam pelayanan dan temukan tempat Anda untuk melayani Tuhan</p>
    </div>
</section>

<!-- KEPEMIMPINAN SECTION -->
<section class="section bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Kepemimpinan</h2>
        <div class="row justify-content-center">
            @forelse($kepemimpinan as $k)
                <div class="col-md-4 mb-4">
                    <div class="card card-custom p-4 d-flex flex-column align-items-center">
                        @if($k->photo)
                            <img src="{{ asset('storage/' . $k->photo) }}"
                                 class="leader-img mb-3"
                                 alt="{{ $k->leader ?: $k->title }}">
                        @endif

                        <h5 class="fw-bold">{{ $k->title }}</h5>
                        <small class="text-muted">{{ $k->leader ?: '-' }}</small>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Belum ada data kepemimpinan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- TIM PELAYANAN SECTION -->
<section class="section bg-light-blue text-center">
    <div class="container">
        <h2 class="fw-bold mb-2">Tim Pelayanan</h2>
        <p class="text-muted mb-5">Berbagai tim yang melayani dengan dedikasi dan kasih</p>

        <div class="row">
            @forelse($timPelayanan as $tim)
                <div class="col-md-4 mb-4">
                    <div class="card card-custom p-4 h-100">
                        <div class="icon-circle bg-primary mb-3">
                            <i class="fa {{ $tim->icon ?: 'fa-hands-helping' }}"></i>
                        </div>

                        <h5 class="fw-bold mb-2">{{ $tim->title }}</h5>

                        <p class="small fw-semibold mb-3" style="color: #c97d39;">
                            {{ $tim->description }}
                        </p>

                        <hr>

                        @if($tim->anggotas->count())
    <p class="small fw-semibold mb-2">Anggota Tim:</p>

    @foreach($tim->anggotas as $anggota)
        <div class="d-flex justify-content-between small mb-1">
            <span>{{ $anggota->nama }}</span>
            <span class="text-primary fw-semibold">
                {{ $anggota->bagian ?: '-' }}
            </span>
        </div>
    @endforeach
@else
    <p class="small fw-semibold mb-2">Koordinator:</p>

    <div class="d-flex justify-content-between small mb-1">
        <span>{{ $tim->leader ?: '-' }}</span>
        <span class="text-primary fw-semibold">Tim</span>
    </div>
@endif
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Belum ada data tim pelayanan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            <a href="{{ route('jemaat.create') }}" class="join-btn">
                <i class="fa fa-user-plus me-2"></i> Bergabung dengan Pelayanan
            </a>
        </div>
    </div>
</section>

<!-- PELAYANAN DALAM AKSI -->
<section class="section text-center">
    <div class="container">
        <h2 class="fw-bold mb-2">Pelayanan dalam Aksi</h2>
        <p class="text-muted mb-5">Momen-momen istimewa pelayanan di GBI Tambunan</p>

        <div class="row">
            @forelse($fotoPelayanan as $foto)
                <div class="col-md-4 mb-4">
                    <div class="card card-gallery h-100">
                        @if($foto->photo)
                            <img
                                src="{{ asset('storage/' . $foto->photo) }}"
                                class="card-img-top"
                                alt="{{ $foto->title }}"
                                style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h6 class="fw-bold mb-2">{{ $foto->title }}</h6>
                            <p class="small text-muted">{{ $foto->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>Belum ada dokumentasi pelayanan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- UNDANGAN PELAYANAN -->
<section class="section bg-light text-center pelayanan-cta-section">
    <div class="container">
        <h2 class="fw-bold mb-3">Temukan Panggilan Pelayanan Anda</h2>
        <p class="text-muted pelayanan-cta-text mx-auto mb-5">
            Setiap orang memiliki karunia dan panggilan unik dari Tuhan.
            Kami mengundang Anda untuk bergabung dengan tim pelayanan kami
            dan menjadi berkat bagi gereja dan komunitas kami.
        </p>

        <div class="row justify-content-center g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="pelayanan-benefit-card h-100">
                    <div class="icon-box">
                        <i class="fa fa-heart icon-xl text-primary mb-3"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Komunitas Iman</h6>
                    <p class="small text-muted mb-0">
                        Bergabunglah dengan komunitas yang solid dan saling mendukung.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="pelayanan-benefit-card h-100">
                    <div class="icon-box">
                        <i class="fa fa-book icon-xl text-info mb-3"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Pelajaran Firman</h6>
                    <p class="small text-muted mb-0">
                        Bertumbuh secara spiritual melalui pembelajaran Firman Tuhan.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="pelayanan-benefit-card h-100">
                    <div class="icon-box">
                        <i class="fa fa-hands-helping icon-xl text-success mb-3"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Dukungan Spiritual</h6>
                    <p class="small text-muted mb-0">
                        Dukungan dan doa dari jemaat dalam perjalanan iman Anda.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="pelayanan-benefit-card h-100">
                    <div class="icon-box">
                        <i class="fa fa-handshake icon-xl text-warning mb-3"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Peluang Melayani</h6>
                    <p class="small text-muted mb-0">
                        Kesempatan untuk menggunakan karunia dalam melayani Tuhan.
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-2">
            <a href="{{ route('jemaat.create') }}" class="join-btn">
                <i class="fa fa-check-circle me-2"></i> Daftarkan Diri Anda
            </a>
        </div>
    </div>
</section>

@endsection