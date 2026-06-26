<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'u_k_m_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ukm(): BelongsTo
    {
        return $this->belongsTo(UKM::class, 'u_k_m_id');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isWadir3(): bool
    {
        return $this->role === 'wadir3';
    }

    public function isKabagAkademik(): bool
    {
        return $this->role === 'kabag_akademik';
    }

    public function isKetuaUKM(): bool
    {
        return $this->role === 'ketua_ukm';
    }

    public function isSekretarisUKM(): bool
    {
        return $this->role === 'sekretaris_ukm';
    }

    public function canManageMahasiswaDanUKM(): bool
    {
        return in_array($this->role, ['admin', 'wadir3', 'kabag_akademik']);
    }

    public function canManagePendaftaran(): bool
    {
        return in_array($this->role, ['admin', 'ketua_ukm', 'sekretaris_ukm']);
    }
}
