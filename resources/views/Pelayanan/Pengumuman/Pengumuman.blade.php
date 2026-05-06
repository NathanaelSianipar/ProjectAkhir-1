@extends('Pelayanan.layouts.guest')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-5 fw-bold text-center mb-3">Pengumuman Gereja</h1>
        <p class="text-center text-muted">Informasi terbaru dan pengumuman resmi dari gereja.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse($pengumuman as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height:220px;object-fit:cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <small class="text-muted mb-2">
                                {{ $item->publish_date ?: '-' }}
                            </small>

                            <h5 class="fw-bold">{{ $item->title }}</h5>

                            <p class="text-muted flex-grow-1">
                                {{ \Illuminate\Support\Str::limit($item->content, 120) }}
                            </p>

                            <a href="{{ route('user.pengumuman.show', $item->id) }}" class="btn btn-primary btn-sm mt-2">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection