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
        Schema::create('Tentang', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('header_title');
            $table->text('header_description')->nullable();
            $table->text('sejarah');
            $table->text('visi');
            $table->text('misi');
            $table->string('gembala_nama');
            $table->string('gembala_jabatan')->nullable();
            $table->text('gembala_deskripsi')->nullable();
            $table->string('gembala_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tentang');
    }
};
