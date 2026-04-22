@extends('layouts.app')

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

.section-plain {
    padding: 80px 0;
}

.section-bg {
    background: linear-gradient(180deg, #eaf4ff, #ffffff);
    padding: 80px 0;
}

/* ── FILTER TABS ── */
.filter-wrap {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin-bottom: 40px;
}

.filter-btn {
    border: 2px solid #e2e8f0;
    background: white;
    border-radius: 50px;
    padding: 8px 22px;
    font-size: 13.5px;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    transition: all 0.25s ease;
}

.filter-btn:hover,
.filter-btn.active {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    border-color: transparent;
    color: white;
    box-shadow: 0 6px 18px rgba(0,91,234,0.25);
    transform: translateY(-2px);
}

/* ── GALLERY GRID ── */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

/* ── GALLERY CARD ── */
.gallery-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: all 0.35s ease;
    position: relative;
    cursor: pointer;
}

.gallery-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.gallery-card .img-wrap {
    width: 100%;
    height: 220px;
    overflow: hidden;
    position: relative;
}

.gallery-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
}

.gallery-card:hover img {
    transform: scale(1.07);
}

.gallery-card .img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 40%, rgba(0,27,80,0.65) 100%);
    opacity: 0;
    transition: opacity 0.35s ease;
    display: flex;
    align-items: flex-end;
    padding: 18px;
}

.gallery-card:hover .img-overlay {
    opacity: 1;
}

.img-overlay-text {
    color: white;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.gallery-card .img-placeholder {
    width: 100%;
    height: 220px;
    background: linear-gradient(135deg, #eaf4ff, #dbeafe);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #3b82f6;
    gap: 8px;
}

.gallery-card .img-placeholder i {
    font-size: 40px;
    opacity: 0.5;
}

.gallery-card .img-placeholder span {
    font-size: 12px;
    letter-spacing: 1px;
    text-transform: uppercase;
    opacity: 0.5;
    font-weight: 600;
}

/* Card body */
.gallery-body {
    padding: 18px 20px 20px;
}

.gallery-category {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: linear-gradient(135deg, #005bea15, #00c6fb15);
    color: #005bea;
    border-radius: 30px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.gallery-title {
    font-weight: 700;
    font-size: 15.5px;
    color: #1e293b;
    margin-bottom: 6px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-desc {
    font-size: 13px;
    color: #6b7280;
    line-height: 1.65;
    margin-bottom: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-date {
    font-size: 12px;
    color: #94a3b8;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* ── LIGHTBOX ── */
.lightbox-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.88);
    z-index: 9999;
    align-items: center;
    justify-content: center;
    padding: 20px;
    backdrop-filter: blur(6px);
}

.lightbox-overlay.open {
    display: flex;
}

.lightbox-inner {
    position: relative;
    max-width: 860px;
    width: 100%;
    animation: lbIn 0.3s ease;
}

@keyframes lbIn {
    from { opacity: 0; transform: scale(0.92); }
    to   { opacity: 1; transform: scale(1); }
}

.lightbox-inner img {
    width: 100%;
    border-radius: 16px;
    display: block;
    max-height: 75vh;
    object-fit: contain;
    background: #000;
}

.lightbox-close {
    position: absolute;
    top: -44px;
    right: 0;
    background: rgba(255,255,255,0.15);
    border: none;
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}

.lightbox-close:hover { background: rgba(255,255,255,0.3); }

.lightbox-caption {
    color: rgba(255,255,255,0.8);
    text-align: center;
    margin-top: 14px;
    font-size: 14px;
}

/* ── EMPTY STATE ── */
.empty-wrap {
    text-align: center;
    padding: 60px 20px;
}

.empty-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    background: linear-gradient(135deg, #005bea20, #00c6fb20);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    color: #005bea;
    margin: 0 auto 20px;
}

/* ── RESPONSIVE ── */
@media (max-width: 576px) {
    .gallery-grid {
        grid-template-columns: 1fr;
    }
}
</style>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="container">
        <h1>Galeri Gereja</h1>
        <p>Momen-momen indah dalam perjalanan iman kita bersama</p>
    </div>
</section>

{{-- ── GALERI ── --}}
<section class="section-plain">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Koleksi Foto</h2>
            <div class="divider"></div>
        </div>

        @if($galeris->isNotEmpty())

        {{-- Filter by Kategori --}}
        @php
            $kategoriList = $galeri->pluck('kategori')->filter()->unique()->values();
        @endphpz

        @if($kategoriList->count() > 1)
        <div class="filter-wrap" id="filterWrap">
            <button class="filter-btn active" data-filter="all">
                <i class="bi bi-grid-3x3-gap me-1"></i> Semua
            </button>
            @foreach($kategoriList as $kat)
                <button class="filter-btn" data-filter="{{ Str::slug($kat) }}">
                    {{ $kat }}
                </button>
            @endforeach
        </div>
        @endif

        {{-- Grid --}}
        <div class="gallery-grid" id="galleryGrid">
            @foreach($galeris as $item)
            <div class="gallery-card"
                 data-category="{{ $item->kategori ? Str::slug($item->kategori) : '' }}"
                 onclick="openLightbox('{{ $item->foto ? asset('storage/' . $item->foto) : '' }}', '{{ addslashes($item->judul ?? '') }}')">

                <div class="img-wrap">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}"
                             alt="{{ $item->judul ?? 'Foto Galeri' }}"
                             loading="lazy">
                        <div class="img-overlay">
                            <span class="img-overlay-text">
                                <i class="bi bi-zoom-in"></i> Lihat Foto
                            </span>
                        </div>
                    @else
                        <div class="img-placeholder">
                            <i class="bi bi-image"></i>
                            <span>Foto</span>
                        </div>
                    @endif
                </div>

                <div class="gallery-body">
                    @if($item->kategori)
                        <div class="gallery-category">
                            <i class="bi bi-tag-fill"></i>
                            {{ $item->kategori }}
                        </div>
                    @endif

                    @if($item->judul)
                        <div class="gallery-title">{{ $item->judul }}</div>
                    @endif

                    @if($item->deskripsi)
                        <div class="gallery-desc">{{ $item->deskripsi }}</div>
                    @endif

                    @if($item->created_at)
                        <div class="gallery-date">
                            <i class="bi bi-calendar3"></i>
                            {{ $item->created_at->translatedFormat('d F Y') }}
                        </div>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if(method_exists($galeri, 'links') && $galeri->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $galeri->links() }}
            </div>
        @endif

        @else

        {{-- Empty State --}}
        <div class="empty-wrap">
            <div class="empty-icon">
                <i class="bi bi-images"></i>
            </div>
            <h4 class="fw-bold mb-2">Belum Ada Foto</h4>
            <p class="text-muted">Galeri foto gereja akan ditampilkan di sini.</p>
        </div>

        @endif

    </div>
</section>

{{-- ── LIGHTBOX ── --}}
<div class="lightbox-overlay" id="lightbox" onclick="closeLightbox(event)">
    <div class="lightbox-inner">
        <button class="lightbox-close" onclick="closeLightbox()">
            <i class="bi bi-x-lg"></i>
        </button>
        <img id="lightboxImg" src="" alt="">
        <div class="lightbox-caption" id="lightboxCaption"></div>
    </div>
</div>

<script>
    // ── Lightbox ──
    function openLightbox(src, caption) {
        if (!src) return;
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightboxCaption').textContent = caption;
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(e) {
        if (e && e.target !== document.getElementById('lightbox') &&
            !e.target.classList.contains('lightbox-close') &&
            !e.target.closest('.lightbox-close')) return;
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            document.getElementById('lightbox').classList.remove('open');
            document.body.style.overflow = '';
        }
    });

    // ── Filter ──
    const filterBtns = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.gallery-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            cards.forEach(card => {
                const match = filter === 'all' || card.dataset.category === filter;
                card.style.display = match ? '' : 'none';
            });
        });
    });
</script>

@endsection