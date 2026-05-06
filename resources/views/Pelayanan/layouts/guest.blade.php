<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>GBI Tambunan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* ── NAVBAR WRAPPER ── */
        .navbar-gbi {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            padding: 18px 0;
            transition: padding 0.4s ease;
            background: transparent;
        }

        .navbar-gbi.scrolled {
            padding: 10px 0;
        }

        /* ── INNER CONTAINER ── */
        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            background: transparent;
            transition: background 0.4s ease, box-shadow 0.4s ease, backdrop-filter 0.4s ease, padding 0.4s ease;
            padding: 0;
            border-radius: 0;
        }

        .navbar-gbi.scrolled .navbar-inner {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(22px) saturate(180%);
            -webkit-backdrop-filter: blur(22px) saturate(180%);
            box-shadow: 0 4px 32px rgba(0, 91, 234, 0.13);
            padding: 8px 22px;
            border-radius: 100px;
        }

        /* ── BRAND ── */
        .navbar-brand-gbi {
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 17px;
            letter-spacing: 0.4px;
            color: white;
            text-decoration: none;
            white-space: nowrap;
            transition: color 0.3s;
            flex-shrink: 0;
        }

        .navbar-gbi.scrolled .navbar-brand-gbi {
            color: #0f172a;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(255,255,255,0.5);
            transition: border-color 0.3s, width 0.3s, height 0.3s;
            flex-shrink: 0;
        }

        .navbar-gbi.scrolled .brand-logo {
            border-color: rgba(0,91,234,0.25);
            width: 34px;
            height: 34px;
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* ── OVAL NAV PILL ── */
        .nav-pill-wrap {
            display: flex;
            align-items: center;
            gap: 2px;
            background: rgba(255, 255, 255, 0.18);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            border-radius: 100px;
            padding: 5px 8px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: background 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease;
        }

        .navbar-gbi.scrolled .nav-pill-wrap {
            background: rgba(241, 245, 249, 0.95);
            border-color: rgba(0, 91, 234, 0.15);
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }

        /* ── NAV LINKS ── */
        .nav-link-gbi {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.93);
            text-decoration: none;
            padding: 7px 14px;
            border-radius: 100px;
            letter-spacing: 0.1px;
            transition: background 0.22s ease, color 0.22s ease;
            white-space: nowrap;
        }

        .nav-link-gbi:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
        }

        .nav-link-gbi.active {
            background: white;
            color: #005bea;
        }

        .navbar-gbi.scrolled .nav-link-gbi {
            color: #374151;
        }

        .navbar-gbi.scrolled .nav-link-gbi:hover {
            background: rgba(0, 91, 234, 0.09);
            color: #005bea;
        }

        .navbar-gbi.scrolled .nav-link-gbi.active {
            background: linear-gradient(135deg, #005bea, #00c6fb);
            color: white;
        }

        /* ── RIGHT ACTIONS ── */
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        /* ── CTA BUTTON ── */
        .btn-jemaat {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: white;
            color: #005bea !important;
            border: none;
            border-radius: 100px;
            padding: 9px 22px;
            font-size: 13.5px;
            font-weight: 800;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(0,0,0,0.16);
            display: inline-block;
            white-space: nowrap;
        }

        .btn-jemaat:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.22);
            color: #004acc !important;
        }

        .navbar-gbi.scrolled .btn-jemaat {
            background: linear-gradient(135deg, #005bea, #00c6fb);
            color: white !important;
            box-shadow: 0 4px 14px rgba(0,91,234,0.35);
        }

        .navbar-gbi.scrolled .btn-jemaat:hover {
            box-shadow: 0 8px 22px rgba(0,91,234,0.45);
            color: white !important;
        }

        /* ── USER AVATAR ── */
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, #005bea, #00c6fb);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 800;
            border: 2.5px solid rgba(255,255,255,0.6);
            cursor: pointer;
            transition: border-color 0.3s, transform 0.2s;
        }

        .user-avatar:hover { transform: scale(1.06); }

        .navbar-gbi.scrolled .user-avatar {
            border-color: rgba(0,91,234,0.3);
        }

        .dropdown-menu {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.13);
            padding: 8px;
            min-width: 170px;
        }

        .dropdown-item {
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            padding: 9px 14px;
            color: #374151;
        }

        .dropdown-item:hover {
            background: #eff6ff;
            color: #005bea;
        }

        /* ── MOBILE TOGGLER ── */
        .toggler-gbi {
            border: none;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            padding: 8px 10px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 5px;
            transition: background 0.3s;
        }

        .toggler-gbi:hover { background: rgba(255,255,255,0.3); }

        .navbar-gbi.scrolled .toggler-gbi { background: #f1f5f9; }

        .toggler-gbi span {
            display: block;
            width: 22px;
            height: 2.5px;
            border-radius: 3px;
            background: white;
            transition: background 0.3s;
        }

        .navbar-gbi.scrolled .toggler-gbi span { background: #1e293b; }

        /* ── MOBILE MENU ── */
        @media (max-width: 991px) {
            .nav-pill-wrap { display: none; }

            .mobile-menu {
                margin-top: 14px;
                background: rgba(255,255,255,0.97);
                backdrop-filter: blur(20px);
                border-radius: 22px;
                padding: 12px 10px;
                box-shadow: 0 12px 40px rgba(0,0,0,0.13);
            }

            .mobile-menu .nav-link-gbi {
                color: #1e293b;
                padding: 11px 16px;
                display: block;
                border-radius: 12px;
                font-size: 14.5px;
            }

            .mobile-menu .nav-link-gbi:hover {
                background: #eff6ff;
                color: #005bea;
            }

            .mobile-menu .nav-link-gbi.active {
                background: linear-gradient(135deg, #005bea, #00c6fb);
                color: white;
            }

            .mobile-menu-footer {
                padding: 10px 6px 4px;
                border-top: 1px solid #f1f5f9;
                margin-top: 6px;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .btn-jemaat-mobile {
                font-family: 'Plus Jakarta Sans', sans-serif;
                display: block;
                text-align: center;
                background: linear-gradient(135deg, #005bea, #00c6fb);
                color: white !important;
                border-radius: 100px;
                padding: 12px 20px;
                font-size: 14px;
                font-weight: 800;
                text-decoration: none;
            }
        }

        body { padding-top: 0; }
        body.has-no-hero { padding-top: 90px; }
    </style>
</head>
<body>

<nav class="navbar-gbi" id="mainNavbar">
    <div class="container">

        {{-- ── DESKTOP ── --}}
        <div class="navbar-inner d-none d-lg-flex" id="navbarInner">

            <a class="navbar-brand-gbi" href="{{ route('welcome') }}">
                <div class="brand-logo">
                    <img src="/gambar/gbi.jpeg" alt="GBI Tambunan">
                </div>
                GBI TAMBUNAN
            </a>

            {{-- Oval pill nav --}}
            <div class="nav-pill-wrap">
                <a class="nav-link-gbi" href="{{ route('home') }}">Beranda</a>
                <a class="nav-link-gbi" href="{{ route('user.tentang') }}">Tentang</a>
                <a class="nav-link-gbi" href="{{ route('user.jadwal') }}">Jadwal</a>
                <a class="nav-link-gbi" href="{{ route('user.pelayanan') }}">Pelayanan</a>
                <a class="nav-link-gbi" href="{{ route('user.khotbah') }}">Khotbah</a>
                <a class="nav-link-gbi" href="{{ route('user.kontak') }}">Kontak</a>
                <a class="nav-link-gbi" href="{{ route('user.pengumuman') }}">Pengumuman</a>
            </div>

            <div class="navbar-actions">
                @auth
                    <div class="dropdown">
                        <div class="user-avatar"
                             id="userMenuDesktop"
                             data-bs-toggle="dropdown"
                             aria-expanded="false"
                             title="{{ Auth::user()->name }}">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuDesktop">
                            <li>
                                <span class="dropdown-item text-muted" style="font-size:12px;cursor:default;font-weight:700;">
                                    {{ Auth::user()->name }}
                                </span>
                            </li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

                <a href="{{ route('user.jemaat') }}" class="btn-jemaat">Jadi Jemaat</a>
            </div>

        </div>

        {{-- ── MOBILE ── --}}
        <div class="d-flex d-lg-none align-items-center justify-content-between">
            <a class="navbar-brand-gbi" href="{{ route('welcome') }}">
                <div class="brand-logo">
                    <img src="/gambar/gbi.jpeg" alt="GBI Tambunan">
                </div>
                GBI TAMBUNAN
            </a>

            <button class="toggler-gbi"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mobileMenu"
                    aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="collapse d-lg-none" id="mobileMenu">
            <div class="mobile-menu">
                <a class="nav-link-gbi" href="{{ route('home') }}">Beranda</a>
                <a class="nav-link-gbi" href="{{ route('pelayanan.tentang') }}">Tentang Kami</a>
                <a class="nav-link-gbi" href="{{ route('pelayanan.jadwal') }}">Jadwal</a>
                <a class="nav-link-gbi" href="{{ route('user.pelayanan') }}">Pelayanan</a>
                <a class="nav-link-gbi" href="{{ route('pelayanan.khotbah') }}">Khotbah</a>
                <a class="nav-link-gbi" href="{{ route('user.kontak') }}">Kontak</a>
                <a class="nav-link-gbi" href="{{ route('pelayanan.pengumuman') }}">Pengumuman</a>

                <div class="mobile-menu-footer">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit"
                                    class="nav-link-gbi w-100 text-start border-0"
                                    style="background:none;cursor:pointer;color:#dc2626;">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout ({{ Auth::user()->name }})
                            </button>
                        </form>
                    @endauth
                    <a href="{{ route('user.jemaat') }}" class="btn-jemaat-mobile">Jadi Jemaat</a>
                </div>
            </div>
        </div>

    </div>
</nav>

@yield('content')

<footer class="text-white py-5">
<div class="container">
    <div class="row mb-5">
        <!-- Left Column -->
        <div class="col-md-4 mb-4 mb-md-0 footer-section">
            <div class="mb-4">
                <div class="footer-logo-box">
                    <div class="logo-icon">
                        <span>GBI</span>
                    </div>
                    <div>
                        <h5 style="font-weight: 700; margin-bottom: 2px;">GBI Tambunan</h5>
                        <small style="color: #b0b9c6;">Gereja Bethel Indonesia</small>
                    </div>
                </div>
            </div>
            <p class="footer-desc">Bersama membangun tubuh Kristus dalam kesatuan, kasih, dan pelayanan. Bergabunglah dengan keluarga rohani kami.</p>
            <div class="social-links">
                <a href="https://web.facebook.com/GBITAMBUNANN?rdid=zpGHgA8KUOTtVrdh&share_url=https%253A%252F%252Fweb.facebook.com%252Fshare%252F1B1rxgFbQi%252F%253F_rdc%253D1%2526_rdr#"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/gbitambunan_/"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/@gbitambunan2080"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <!-- Middle Column -->
        <div class="col-md-4 mb-4 mb-md-0 footer-section">
            <h5>Menu</h5>
            <ul>
                <li><a href="{{ route('welcome') }}">Beranda</a></li>
                <li><a href="{{ route('user.tentang') }}">Tentang Kami</a></li>
                <li><a href="{{ route('user.jadwal') }}">Jadwal</a></li>
                <li><a href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
                <li><a href="{{ route('user.khotbah') }}">Khotbah</a></li>
                <li><a href="{{ route('user.kontak') }}">Kontak</a></li>
                <li><a href="{{ route('user.pengumuman') }}">Pengumuman</a></li>
                <li><a href="{{ route('welcome') }}">Login</a></li>
            </ul>
        </div>

        <!-- Right Column -->
        <div class="col-md-4 footer-section">
            <h5>Kontak</h5>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                <div>
                    <small style="color: #b0b9c6; line-height: 1.6;">Jl. Pasar Tambunan Desa No.4<br>Lumban Pea, Kec. Balige<br>Toba, Sumatera Utara</small>
                </div>
            </div>

            <div class="contact-item flex-center">
                <div class="contact-icon">
                    <i class="bi bi-telephone"></i>
                </div>
                <div>
                    <a href="tel:+6285370385542" class="text-white text-decoration-none" style="color: #b0b9c6;">+62 853-7038-5542</a>
                </div>
            </div>

            <div class="contact-item flex-center">
                <div class="contact-icon">
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <a href="mailto:gbitambunan01@gmail.com" class="text-white text-decoration-none" style="color: #b0b9c6;">gbitambunan01@gmail.com</a>
                </div>
            </div>
        </div>
    </div>

    <hr class="footer-divider">

    <!-- Bottom Section -->
    <div class="footer-bottom">
        <p class="copyright">© 2025 GBI Tambunan. All rights reserved. Made with <span class="heart">❤</span> for God's glory.</p>
        <p class="built-with">Built with <strong>Team 05</strong></p>
    </div>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const navbar = document.getElementById('mainNavbar');

    const updateNavbar = () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    };

    window.addEventListener('scroll', updateNavbar, { passive: true });
    updateNavbar();

    const currentPath = window.location.pathname;
    document.querySelectorAll('.nav-link-gbi').forEach(link => {
        if (link.getAttribute('href') === currentPath) link.classList.add('active');
    });
</script>

</body>
</html>