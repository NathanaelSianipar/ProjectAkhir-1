@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="py-5 bg-light">
<div class="container">
    <h1 class="display-4 fw-bold text-center mb-3">Bergabunglah dengan Kami</h1>
    <p class="text-center text-muted">Jadilah bagian dari keluarga besar GBI Tambunan</p>
</div>
</section>

<!-- Registration Form -->
<section class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <h3 class="mb-4 text-center">Formulir Pendaftaran Jemaat</h3>
                    
                    <form action="#" method="POST" class="needs-validation">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select" required>
                                    <option value="">Pilih...</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pernah Mengikuti Khotbah?</label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengalaman" id="sudah" value="sudah">
                                    <label class="form-check-label" for="sudah">
                                        Sudah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengalaman" id="belum" value="belum">
                                    <label class="form-check-label" for="belum">
                                        Belum (Pengunjung Pertama Kali)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Pesan / Pertanyaan</label>
                            <textarea class="form-control" rows="4" placeholder="Ada yang ingin Anda tanyakan..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-check-circle"></i> Daftar Sekarang
                        </button>
                    </form>

                    <hr class="my-4">
                    
                    <p class="text-center text-muted mb-0">
                        Atau hubungi kami langsung di <strong>+62 853-7038-5542</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Info Section -->
<section class="py-5 bg-light">
<div class="container">
    <h3 class="text-center mb-5">Mengapa Bergabung dengan GBI Tambunan?</h3>
    
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <div class="mb-3">
                    <i class="bi bi-people-fill icon-xl"></i>
                </div>
                <h5>Komunitas Iman</h5>
                <p class="text-muted">Bergabung dengan keluarga rohani yang suportif</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <div class="mb-3">
                    <i class="bi bi-book-fill icon-xl"></i>
                </div>
                <h5>Pelajaran Firman</h5>
                <p class="text-muted">Belajar Alkitab dengan guru-guru berpengalaman</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <div class="mb-3">
                    <i class="bi bi-heart-fill icon-xl"></i>
                </div>
                <h5>Dukungan Spiritual</h5>
                <p class="text-muted">Mendapat bimbingan dalam perjalanan iman</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <div class="mb-3">
                    <i class="bi bi-hand-thumbs-up-fill icon-xl"></i>
                </div>
                <h5>Pelayanan</h5>
                <p class="text-muted">Kesempatan untuk melayani sesuai talenta</p>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
