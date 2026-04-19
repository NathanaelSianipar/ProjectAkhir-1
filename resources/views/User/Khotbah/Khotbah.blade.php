@extends('layouts.app')

@section('content')

<style>
.card-sermon{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    transition:all 0.3s ease;
    height:100%;
    display:flex;
    flex-direction:column;
}

.card-sermon:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 40px rgba(0,0,0,0.14);
}

.sermon-image-wrap{
    width:100%;
    height:230px;
    overflow:hidden;
    background:#eef2f7;
}

.sermon-image{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

.sermon-placeholder{
    display:flex;
    align-items:center;
    justify-content:center;
    color:#2563eb;
    background:linear-gradient(135deg,#eff6ff,#dbeafe);
}

.sermon-icon{
    font-size:58px;
}

.sermon-body{
    padding:18px 18px 20px;
    display:flex;
    flex-direction:column;
    flex:1;
}

.sermon-meta{
    font-size:13px;
    color:#6b7280;
    margin-bottom:8px;
}

.sermon-title{
    font-size:30px;
    font-weight:700;
    color:#111827;
    margin-bottom:10px;
    line-height:1.35;
}

.sermon-desc{
    font-size:14px;
    color:#6b7280;
    line-height:1.7;
    margin-bottom:18px;
    flex-grow:1;
}

.sermon-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:10px 16px;
    border-radius:10px;
    background:#2563eb;
    color:#fff;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    transition:all 0.25s ease;
    border:none;
}

.sermon-btn:hover{
    background:#1d4ed8;
    color:#fff;
}

.sermon-btn.disabled{
    background:#cbd5e1;
    color:#fff;
    cursor:not-allowed;
}

@media(max-width:768px){
    .sermon-image-wrap{
        height:210px;
    }
}
</style>

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
        @forelse($khotbah as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card-sermon">
                    <div class="sermon-image">
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                 alt="{{ $item->title }}"
                                 style="width:100%;height:220px;object-fit:cover;">
                        @else
                            <div class="text-center">
                                <i class="sermon-icon bi bi-play-circle"></i>
                                <p class="mt-2 mb-0">Video Khotbah</p>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text text-muted">{{ $item->description }}</p>
                        <small class="text-secondary">
                            {{ $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->format('d F Y') : '-' }}
                        </small>

                        @if($item->video)
                            <div class="mt-3">
                                <a href="{{ $item->video }}" target="_blank" class="btn btn-light btn-sm">
                                    Tonton Khotbah
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Belum ada khotbah tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
</section>

@endsection