@extends('layouts.app')

@section('content')

<style>
/* HERO */
.gallery-hero {
    height: 280px;
    background-image: url('{{ asset('gambar/hero-galeri.jpg') }}');
    background-size: cover;
    background-position: center;
    position: relative;
}

.gallery-hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.35);
}

.gallery-hero .container {
    position: relative;
    z-index: 2;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
}

/* SECTION */
.gallery-section {
    background: #f2f3f5;
    padding: 60px 0;
}

/* SEARCH */
.search-bar {
    margin-top: -30px;
    margin-bottom: 40px;
}

/* GRID STYLE */
.gallery-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    transition: all 0.3s ease;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* seperti feed instagram */
    transition: transform 0.5s ease;
}

/* ukuran portrait seperti contoh */
.gallery-thumb {
    aspect-ratio: 3/4;
    overflow: hidden;
}

.gallery-item:hover img {
    transform: scale(1.08);
}

.gallery-item:hover {
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    transform: translateY(-6px);
}

/* DATE BADGE */
.gallery-date {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(0,0,0,0.7);
    color: #fff;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 6px;
}

/* RESPONSIVE */
@media(max-width:768px){
    .gallery-thumb{
        aspect-ratio: 1/1;
    }
}
</style>


<!-- HERO -->
<section class="gallery-hero">
    <div class="container">
        <h1 class="fw-bold">Galeri</h1>
        <p class="mb-0">Dokumentasi Kegiatan Terbaru</p>
    </div>
</section>


<!-- GALLERY -->
<section class="gallery-section">
    <div class="container">

        <!-- SEARCH -->
        <div class="row justify-content-center search-bar">
            <div class="col-md-5">
                <form>
                    <div class="input-group shadow-sm">
                        <input type="search" class="form-control" placeholder="Cari Galeri...">
                        <button class="btn btn-dark">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- GRID -->
        <div class="row g-4">
            @forelse($galeris as $item)
            <div class="col-md-6 col-lg-4">
                <div class="gallery-item">
                    <span class="gallery-date">
                        {{ $item->event_date ? \Carbon\Carbon::parse($item->event_date)->format('Y-m-d') : '-' }}
                    </span>
                    <div class="gallery-thumb">
                        <img src="{{ asset('storage/' . $item->image) }}" loading="lazy" alt="{{ $item->title }}">
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Belum ada data galeri.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
