<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>GBI Tambunan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
<div class="container">
    <a class="navbar-brand" href="{{ route('welcome') }}"><img src="/gambar/gbi.jpeg" alt="GBI Tambunan" height="40"> GBI TAMBUNAN</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menuNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto menu-navbar align-items-center">
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.tentang') }}">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.jadwal') }}">Jadwal</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.khotbah') }}">Khotbah</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.pengumuman') }}">Pengumuman</a></li>

            @auth
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth

            <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-3" href="{{ route('user.jemaat') }}">Jadi Jemaat</a></li>
        </ul>
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
                <li><a href="{{ route('user.khotbah') }}">Khotbah</a></li>
                <li><a href="{{ route('user.pelayanan') }}">Pelayanan</a></li>
                <li><a href="{{ route('user.pengumuman') }}">Pengumuman</a></li>
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

</body>
</html>
