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
        Schema::create('anggota_u_k_m_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
            $table->foreignId('u_k_m_id')->constrained('u_k_m_s')->onDelete('cascade');
            $table->enum('posisi', ['Ketua', 'Sekretaris', 'Bendahara', 'Anggota'])->default('Anggota');
            $table->text('tugas')->nullable();
            $table->date('tanggal_bergabung')->nullable();
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
            
            $table->unique(['mahasiswa_id', 'u_k_m_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_u_k_m_s');
    }
};
