@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="py-5 bg-light">
<div class="container">
    <h1 class="display-4 fw-bold text-center mb-3">Khotbah</h1>
    <p class="text-center text-muted">Mendengarkan firman Tuhan untuk kehidupan yang lebih bermakna</p>
</div>
</section>

<!-- Sermon List -->
<section class="py-5">
<div class="container">
    <div class="row g-4">
        <!-- Sermon Item 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card-sermon bg-primary text-white">
                <div class="sermon-image">
                    <div class="text-center">
                        <i class="sermon-icon bi bi-play-circle"></i>
                        <p class="mt-2 mb-0">Video Khotbah</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Iman dalam Cobaan</h5>
                    <p class="card-text text-muted"></p>
                    <small class="text-secondary">2 Januari 2025</small>
                </div>
            </div>
        </div>

        <!-- Sermon Item 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card-sermon bg-primary text-white">
                <div class="sermon-image">
                    <div class="text-center">
                        <i class="sermon-icon bi bi-play-circle"></i>
                        <p class="mt-2 mb-0">Video Khotbah</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Kasih Kristus yang Sempurna</h5>
                    <p class="card-text text-muted"></p>
                    <small class="text-secondary">26 Desember 2024</small>
                </div>
            </div>
        </div>

        <!-- Sermon Item 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card-sermon bg-primary text-white">
                <div class="sermon-image">
                    <div class="text-center">
                        <i class="sermon-icon bi bi-play-circle"></i>
                        <p class="mt-2 mb-0">Video Khotbah</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hidup yang Berbuah</h5>
                    <p class="card-text text-muted"></p>
                    <small class="text-secondary">19 Desember 2024</small>
                </div>
            </div>
        </div>

        <!-- Sermon Item 4 -->
        <div class="col-md-6 col-lg-4">
            <div class="card-sermon bg-primary text-white">
                <div class="sermon-image">
                    <div class="text-center">
                        <i class="sermon-icon bi bi-play-circle"></i>
                        <p class="mt-2 mb-0">Video Khotbah</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ketaatan kepada Firman</h5>
                    <p class="card-text text-muted"></p>
                    <small class="text-secondary">12 Desember 2024</small>
                </div>
            </div>
        </div>

        <!-- Sermon Item 5 -->
        <div class="col-md-6 col-lg-4">
            <div class="card-sermon bg-primary text-white">
                <div class="sermon-image">
                    <div class="text-center">
                        <i class="sermon-icon bi bi-play-circle"></i>
                        <p class="mt-2 mb-0">Video Khotbah</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Kuasa Doa</h5>
                    <p class="card-text text-muted"></p>
                    <small class="text-secondary">5 Desember 2024</small>
                </div>
            </div>
        </div>

        <!-- Sermon Item 6 -->
        <div class="col-md-6 col-lg-4">
            <div class="card-sermon bg-primary text-white">
                <div class="sermon-image">
                    <div class="text-center">
                        <i class="sermon-icon bi bi-play-circle"></i>
                        <p class="mt-2 mb-0">Video Khotbah</p>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Pertumbuhan Rohani</h5>
                    <p class="card-text text-muted"></p>
                    <small class="text-secondary">28 November 2024</small>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
