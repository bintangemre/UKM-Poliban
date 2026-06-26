<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'wadir3', 'kabag_akademik', 'ketua_ukm', 'sekretaris_ukm'])
                ->default('admin')
                ->after('email');
            $table->foreignId('u_k_m_id')
                ->nullable()
                ->constrained('u_k_m_s')
                ->nullOnDelete()
                ->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['u_k_m_id']);
            $table->dropColumn(['role', 'u_k_m_id']);
        });
    }
};
