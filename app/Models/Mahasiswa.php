<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
        'jenis_kelamin',
        'prodi',
        'semester',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function anggotaUkm(): HasOne
    {
        return $this->hasOne(AnggotaUKM::class);
    }
}
