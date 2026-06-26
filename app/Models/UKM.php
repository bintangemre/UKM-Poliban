<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UKM extends Model
{
    protected $table = 'u_k_m_s';

    protected $fillable = [
        'nama',
        'deskripsi',
        'ketua_nama',
        'ketua_nim',
        'sekretaris_nama',
        'sekretaris_nim',
        'nomor_telepon',
        'email',
        'lokasi',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function anggotaUkms(): HasMany
    {
        return $this->hasMany(AnggotaUKM::class);
    }
}
