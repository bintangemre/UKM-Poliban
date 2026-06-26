<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswas = [
            [
                'nim' => '2023001',
                'nama' => 'Ahmad Ridho',
                'email' => 'ahmad.ridho@student.poliban.ac.id',
                'nomor_telepon' => '08123456789',
                'alamat' => 'Jl. Pendidikan No. 1, Banjarmasin',
                'jenis_kelamin' => 'Laki-laki',
                'prodi' => 'Teknik Informatika',
                'semester' => '4',
            ],
            [
                'nim' => '2023002',
                'nama' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@student.poliban.ac.id',
                'nomor_telepon' => '08234567890',
                'alamat' => 'Jl. Martapura No. 10, Banjarmasin',
                'jenis_kelamin' => 'Perempuan',
                'prodi' => 'Teknik Informatika',
                'semester' => '4',
            ],
            [
                'nim' => '2023003',
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@student.poliban.ac.id',
                'nomor_telepon' => '08345678901',
                'alamat' => 'Jl. Lambung Mangkurat No. 5, Banjarmasin',
                'jenis_kelamin' => 'Laki-laki',
                'prodi' => 'Teknik Komputer & Jaringan',
                'semester' => '2',
            ],
            [
                'nim' => '2023004',
                'nama' => 'Rina Wijaya',
                'email' => 'rina.wijaya@student.poliban.ac.id',
                'nomor_telepon' => '08456789012',
                'alamat' => 'Jl. Gajah Mada No. 8, Banjarmasin',
                'jenis_kelamin' => 'Perempuan',
                'prodi' => 'Pengembangan Perangkat Lunak & Gim',
                'semester' => '4',
            ],
            [
                'nim' => '2023005',
                'nama' => 'Hendra Gunawan',
                'email' => 'hendra.gunawan@student.poliban.ac.id',
                'nomor_telepon' => '08567890123',
                'alamat' => 'Jl. Diponegoro No. 15, Banjarmasin',
                'jenis_kelamin' => 'Laki-laki',
                'prodi' => 'Teknik Informatika',
                'semester' => '2',
            ],
            [
                'nim' => '2023006',
                'nama' => 'Dewi Lestari',
                'email' => 'dewi.lestari@student.poliban.ac.id',
                'nomor_telepon' => '08678901234',
                'alamat' => 'Jl. Sultan Adam No. 20, Banjarmasin',
                'jenis_kelamin' => 'Perempuan',
                'prodi' => 'Teknik Komputer & Jaringan',
                'semester' => '4',
            ],
            [
                'nim' => '2023007',
                'nama' => 'Rizky Pratama',
                'email' => 'rizky.pratama@student.poliban.ac.id',
                'nomor_telepon' => '08789012345',
                'alamat' => 'Jl. A.Yani No. 12, Banjarmasin',
                'jenis_kelamin' => 'Laki-laki',
                'prodi' => 'Pengembangan Perangkat Lunak & Gim',
                'semester' => '2',
            ],
            [
                'nim' => '2023008',
                'nama' => 'Rahma Amelia',
                'email' => 'rahma.amelia@student.poliban.ac.id',
                'nomor_telepon' => '08890123456',
                'alamat' => 'Jl. Pangeran Hidayatullah No. 7, Banjarmasin',
                'jenis_kelamin' => 'Perempuan',
                'prodi' => 'Teknik Informatika',
                'semester' => '4',
            ],
        ];

        foreach ($mahasiswas as $mahasiswa) {
            \App\Models\Mahasiswa::create($mahasiswa);
        }
    }
}
