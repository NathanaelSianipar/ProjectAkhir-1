<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Galeris', function (Blueprint $table) {
            $table->id();
            $table->string('title');        // Judul kegiatan
            $table->text('description')->nullable(); // Deskripsi
            $table->string('image');        // Foto galeri
            $table->date('event_date')->nullable(); // tanggal kegiatan
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};