<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'admin',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Wakil Direktur III',
            'email' => 'wadir3@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'wadir3',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Kepala Bagian Akademik',
            'email' => 'kabag@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'kabag_akademik',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Ketua UKM Futsal - Ahmad Ridho',
            'email' => 'ketua.futsal@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'ketua_ukm',
            'u_k_m_id' => 1,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Sekretaris UKM Futsal - Siti Nurhaliza',
            'email' => 'sekretaris.futsal@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'sekretaris_ukm',
            'u_k_m_id' => 1,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Ketua UKM Debat - Budi Santoso',
            'email' => 'ketua.debat@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'ketua_ukm',
            'u_k_m_id' => 2,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Ketua UKM Fotografi - Hendra Gunawan',
            'email' => 'ketua.fotografi@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'ketua_ukm',
            'u_k_m_id' => 3,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'Ketua UKM Coding Club - Rizky Pratama',
            'email' => 'ketua.coding@poliban.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'ketua_ukm',
            'u_k_m_id' => 4,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
    }
}
