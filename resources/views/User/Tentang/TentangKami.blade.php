@extends('layouts.app')

@section('content')

<style>
.hero{
    background: linear-gradient(135deg,#2563eb,#3b82f6);
    color:white;
    padding:80px 20px;
    text-align:center;
}

.section{
    padding:70px 0;
}

.section h2{
    font-weight:700;
}

.section p{
    color:#6b7280;
    line-height:1.7;
}

.card-about{
    background:#fff;
    border-radius:16px;
    padding:30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.gembala-img{
    width:150px;
    height:150px;
    object-fit:cover;
    border-radius:50%;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
}
</style>

@if($data)

<!-- HERO -->
<section class="hero">
    <h1>{{ $data->header_title }}</h1>
    <p>{{ $data->header_description }}</p>
</section>

<!-- SEJARAH -->
<section class="section bg-light">
    <div class="container">
        <div class="card-about text-center">
            <h2 class="mb-4">Sejarah</h2>
            <p>{{ $data->sejarah }}</p>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="section">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="card-about text-center h-100">
                    <h3 class="mb-3">Visi</h3>
                    <p>{{ $data->visi }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-about text-center h-100">
                    <h3 class="mb-3">Misi</h3>
                    <p>{{ $data->misi }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- GEMBALA -->
<section class="section bg-light">
    <div class="container text-center">

        <h2 class="mb-5">Gembala</h2>

        @if($data->gembala_foto)
            <img src="{{ asset('storage/' . $data->gembala_foto) }}"
                 class="gembala-img mb-3"
                 alt="Gembala">
        @endif

        <h5 class="fw-bold">{{ $data->gembala_nama }}</h5>
        <small class="text-muted">{{ $data->gembala_jabatan }}</small>

        <p class="mt-3" style="max-width:600px;margin:auto;">
            {{ $data->gembala_deskripsi }}
        </p>

    </div>
</section>

@else

<div class="text-center mt-5">
    <h3>Data belum tersedia</h3>
</div>

@endif

@endsection 