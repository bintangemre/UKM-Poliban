<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('anggota_u_k_m_s', function (Blueprint $table) {
            $table->dropForeign(['u_k_m_id']);
            $table->dropForeign(['mahasiswa_id']);
            $table->dropUnique(['mahasiswa_id', 'u_k_m_id']);
            $table->unique('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('u_k_m_id')->references('id')->on('u_k_m_s')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('anggota_u_k_m_s', function (Blueprint $table) {
            $table->dropForeign(['u_k_m_id']);
            $table->dropForeign(['mahasiswa_id']);
            $table->dropUnique(['mahasiswa_id']);
            $table->unique(['mahasiswa_id', 'u_k_m_id']);
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('u_k_m_id')->references('id')->on('u_k_m_s')->onDelete('cascade');
        });
    }
};
