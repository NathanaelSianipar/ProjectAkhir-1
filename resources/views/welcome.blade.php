@extends('layouts.app')

@section('content')

<style>
    /* ===== HERO SECTION ===== */
    .hero-home {
        position: relative;
        height: 800px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .video-bg {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        z-index: 0;
    }

    .hero-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-home::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(180deg, rgba(0,91,234,0.25) 0%, rgba(0,198,251,0.30) 100%);
        z-index: 1;
    }

    .hero-welcome-img {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 2;
        max-width: 50%;
        max-height: 70%;
        width: auto;
        height: auto;
        animation: bounceCenter 3s infinite;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.3));
        object-fit: contain;
    }

    @keyframes bounceCenter {
        0%, 100% { transform: translate(-50%, -50%); }
        50%       { transform: translate(-50%, calc(-50% - 20px)); }
    }

    /* ===== TENTANG SECTION ===== */
    .tentang-section {
        background: white;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .tentang-section::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 300px; height: 300px;
        background: linear-gradient(135deg, #005bea, #00c6fb);
        border-radius: 50%;
        opacity: 0.05;
    }

    .tentang-content { position: relative; z-index: 2; }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 480px;
        gap: 40px;
        align-items: center;
        max-width: 1100px;
        margin: 0 auto;
    }

    .about-left  { padding-right: 8px; text-align: left; }
    .about-right { text-align: center; }

    .tentang-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 8px;
        color: #111827;
    }

    .tentang-description {
        font-size: 1rem;
        color: #6b7280;
        line-height: 1.8;
        margin-bottom: 22px;
        max-width: 100%;
    }

    .vision-heading {
        font-size: 1.125rem;
        font-weight: 800;
        margin-bottom: 18px;
        color: #111827;
    }

    .vision-list  { display: grid; gap: 18px; }

    .vision-item {
        display: flex;
        gap: 16px;
        align-items: flex-start;
    }

    .vision-icon {
        width: 48px; height: 48px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center; justify-content: center;
        background: #eff6ff;
        color: #005bea;
        border: 1px solid rgba(0,91,234,0.10);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .vision-icon.yellow {
        background: #fff7ed;
        color: #f59e0b;
        border-color: rgba(245,158,11,0.10);
    }

    .vision-title { font-weight: 700; margin-bottom: 4px; color: #111827; font-size: 1rem; }
    .vision-desc  { color: #6b7280; font-size: 0.95rem; line-height: 1.6; }

    .about-image {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(2,6,23,0.12);
        border: 1px solid rgba(0,0,0,0.06);
    }

    /* ===== BERSAMA SECTION ===== */
    .bersama-section {
        background:
            linear-gradient(135deg, rgba(0,91,234,0.55) 0%, rgba(0,198,251,0.48) 100%),
            url('{{ asset("gambar/gbi-tambunan-building.png") }}') center/cover no-repeat;
        padding: 80px 0;
        position: relative;
        color: white;
        overflow: hidden;
    }

    .bersama-section::before {
        content: '';
        position: absolute;
        top: -50%; right: -10%;
        width: 500px; height: 500px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
    }

    .bersama-section::after {
        content: '';
        position: absolute;
        bottom: -30%; left: -5%;
        width: 400px; height: 400px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    /* diagonal pattern — same as khotbah hero */
    .bersama-section .pattern-overlay {
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
        z-index: 1;
    }

    .bersama-section .container { position: relative; z-index: 2; }

    .bersama-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: white;
    }

    .bersama-subtitle {
        font-size: 1.1rem;
        margin-bottom: 30px;
        color: rgba(255,255,255,0.90);
        line-height: 1.6;
    }

    .verse-box {
        background: rgba(255,255,255,0.15);
        border-left: 4px solid rgba(255,255,255,0.55);
        padding: 25px;
        margin: 30px auto;
        border-radius: 10px;
        font-style: italic;
        color: rgba(255,255,255,0.96);
        max-width: 600px;
        text-align: center;
        backdrop-filter: blur(6px);
    }

    .verse-reference {
        margin-top: 10px;
        font-size: 0.9rem;
        color: rgba(255,255,255,0.80);
    }

    /* ===== SESI CARDS ===== */
    .sesi-cards {
        display: grid;
        grid-template-columns: repeat(3, minmax(220px, 1fr));
        gap: 24px;
        max-width: 1100px;
        margin: 30px auto 0;
        align-items: stretch;
    }

    .sesi-card {
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.22);
        border-radius: 18px;
        padding: 30px;
        text-align: center;
        color: white;
        box-shadow: 0 8px 30px rgba(0,40,100,0.20);
        transition: transform .28s ease, box-shadow .28s ease, background .28s ease;
    }

    .sesi-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,40,100,0.30);
        background: rgba(255,255,255,0.18);
    }

    .sesi-icon {
        font-size: 1.4rem;
        margin-bottom: 12px;
        display: inline-flex;
        width: 52px; height: 52px;
        align-items: center; justify-content: center;
        border-radius: 999px;
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.20);
    }

    .sesi-title {
        font-size: 1.05rem;
        font-weight: 800;
        margin: 10px 0 6px;
        letter-spacing: 1px;
    }

    .sesi-time  { font-size: 0.95rem; opacity: 0.95; margin-bottom: 4px; }
    .sesi-place { font-size: 0.85rem; opacity: 0.75; }

    /* ===== BUTTONS ===== */
    .bersama-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 40px;
    }

    .btn-bersama-primary {
        background: white;
        color: #005bea;
        border: none;
        padding: 12px 40px;
        font-size: 1rem;
        font-weight: 800;
        border-radius: 50px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.15);
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-bersama-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.22);
        color: #004acc;
        text-decoration: none;
    }

    .btn-bersama-secondary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255,255,255,0.75);
        padding: 10px 40px;
        font-size: 1rem;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-bersama-secondary:hover {
        background: rgba(255,255,255,0.12);
        border-color: white;
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }

    /* ===== SECTION DIVIDER — soft gradient into white ===== */
    .section-divider {
        height: 4px;
        width: 80px;
        background: linear-gradient(90deg, #005bea, #00c6fb);
        margin: 15px auto 20px;
        border-radius: 20px;
    }

    /* ===== CONNECT GROUP SECTION ===== */
    .connect-section {
        background: linear-gradient(180deg, #eaf4ff, #ffffff);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .connect-section::after {
        content: '';
        position: absolute;
        bottom: -20%; right: -5%;
        width: 400px; height: 400px;
        background: linear-gradient(135deg, #005bea, #00c6fb);
        border-radius: 50%;
        opacity: 0.05;
    }

    .connect-card {
        background: white;
        border-radius: 20px;
        padding: 50px 35px;
        text-align: center;
        box-shadow: 0 12px 35px rgba(0,91,234,0.10);
        transition: all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);
        position: relative; z-index: 2;
        max-width: 550px;
        margin: 0 auto;
        border: 1px solid rgba(0,91,234,0.08);
    }

    .connect-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 24px 60px rgba(0,91,234,0.18);
    }

    .connect-icon {
        font-size: 3.5rem;
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50%       { transform: translateY(-15px); }
    }

    .connect-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 15px;
        color: #111827;
    }

    .connect-description {
        font-size: 1rem;
        color: #6b7280;
        margin-bottom: 25px;
        line-height: 1.7;
    }

    .btn-connect {
        background: linear-gradient(135deg, #005bea, #00c6fb);
        border: none;
        color: white;
        padding: 13px 35px;
        font-size: 1rem;
        font-weight: 800;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0,91,234,0.28);
        display: inline-block;
        text-decoration: none;
    }

    .btn-connect:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 36px rgba(0,91,234,0.38);
        color: white;
        text-decoration: none;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .about-grid { grid-template-columns: 1fr 360px; gap: 24px; }
        .about-image { height: 260px; }
    }

    @media (max-width: 768px) {
        .hero-home        { height: 400px; }
        .hero-welcome-img { max-width: 90%; max-height: 80%; }
        .tentang-title    { font-size: 1.8rem; text-align: center; }
        .tentang-description { font-size: 1rem; text-align: center; }
        .vision-heading   { text-align: center; }
        .about-grid       { grid-template-columns: 1fr; }
        .about-right      { order: -1; margin-bottom: 18px; }
        .bersama-title    { font-size: 1.8rem; }
        .bersama-subtitle { font-size: 1rem; }
        .verse-box        { padding: 20px; }
        .sesi-cards       { grid-template-columns: 1fr; gap: 16px; }
        .sesi-card        { padding: 20px; }
        .bersama-buttons  { flex-direction: column; }
        .btn-bersama-primary,
        .btn-bersama-secondary { width: 100%; text-align: center; }
        .connect-card     { padding: 35px 25px; }
        .connect-title    { font-size: 1.5rem; }
    }
</style>

{{-- ── HERO ── --}}
<section class="hero-home">
    <div class="video-bg">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="{{ asset('vidio/gbi.mp4') }}" type="video/mp4">
        </video>
    </div>
    <img src="{{ asset('gambar/welcome-home.svg') }}" alt="Welcome Home" class="hero-welcome-img">
</section>

{{-- ── BERSAMA DI GBI TAMBUNAN ── --}}
<section class="bersama-section">
    <div class="pattern-overlay"></div>
    <div class="container">
        <div class="text-center">
            <h2 class="bersama-title">Bersama di GBI Tambunan</h2>
            <p class="bersama-subtitle">Kita membangun tubuh Kristus dalam kesatuan, kasih, dan pelayanan</p>

            <div class="verse-box">
                "Karena kita adalah tubuh Kristus dan masing-masing adalah anggotanya."
                <div class="verse-reference">1 Korintus 12:27</div>
            </div>

            {{-- Sesi Cards --}}
            <div class="sesi-cards">
                <div class="sesi-card">
                    <div class="sesi-icon">🕘</div>
                    <h3 class="sesi-title">SESI 1</h3>
                    <p class="sesi-time">09:00 WIB</p>
                    <p class="sesi-place">+ Sekolah Minggu</p>
                </div>
                <div class="sesi-card">
                    <div class="sesi-icon">🕚</div>
                    <h3 class="sesi-title">SESI 2</h3>
                    <p class="sesi-time">11:00 WIB</p>
                    <p class="sesi-place">GBI Tambunan</p>
                </div>
                <div class="sesi-card">
                    <div class="sesi-icon">🕓</div>
                    <h3 class="sesi-title">SESI 3</h3>
                    <p class="sesi-time">16:00 WIB</p>
                    <p class="sesi-place">Post PI Sibarani</p>
                </div>
            </div>

            <div class="bersama-buttons">
                <a href="{{ route('user.jemaat') }}" class="btn-bersama-primary">Jadi Jemaat</a>
                <a href="{{ route('user.jadwal') }}" class="btn-bersama-secondary">Lihat Jadwal</a>
            </div>
        </div>
    </div>
</section>

{{-- ── TENTANG ── --}}
<section class="tentang-section">
    <div class="container">
        <div class="tentang-content">
            <div class="about-grid">
                <div class="about-left">
                    <h2 class="tentang-title">Tentang GBI Tambunan</h2>
                    <p class="tentang-description">GBI Tambunan adalah gereja sel dengan misi menjadikan murid Kristus di seluruh bangsa. Kami berkomitmen untuk membangun komunitas yang kuat dan fokus pada pertumbuhan rohani.</p>

                    <h3 class="vision-heading">Visi &amp; Misi Kami</h3>
                    <div class="vision-list">
                        <div class="vision-item">
                            <div class="vision-icon">❤️</div>
                            <div>
                                <div class="vision-title">Kasih kepada Tuhan</div>
                                <div class="vision-desc">"Kasihilah Tuhan, Allahmu, dengan segenap hatimu dan dengan segenap jiwamu dan dengan segenap akal budimu."</div>
                            </div>
                        </div>
                        <div class="vision-item">
                            <div class="vision-icon yellow">👥</div>
                            <div>
                                <div class="vision-title">Kasih kepada Sesama</div>
                                <div class="vision-desc">"Kasihilah sesamamu manusia seperti dirimu sendiri."</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-right">
                    <img src="{{ asset('gambar/pelayanan-orang-miskin.jpeg') }}" alt="GBI Tambunan" class="about-image">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── CONNECT GROUP ── --}}
<section class="connect-section">
    <div class="container">
        <div class="connect-card">
            <div class="connect-icon">🤝</div>
            <h3 class="connect-title">Connect Group</h3>
            <p class="connect-description">
                Bergabung dengan komunitas rohani kami untuk saling membangun dan berkembang bersama dalam iman Kristus.
            </p>
            <a href="#" class="btn-connect">Gabung Sekarang →</a>
        </div>
    </div>
</section>

@endsection