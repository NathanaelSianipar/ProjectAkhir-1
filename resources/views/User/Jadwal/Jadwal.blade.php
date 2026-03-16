@extends('layouts.app')

@section('content')

<?php
$jadwalMingguan = [
    "Minggu" => [
        [
            "judul" => "Ibadah Sesi 1 + Sekolah Minggu",
            "jam" => "09:00 WIB",
            "lokasi" => "GBI Tambunan",
            "deskripsi" => "Ibadah umum disertai dengan Sekolah Minggu untuk anak-anak.",
            "icon" => "bi bi-people-fill",
            "color" => "primary"
        ],
        [
            "judul" => "Ibadah Sesi 2",
            "jam" => "11:00 WIB",
            "lokasi" => "GBI Tambunan",
            "deskripsi" => "Ibadah umum untuk seluruh jemaat dengan pelayanan pujian.",
            "icon" => "bi bi-mic-fill",
            "color" => "success"
        ],
        [
            "judul" => "Ibadah Sesi 3",
            "jam" => "16:00 WIB",
            "lokasi" => "Pod. Pdt Situmorang",
            "deskripsi" => "Ibadah sore di lokasi pos pelayanan dengan suasana kekeluargaan.",
            "icon" => "bi bi-house-door-fill",
            "color" => "warning"
        ],
    ],
    "Sabtu" => [
        [
            "judul" => "Doa Puasa",
            "jam" => "10:00 - 12:00 WIB",
            "lokasi" => "GBI Tambunan",
            "deskripsi" => "Waktu khusus untuk berdoa dan berpuasa bersama.",
            "icon" => "bi bi-heart-fill",
            "color" => "danger"
        ],
        [
            "judul" => "Menara Doa",
            "jam" => "15:00 WIB",
            "lokasi" => "GBI Tambunan",
            "deskripsi" => "Persekutuan doa untuk berbagai kebutuhan jemaat.",
            "icon" => "bi bi-hand-thumbs-up-fill",
            "color" => "info"
        ],
        [
            "judul" => "Next Gen (Pemuda)",
            "jam" => "19:00 WIB",
            "lokasi" => "GBI Tambunan",
            "deskripsi" => "Persekutuan khusus generasi muda, pujian, sharing, dan firman Tuhan.",
            "icon" => "bi bi-lightning-charge-fill",
            "color" => "secondary"
        ],
    ]
];

$acaraKhusus = [
    ["judul"=>"Retreat Jemaat","deskripsi"=>"Acara khusus untuk pendalaman rohani dan persekutuan.","badge"=>"Tahunan","color"=>"primary","icon"=>"bi bi-calendar2-check-fill"],
    ["judul"=>"Perayaan Natal","deskripsi"=>"Perayaan kelahiran Yesus Kristus bersama jemaat.","badge"=>"Desember","color"=>"danger","icon"=>"bi bi-star-fill"],
    ["judul"=>"Perayaan Paskah","deskripsi"=>"Perayaan kebangkitan Yesus Kristus.","badge"=>"Maret/April","color"=>"success","icon"=>"bi bi-sunrise-fill"],
    ["judul"=>"Baptisan","deskripsi"=>"Sakramen baptisan bagi yang percaya dan siap dibaptis.","badge"=>"Sesuai kebutuhan","color"=>"info","icon"=>"bi bi-droplet-fill"],
    ["judul"=>"Pernikahan","deskripsi"=>"Pemberkatan pernikahan Kristen untuk pasangan jemaat.","badge"=>"Sesuai permintaan","color"=>"warning","icon"=>"bi bi-heart-fill"],
];
?>

<style>
body {
    background: #f4f9ff;
}

.hero {
    background: linear-gradient(135deg, #005bea, #00c6fb);
    padding: 90px 0;
    color: white;
    text-align: center;
    position: relative;
}

.hero h1 {
    font-weight: 800;
    font-size: 38px;
}

.hero p {
    opacity: 0.9;
    font-size: 17px;
}

.section-title {
    font-weight: 700;
    font-size: 28px;
}

.divider {
    height: 4px;
    width: 80px;
    background: linear-gradient(90deg,#005bea,#00c6fb);
    margin: 15px auto 20px;
    border-radius: 20px;
}

.card-modern {
    border: none;
    border-radius: 20px;
    padding: 25px;
    background: white;
    transition: all 0.35s ease;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    height: 100%;
}

.card-modern:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.icon-modern {
    width: 60px;
    height: 60px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
}

.btn-modern {
    border-radius: 50px;
    font-size: 13px;
    padding: 6px 18px;
}

.badge-modern {
    border-radius: 30px;
    padding: 6px 14px;
    font-size: 12px;
}

.section-bg {
    background: linear-gradient(180deg,#eaf4ff,#ffffff);
    padding: 80px 0;
}
</style>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <h1>Jadwal Ibadah & Kegiatan</h1>
        <p>Mari bertumbuh bersama dalam iman, doa, dan persekutuan</p>
    </div>
</section>

<!-- JADWAL -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="section-title">Jadwal Mingguan</h2>
        <div class="divider"></div>
    </div>

    <div class="container mt-5">
        <?php foreach ($jadwalMingguan as $hari => $kegiatanList): ?>
            <h4 class="fw-bold text-center mb-4"><?= $hari ?></h4>
            <div class="row g-4 justify-content-center mb-5">
                <?php foreach ($kegiatanList as $kegiatan): ?>
                    <div class="col-md-4">
                        <div class="card-modern text-start">
                            <div class="icon-modern bg-<?= $kegiatan['color'] ?> bg-opacity-25 text-<?= $kegiatan['color'] ?>">
                                <i class="<?= $kegiatan['icon'] ?>"></i>
                            </div>

                            <h6 class="fw-bold mb-2"><?= $kegiatan['judul'] ?></h6>

                            <p class="text-muted small mb-1">
                                <i class="bi bi-clock"></i> <?= $kegiatan['jam'] ?>
                            </p>

                            <p class="text-muted small mb-2">
                                <i class="bi bi-geo-alt"></i> <?= $kegiatan['lokasi'] ?>
                            </p>

                            <p class="text-muted small"><?= $kegiatan['deskripsi'] ?></p>

                            <a href="#" class="btn btn-outline-<?= $kegiatan['color'] ?> btn-modern mt-2">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- ACARA KHUSUS -->
<section class="section-bg">
    <div class="container text-center">
        <h2 class="section-title">Acara Khusus</h2>
        <div class="divider"></div>
    </div>

    <div class="container mt-5">
        <div class="row g-4 justify-content-center">
            <?php foreach ($acaraKhusus as $acara): ?>
                <div class="col-md-4">
                    <div class="card-modern text-start">
                        <div class="icon-modern bg-<?= $acara['color'] ?> bg-opacity-25 text-<?= $acara['color'] ?>">
                            <i class="<?= $acara['icon'] ?>"></i>
                        </div>

                        <h6 class="fw-bold mb-2"><?= $acara['judul'] ?></h6>
                        <p class="text-muted small"><?= $acara['deskripsi'] ?></p>

                        <span class="badge bg-<?= $acara['color'] ?> badge-modern">
                            <?= $acara['badge'] ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

@endsection
