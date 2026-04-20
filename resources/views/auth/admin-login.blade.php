@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 450px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h3 class="mb-4 text-center">Login Admin</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Email / Username</label>
                    <input type="text" name="login" class="form-control" value="{{ old('login') }}" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection