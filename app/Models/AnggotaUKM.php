<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaUKM extends Model
{
    protected $table = 'anggota_u_k_m_s';

    protected $fillable = [
        'mahasiswa_id',
        'u_k_m_id',
        'posisi',
        'tugas',
        'tanggal_bergabung',
        'status',
    ];

    protected $casts = [
        'tanggal_bergabung' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function ukm(): BelongsTo
    {
        return $this->belongsTo(UKM::class, 'u_k_m_id');
    }
}
