<?php
// Data bisa diganti dari database nanti
$gereja = [
    "nama" => "GBI Tambunan",
    "tagline" => "Mengenal lebih dekat sejarah, visi, misi, dan keluarga besar GBI Tambunan",
    "tahun_berdiri" => "1970",
    "gembala" => "Pdm. Roberto Sibarani, M.Th",
    "jabatan" => "Gembala Sidang"
];
?>

@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="container">
        <h1 class="fw-bold"><?= $gereja['nama']; ?></h1>
        <p class="lead"><?= $gereja['tagline']; ?></p>
    </div>
</section>

<!-- SEJARAH -->
<section class="section bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Sejarah Kami</h2>

        <div class="card card-custom p-4 col-md-8 mx-auto" data-aos="fade-up">
            <p>
                GBI Tambunan adalah bagian dari sinode Gereja Bethel Indonesia.
                Sejak berdiri pada tahun <?= $gereja['tahun_berdiri']; ?>,
                kami berkomitmen untuk melayani Tuhan dan membangun komunitas
                yang bertumbuh dalam iman, pengharapan, dan kasih.
            </p>
        </div>

        <div class="row mt-5">
            <div class="col-md-6 mb-4" data-aos="fade-right">
                <div class="card card-custom p-4 text-center">
                    <div class="icon-box-lg bg-soft-blue mb-3">
                        <i class="fa-solid fa-calendar"></i>
                    </div>
                    <h5><?= $gereja['tahun_berdiri']; ?></h5>
                    <p>Berdirinya Gereja Bethel Indonesia</p>
                </div>
            </div>

            <div class="col-md-6 mb-4" data-aos="fade-left">
                <div class="card card-custom p-4 text-center">
                    <div class="icon-box-lg bg-soft-green mb-3">
                        <i class="fa-solid fa-people-group"></i>
                    </div>
                    <h5>Sekarang</h5>
                    <p>Melayani komunitas lokal dengan kasih Kristus</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="section">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Visi & Misi</h2>

        <div class="row">
            <div class="col-md-6 mb-4" data-aos="zoom-in">
                <div class="card card-custom p-5">
                    <div class="icon-box bg-soft-blue mb-3">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h5>Kasih kepada Tuhan</h5>
                    <p>
                        “Kasihilah Tuhan, Allahmu, dengan segenap hatimu,
                        jiwamu dan akal budimu.”
                    </p>
                </div>
            </div>

            <div class="col-md-6 mb-4" data-aos="zoom-in">
                <div class="card card-custom p-5">
                    <div class="icon-box bg-soft-orange mb-3">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h5>Kasih kepada Sesama</h5>
                    <p>
                        “Kasihilah sesamamu manusia seperti dirimu sendiri.”
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- KEPEMIMPINAN -->
<section class="section bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Kepemimpinan</h2>

        <div class="card card-custom p-5 col-md-8 mx-auto" data-aos="fade-up">
            <img src="https://via.placeholder.com/150" class="leadership-img mb-3" alt="Gembala">
            <h5><?= $gereja['gembala']; ?></h5>
            <small class="text-muted"><?= $gereja['jabatan']; ?></small>
            <p class="mt-3">
                Sebagai gembala, kami berkomitmen untuk memimpin jemaat dalam kasih Kristus,
                membangun iman yang kokoh dan melayani dengan hati yang tulus.
            </p>
        </div>
    </div>
</section>

@endsection
