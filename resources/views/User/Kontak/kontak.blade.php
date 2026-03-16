<?php
$gereja = "GBI Tambunan";
$whatsapp = "6281384871163"; // tanpa tanda +
?>

@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="container">
        <h1 class="fw-bold">Hubungi Kami</h1>
        <p>Kami senang mendengar dari Anda. Jangan ragu untuk menghubungi kami kapan saja.</p>
    </div>
</section>

<!-- AYAT -->
<section class="section pt-5">
    <div class="container">
        <div class="card card-custom p-4 text-center col-md-8 mx-auto">
            <div class="mb-3">
                <i class="fa-solid fa-book-bible fa-2x text-primary"></i>
            </div>
            <p class="fst-italic">
                “Sebab itu sejak waktu kami mendengarnya, kami tidak berhenti-henti berdoa untuk kamu.
                Kami meminta, supaya kamu menerima segala hikmat dan pengertian yang benar,
                untuk mengetahui kehendak Tuhan.”
            </p>
            <small class="text-primary fw-semibold">Kolose 1:9 (TB)</small>
        </div>
    </div>
</section>

<!-- KONTAK -->
<section class="section">
<div class="container">
<div class="row">

    <!-- INFORMASI KONTAK -->
    <div class="col-md-6">
        <h4 class="fw-bold mb-4">Informasi Kontak</h4>

        <div class="card card-custom p-3 mb-3">
            <div class="d-flex align-items-start">
                <div class="icon-box bg-blue me-3">
                    <i class="fa fa-location-dot"></i>
                </div>
                <div>
                    <strong>Alamat</strong><br>
                    Jl. Pasar Tambunan Desa No.4<br>
                    Lumban Pea, Kec. Balige<br>
                    Toba, Sumatera Utara
                </div>
            </div>
        </div>

        <div class="card card-custom p-3 mb-3">
            <div class="d-flex align-items-start">
                <div class="icon-box bg-green me-3">
                    <i class="fa fa-phone"></i>
                </div>
                <div>
                    <strong>Telepon</strong><br>
                    +62 813-8487-1163
                </div>
            </div>
        </div>

        <div class="card card-custom p-3 mb-3">
            <div class="d-flex align-items-start">
                <div class="icon-box bg-orange me-3">
                    <i class="fa fa-envelope"></i>
                </div>
                <div>
                    <strong>Email</strong><br>
                    gbitambunan01@gmail.com
                </div>
            </div>
        </div>

        <div class="card card-custom p-3">
            <div class="d-flex align-items-start">
                <div class="icon-box bg-purple me-3">
                    <i class="fa fa-clock"></i>
                </div>
                <div>
                    <strong>Jam Sekretariat</strong><br>
                    Senin - Jumat : 09.00 - 17.00 WIB<br>
                    Sabtu : 09.00 - 15.00 WIB<br>
                    Minggu : Setelah ibadah
                </div>
            </div>
        </div>

    </div>

    <!-- FORM -->
    <div class="col-md-6">
        <div class="card card-custom p-4">
            <h5 class="fw-bold mb-3">Kirim Pesan</h5>
            <form onsubmit="kirimWA(); return false;">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" id="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pesan</label>
                    <textarea id="pesan" rows="4" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-whatsapp w-100">
                    <i class="fa-brands fa-whatsapp me-2"></i>
                    Kirim Pesan via WhatsApp
                </button>
            </form>
        </div>
    </div>

</div>
</div>
</section>

<footer class="text-center py-3 bg-primary text-white">
    &copy; <?= date("Y"); ?> <?= $gereja ?> - All Rights Reserved
</footer>

<script>
function kirimWA(){
    var nama = document.getElementById("nama").value;
    var email = document.getElementById("email").value;
    var pesan = document.getElementById("pesan").value;

    var text = "Shalom 🙏%0A%0A"
        + "Nama: " + nama + "%0A"
        + "Email: " + email + "%0A"
        + "Pesan: " + pesan;

    var url = "https://wa.me/<?= $whatsapp ?>?text=" + text;
    window.open(url, '_blank');
}
</script>

@endsection
