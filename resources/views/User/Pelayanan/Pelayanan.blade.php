@extends('layouts.app')

@section('content')

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

                        <p class="small fw-semibold mb-2">Koordinator:</p>

                        <div class="d-flex justify-content-between small mb-1">
                            <span>{{ $tim->leader ?: '-' }}</span>
                            <span class="text-primary fw-semibold">Tim</span>
                        </div>
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
<section class="section bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Temukan Panggilan Pelayanan Anda</h2>
        <p class="text-muted mb-4">
            Setiap orang memiliki karunia dan panggilan unik dari Tuhan.
            Kami mengundang Anda untuk bergabung dengan tim pelayanan kami
            dan menjadi berkat bagi gereja dan komunitas kami.
        </p>

        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="icon-box">
                            <i class="fa fa-heart icon-xl text-primary mb-2"></i>
                            <h6 class="fw-bold">Komunitas Iman</h6>
                            <p class="small text-muted">Bergabunglah dengan komunitas yang solid dan saling mendukung</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="icon-box">
                            <i class="fa fa-book icon-xl text-info mb-2"></i>
                            <h6 class="fw-bold">Pelajaran Firman</h6>
                            <p class="small text-muted">Perkembangan spiritual melalui pembelajaran Firman Tuhan</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="icon-box">
                            <i class="fa fa-hands-helping icon-xl text-success mb-2"></i>
                            <h6 class="fw-bold">Dukungan Spiritual</h6>
                            <p class="small text-muted">Doa dan dukungan dari jemaat dalam perjalanan iman Anda</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="icon-box">
                            <i class="fa fa-handshake icon-xl text-warning mb-2"></i>
                            <h6 class="fw-bold">Peluang Melayani</h6>
                            <p class="small text-muted">Kesempatan untuk menggunakan karunia dalam melayani Tuhan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <a href="{{ route('jemaat.create') }}" class="join-btn">
                <i class="fa fa-check-circle me-2"></i> Daftarkan Diri Anda
            </a>
        </div>
    </div>
</section>

@endsection