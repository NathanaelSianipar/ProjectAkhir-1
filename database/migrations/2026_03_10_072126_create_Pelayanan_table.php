<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Pelayanan', function (Blueprint $table) {
            $table->id();

            $table->string('title');           // Nama pelayanan (Tim Musik, Tim Multimedia)
            $table->string('category');        // kepemimpinan / tim / aksi
            $table->string('leader')->nullable(); // Ketua tim
            $table->text('description')->nullable(); // Deskripsi pelayanan

            $table->string('icon')->nullable();   // icon pelayanan
            $table->string('photo')->nullable();  // foto tim / pemimpin

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Pelayanan');
    }
};