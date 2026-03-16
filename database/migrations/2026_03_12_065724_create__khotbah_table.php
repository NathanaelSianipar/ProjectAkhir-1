<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('khotbah', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // judul khotbah
            $table->string('video'); // link video youtube / video
            $table->text('description')->nullable(); // deskripsi
            $table->string('thumbnail')->nullable(); // gambar thumbnail
            $table->date('tanggal')->nullable(); // tanggal khotbah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khotbah');
    }
};