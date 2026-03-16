<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | GBI Tambunan</title>

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

        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 35px;
            color: white;
            box-shadow: 0px 15px 50px rgba(0,0,0,0.4);
            z-index: 10;
        }

        .login-card h2 {
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

        .btn-login {
            background: linear-gradient(90deg, #38bdf8, #9333ea);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
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

    <div class="login-card">

        <div class="text-center">
            <div class="logo-circle">
                <i class="bi bi-cross"></i>
            </div>

            <h2>GBI Tambunan</h2>
            <p class="mb-4" style="opacity: 0.85;">Silakan login untuk masuk ke sistem gereja</p>
        </div>

        <!-- Alert Error -->
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form action="{{ route('login.perform') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan email anda" value="{{ old('email') }}" required>

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

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>
                </div>

                <a href="#" class="small-link">Lupa Password?</a>
            </div>

            <button type="submit" class="btn btn-login w-100 text-white">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>
        </form>

        <a href="{{ route('register') }}" class="btn btn-outline-light w-100 mt-3">
            <i class="bi bi-person-plus"></i> Belum punya akun? Daftar
        </a>

        <div class="verse-box text-center">
            <i class="bi bi-book-half"></i>
            <strong> Mazmur 118:24</strong><br>
            “Inilah hari yang dijadikan TUHAN, marilah kita bersorak-sorai dan bersukacita karenanya.”
        </div>

        <div class="text-center mt-4 footer-text">
            © {{ date('Y') }} GBI Tambunan | Sistem Informasi Gereja
        </div>

    </div>

</body>
</html>
