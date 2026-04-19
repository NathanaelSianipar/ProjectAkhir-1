<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jemaats', function (Blueprint $table) {
            $table->id();

            $table->string('no_kk');
            $table->string('nama_keluarga');
            $table->text('alamat_domisili');
            $table->text('alamat_ktp')->nullable();
            $table->string('kolom')->nullable();

            $table->string('nama_lengkap');
            $table->string('nik')->nullable();
            $table->string('hubungan_keluarga')->nullable();

            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki', 'Perempuan'])->nullable();

            $table->enum('baptis', ['Sudah', 'Belum'])->default('Belum');
            $table->enum('sidi', ['Sudah', 'Belum'])->default('Belum');

            $table->string('handphone')->nullable();
            $table->string('pekerjaan')->nullable();

            $table->date('tanggal_nikah')->nullable();
            $table->date('tanggal_domisili')->nullable();

            $table->string('surat_attestasi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jemaats');
    }
};