<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ukms = [
            [
                'nama' => 'UKM Futsal',
                'deskripsi' => 'Unit Kegiatan Mahasiswa untuk mengembangkan bakat futsal',
                'ketua_nama' => 'Ahmad Ridho',
                'ketua_nim' => '2023001',
                'sekretaris_nama' => 'Siti Nurhaliza',
                'sekretaris_nim' => '2023002',
                'nomor_telepon' => '08123456789',
                'email' => 'futsal@poliban.ac.id',
                'lokasi' => 'Lapangan Poliban',
                'status' => 'Aktif',
            ],
            [
                'nama' => 'UKM Debat Bahasa Indonesia',
                'deskripsi' => 'Unit Kegiatan Mahasiswa untuk mengasah kemampuan berbicara dan debat',
                'ketua_nama' => 'Budi Santoso',
                'ketua_nim' => '2023003',
                'sekretaris_nama' => 'Rina Wijaya',
                'sekretaris_nim' => '2023004',
                'nomor_telepon' => '08234567890',
                'email' => 'debat@poliban.ac.id',
                'lokasi' => 'Ruang Aula',
                'status' => 'Aktif',
            ],
            [
                'nama' => 'UKM Fotografi',
                'deskripsi' => 'Unit Kegiatan Mahasiswa untuk mengembangkan keahlian fotografi',
                'ketua_nama' => 'Hendra Gunawan',
                'ketua_nim' => '2023005',
                'sekretaris_nama' => 'Dewi Lestari',
                'sekretaris_nim' => '2023006',
                'nomor_telepon' => '08345678901',
                'email' => 'fotografi@poliban.ac.id',
                'lokasi' => 'Studio Fotografi',
                'status' => 'Aktif',
            ],
            [
                'nama' => 'UKM Coding Club',
                'deskripsi' => 'Unit Kegiatan Mahasiswa untuk mengembangkan kemampuan programming',
                'ketua_nama' => 'Ahmad Ridho',
                'ketua_nim' => '2023001',
                'sekretaris_nama' => 'Budi Santoso',
                'sekretaris_nim' => '2023003',
                'nomor_telepon' => '08456789012',
                'email' => 'coding@poliban.ac.id',
                'lokasi' => 'Lab Komputer',
                'status' => 'Aktif',
            ],
        ];

        foreach ($ukms as $ukm) {
            \App\Models\UKM::create($ukm);
        }
    }
}
