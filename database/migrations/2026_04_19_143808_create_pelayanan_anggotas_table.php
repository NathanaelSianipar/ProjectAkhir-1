<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelayanan_anggotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelayanan_id')->constrained('pelayanan')->onDelete('cascade');
            $table->string('nama');
            $table->string('bagian')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelayanan_anggotas');
    }
};