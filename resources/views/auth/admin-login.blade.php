@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background:
            radial-gradient(circle at bottom right, rgba(255, 105, 180, 0.25), transparent 25%),
            linear-gradient(135deg, #0b5f8a 0%, #182f78 45%, #5b2fd3 100%);
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 15px;
    }

    .login-card {
        width: 100%;
        max-width: 450px;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 24px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.20);
        padding: 32px 28px;
        color: #ffffff;
    }

    .logo-wrapper {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 20px;
        border: 3px solid rgba(255, 255, 255, 0.25);
        background: rgba(255, 255, 255, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .logo-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
    }

    .login-title {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #ffffff;
    }

    .login-subtitle {
        text-align: center;
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 28px;
    }

    .form-label {
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.18);
        color: #ffffff;
        border-radius: 14px;
        padding: 14px 16px;
        height: auto;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.65);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.16);
        color: #ffffff;
        border-color: rgba(255, 255, 255, 0.35);
        box-shadow: none;
    }

    .form-check-label {
        color: rgba(255, 255, 255, 0.9);
    }

    .form-check-input {
        border-radius: 4px;
    }

    .login-btn {
        width: 100%;
        border: none;
        border-radius: 14px;
        padding: 13px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #ffffff;
        background: linear-gradient(90deg, #37b6f4 0%, #9b35ea 100%);
        box-shadow: 0 10px 25px rgba(109, 76, 255, 0.35);
        transition: 0.3s ease;
    }

    .login-btn:hover {
        transform: translateY(-1px);
        opacity: 0.95;
    }

    .verse-box {
        margin-top: 18px;
        padding: 18px 16px;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.10);
        border: 1px solid rgba(255, 255, 255, 0.10);
        text-align: center;
    }

    .verse-title {
        font-weight: 700;
        margin-bottom: 8px;
        color: #ffffff;
    }

    .verse-text {
        margin: 0;
        font-size: 0.95rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.9);
    }

    .footer-text {
        text-align: center;
        margin-top: 22px;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .alert {
        border-radius: 12px;
    }

    @media (max-width: 576px) {
        .login-card {
            padding: 24px 18px;
        }

        .login-title {
            font-size: 1.7rem;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-card">

        <div class="logo-wrapper">
            @if(file_exists(public_path('gambar/gbi.jpeg')))
                <img src="{{ asset('gambar/gbi.jpeg') }}" alt="Logo GBI Tambunan">
            @else
                <div class="logo-placeholder"></div>
            @endif
        </div>

        <h1 class="login-title">GBI Tambunan</h1>
        <p class="login-subtitle">Silakan login untuk masuk ke sistem gereja</p>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Email / Username</label>
                <input
                    type="text"
                    name="login"
                    id="login"
                    class="form-control @error('login') is-invalid @enderror"
                    value="{{ old('login') }}"
                    placeholder="Masukkan email atau username anda"
                    required
                >
                @error('login')
                    <div class="text-warning small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password"
                    required
                >
                @error('password')
                    <div class="text-warning small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input
                    type="checkbox"
                    name="remember"
                    class="form-check-input"
                    id="remember"
                >
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="login-btn">
                Login
            </button>
        </form>

        <div class="verse-box">
            <div class="verse-title">Mazmur 118:24</div>
            <p class="verse-text">
                “Inilah hari yang dijadikan TUHAN, marilah kita bersorak-sorai dan bersukacita karenanya.”
            </p>
        </div>

        <div class="footer-text">
            © 2026 GBI Tambunan | Sistem Informasi Gereja
        </div>
    </div>
</div>
@endsection