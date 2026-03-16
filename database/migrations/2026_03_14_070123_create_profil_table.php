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
        Schema::create('profil', function (Blueprint $table) {
            $table->id();

            $table->string('name'); // nama lengkap
            $table->string('username')->unique(); // username
            $table->string('email')->unique(); // email
            $table->string('phone')->nullable(); // nomor telepon
            $table->string('alamat')->nullable(); // lokasi / alamat
            $table->string('jabatan')->nullable(); // jabatan (admin, dll)
            $table->string('foto')->nullable(); // foto profil

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};