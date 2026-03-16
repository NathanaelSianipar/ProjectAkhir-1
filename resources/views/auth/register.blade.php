<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | GBI Tambunan</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e3a8a, #9333ea);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            overflow: hidden;
        }

        .circle-bg {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            animation: float 8s ease-in-out infinite;
        }

        .circle1 {
            background: #38bdf8;
            top: -150px;
            left: -150px;
        }

        .circle2 {
            background: #f472b6;
            bottom: -150px;
            right: -150px;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(30px); }
        }

        .register-card {
            width: 100%;
            max-width: 470px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 35px;
            color: white;
            box-shadow: 0px 15px 50px rgba(0,0,0,0.4);
            z-index: 10;
        }

        .register-card h2 {
            font-weight: 700;
        }

        .logo-circle {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            margin-bottom: 15px;
            font-size: 35px;
            color: #38bdf8;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .form-control {
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            border-radius: 12px;
            padding: 12px;
        }

        .form-control:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 0.2rem rgba(56,189,248,0.3);
            background: rgba(255,255,255,0.18);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .btn-register {
            background: linear-gradient(90deg, #38bdf8, #9333ea);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0px 10px 30px rgba(56,189,248,0.4);
        }

        .verse-box {
            font-size: 14px;
            padding: 12px;
            border-radius: 12px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            margin-top: 15px;
        }

        .small-link {
            color: #38bdf8;
            text-decoration: none;
        }

        .small-link:hover {
            text-decoration: underline;
        }

        .footer-text {
            font-size: 12px;
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="circle-bg circle1"></div>
    <div class="circle-bg circle2"></div>

    <div class="register-card">

        <div class="text-center">
            <div class="logo-circle">
                <i class="bi bi-person-plus-fill"></i>
            </div>

            <h2>Register Akun</h2>
            <p class="mb-4" style="opacity: 0.85;">Daftar untuk bergabung di Sistem GBI Tambunan</p>
        </div>

        <!-- FORM REGISTER -->
        <form action="{{ route('register.perform') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>

                @error('name')
                    <small class="text-warning">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan email aktif" value="{{ old('email') }}" required>

                @error('email')
                    <small class="text-warning">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password" required>

                @error('password')
                    <small class="text-warning">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn btn-register w-100 text-white">
                <i class="bi bi-person-check-fill"></i> Register
            </button>

            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="{{ route('login') }}" class="small-link">Login</a></small>
            </div>
        </form>

        <div class="verse-box text-center">
            <i class="bi bi-book-half"></i>
            <strong> Yeremia 29:11</strong><br>
            “Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu...”
        </div>

        <div class="text-center mt-4 footer-text">
            © {{ date('Y') }} GBI Tambunan | Sistem Informasi Gereja
        </div>

    </div>

</body>
</html>
