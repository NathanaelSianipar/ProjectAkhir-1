@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-6 fw-bold mb-3">{{ $pengumuman->title }}</h1>
        <p class="text-muted">{{ $pengumuman->publish_date ?: '-' }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 900px;">
        @if($pengumuman->image)
            <img src="{{ asset('storage/' . $pengumuman->image) }}"
                 alt="{{ $pengumuman->title }}"
                 class="img-fluid rounded mb-4">
        @endif

        <div class="fs-6 text-muted" style="line-height: 1.9;">
            {!! nl2br(e($pengumuman->content)) !!}
        </div>

        <div class="mt-4">
            <a href="{{ route('user.pengumuman') }}" class="btn btn-outline-primary">
                ← Kembali ke Pengumuman
            </a>
        </div>
    </div>
</section>
@endsection