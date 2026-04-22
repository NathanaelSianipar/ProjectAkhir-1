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

/* ── SEARCH BAR ── */
.search-wrap {
    max-width: 500px;
    margin: 0 auto 40px;
    position: relative;
}

.search-wrap i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 16px;
}

.search-input {
    width: 100%;
    padding: 14px 20px 14px 46px;
    border: 2px solid #e2e8f0;
    border-radius: 50px;
    background: white;
    font-size: 14px;
    color: #1e293b;
    box-shadow: 0 4px 14px rgba(0,0,0,0.06);
    outline: none;
    transition: border-color 0.25s, box-shadow 0.25s;
}

.search-input:focus {
    border-color: #005bea;
    box-shadow: 0 4px 18px rgba(0,91,234,0.15);
}

.search-input::placeholder { color: #b0bec5; }

/* ── KHOTBAH CARD ── */
.khotbah-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 24px;
}

.khotbah-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: all 0.35s ease;
    display: flex;
    flex-direction: column;
    position: relative;
}

.khotbah-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.khotbah-card .accent-bar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #005bea, #00c6fb);
    opacity: 0;
    transition: opacity 0.3s;
    border-radius: 20px 20px 0 0;
}

.khotbah-card:hover .accent-bar {
    opacity: 1;
}

/* Thumbnail */
.card-thumb {
    width: 100%;
    height: 210px;
    overflow: hidden;
    position: relative;
    background: #dbeafe;
}

.card-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.khotbah-card:hover .card-thumb img {
    transform: scale(1.06);
}

.card-thumb-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #005bea, #00c6fb);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    color: rgba(255,255,255,0.8);
}

.card-thumb-placeholder i {
    font-size: 46px;
    opacity: 0.75;
}

.card-thumb-placeholder span {
    font-size: 12px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 600;
    opacity: 0.7;
}

.video-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(0,0,0,0.55);
    backdrop-filter: blur(5px);
    color: white;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 4px 12px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Card body */
.card-body-khotbah {
    padding: 22px 22px 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.khotbah-date {
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: #005bea;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.khotbah-title {
    font-size: 16.5px;
    font-weight: 700;
    color: #1e293b;
    line-height: 1.45;
    margin-bottom: 10px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.khotbah-desc {
    font-size: 13.5px;
    color: #6b7280;
    line-height: 1.7;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 18px;
}

.card-footer-khotbah {
    padding-top: 14px;
    border-top: 1px solid #f1f5f9;
}

.btn-tonton {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: linear-gradient(135deg, #005bea, #00c6fb);
    color: white;
    border-radius: 50px;
    padding: 9px 22px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    border: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(0,91,234,0.25);
}

.btn-tonton:hover {
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(0,91,234,0.35);
}

.btn-no-video {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #f1f5f9;
    color: #94a3b8;
    border-radius: 50px;
    padding: 9px 22px;
    font-size: 13px;
    font-weight: 600;
    cursor: default;
}

/* ── EMPTY STATE ── */
.empty-wrap {
    text-align: center;
    padding: 60px 20px;
    grid-column: 1 / -1;
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
    .khotbah-grid {
        grid-template-columns: 1fr;
    }
}
</style>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="container">
        <h1>Khotbah</h1>
        <p>Mendengarkan firman Tuhan untuk kehidupan yang lebih bermakna</p>
    </div>
</section>

{{-- ── KHOTBAH LIST ── --}}
<section class="section-plain">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-title">Firman Tuhan</h2>
            <div class="divider"></div>
        </div>

        {{-- Search --}}
        <div class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text"
                   class="search-input"
                   id="searchKhotbah"
                   placeholder="Cari judul khotbah...">
        </div>

        {{-- Grid --}}
        <div class="khotbah-grid" id="khotbahGrid">

            @forelse($khotbah as $item)
            <div class="khotbah-card"
                 data-title="{{ strtolower($item->title) }}">

                <div class="accent-bar"></div>

                {{-- Thumbnail --}}
                <div class="card-thumb">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                             alt="{{ $item->title }}"
                             loading="lazy">
                    @else
                        <div class="card-thumb-placeholder">
                            <i class="bi bi-play-circle-fill"></i>
                            <span>Video Khotbah</span>
                        </div>
                    @endif

                    @if($item->video)
                        <div class="video-badge">
                            <i class="bi bi-camera-video-fill"></i> Video
                        </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="card-body-khotbah">
                    <div class="khotbah-date">
                        <i class="bi bi-calendar3"></i>
                        {{ $item->tanggal
                            ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')
                            : '—' }}
                    </div>

                    <div class="khotbah-title">{{ $item->title }}</div>

                    @if($item->description)
                        <div class="khotbah-desc">{{ $item->description }}</div>
                    @endif

                    <div class="card-footer-khotbah">
                        @if($item->video)
                            <a href="{{ $item->video }}"
                               target="_blank"
                               rel="noopener"
                               class="btn-tonton">
                                <i class="bi bi-play-fill"></i>
                                Tonton Khotbah
                            </a>
                        @else
                            <span class="btn-no-video">
                                <i class="bi bi-camera-video-off"></i>
                                Video Tidak Tersedia
                            </span>
                        @endif
                    </div>
                </div>

            </div>

            @empty
            <div class="empty-wrap">
                <div class="empty-icon">
                    <i class="bi bi-camera-video"></i>
                </div>
                <h4 class="fw-bold mb-2">Belum Ada Khotbah</h4>
                <p class="text-muted">Khotbah akan segera ditampilkan di sini. Tetap semangat!</p>
            </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        @if(method_exists($khotbah, 'links') && $khotbah->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $khotbah->links() }}
            </div>
        @endif

    </div>
</section>

<script>
    const searchInput = document.getElementById('searchKhotbah');
    const cards = document.querySelectorAll('.khotbah-card');

    searchInput.addEventListener('input', function () {
        const q = this.value.toLowerCase().trim();
        let visible = 0;
        cards.forEach(card => {
            const match = !q || card.dataset.title.includes(q);
            card.style.display = match ? '' : 'none';
            if (match) visible++;
        });
    });
</script>

@endsection