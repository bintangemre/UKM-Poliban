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
        Schema::create('u_k_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('ketua_nama')->nullable();
            $table->string('ketua_nim')->nullable();
            $table->string('sekretaris_nama')->nullable();
            $table->string('sekretaris_nim')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('lokasi')->nullable();
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_k_m_s');
    }
};
