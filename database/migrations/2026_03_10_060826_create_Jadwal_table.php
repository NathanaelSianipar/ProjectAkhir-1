<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Jadwals', function (Blueprint $table) {
            $table->id();

            $table->string('title');          // Nama kegiatan
            $table->string('day');            // Hari (Minggu, Sabtu, dll)
            $table->time('start_time');       // Jam mulai
            $table->time('end_time')->nullable(); // Jam selesai
            $table->string('location')->nullable(); // Lokasi
            $table->text('description')->nullable(); // Deskripsi kegiatan

            $table->enum('category', [
                'mingguan',
                'acara_khusus'
            ]); // jenis jadwal

            $table->string('icon')->nullable(); // icon kegiatan

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Jadwals');
    }
};