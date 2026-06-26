<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaUKMSeeder extends Seeder
{
    public function run(): void
    {
        $anggota = [
            // UKM 1 - Futsal
            [
                'mahasiswa_id' => 1,
                'u_k_m_id' => 1,
                'posisi' => 'Ketua',
                'tugas' => 'Memimpin UKM Futsal',
                'tanggal_bergabung' => '2023-01-15',
                'status' => 'Aktif',
            ],
            [
                'mahasiswa_id' => 2,
                'u_k_m_id' => 1,
                'posisi' => 'Sekretaris',
                'tugas' => 'Mengelola administrasi UKM',
                'tanggal_bergabung' => '2023-01-15',
                'status' => 'Aktif',
            ],
            // UKM 2 - Debat
            [
                'mahasiswa_id' => 3,
                'u_k_m_id' => 2,
                'posisi' => 'Ketua',
                'tugas' => 'Memimpin UKM Debat',
                'tanggal_bergabung' => '2023-02-20',
                'status' => 'Aktif',
            ],
            [
                'mahasiswa_id' => 4,
                'u_k_m_id' => 2,
                'posisi' => 'Bendahara',
                'tugas' => 'Mengelola keuangan UKM',
                'tanggal_bergabung' => '2023-02-20',
                'status' => 'Aktif',
            ],
            // UKM 3 - Fotografi
            [
                'mahasiswa_id' => 5,
                'u_k_m_id' => 3,
                'posisi' => 'Ketua',
                'tugas' => 'Memimpin UKM Fotografi',
                'tanggal_bergabung' => '2023-03-10',
                'status' => 'Aktif',
            ],
            [
                'mahasiswa_id' => 6,
                'u_k_m_id' => 3,
                'posisi' => 'Anggota',
                'tugas' => 'Mendokumentasikan acara-acara kampus',
                'tanggal_bergabung' => '2023-03-15',
                'status' => 'Aktif',
            ],
            // UKM 4 - Coding Club
            [
                'mahasiswa_id' => 7,
                'u_k_m_id' => 4,
                'posisi' => 'Ketua',
                'tugas' => 'Memimpin UKM Coding Club',
                'tanggal_bergabung' => '2023-04-01',
                'status' => 'Aktif',
            ],
            [
                'mahasiswa_id' => 8,
                'u_k_m_id' => 4,
                'posisi' => 'Sekretaris',
                'tugas' => 'Mengelola administrasi UKM',
                'tanggal_bergabung' => '2023-04-01',
                'status' => 'Aktif',
            ],
        ];

        foreach ($anggota as $item) {
            \App\Models\AnggotaUKM::create($item);
        }
    }
}
