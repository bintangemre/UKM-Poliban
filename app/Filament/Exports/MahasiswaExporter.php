<?php

namespace App\Filament\Exports;

use App\Models\Mahasiswa;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MahasiswaExporter extends Exporter
{
    protected static ?string $model = Mahasiswa::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nim')
                ->label('NIM'),
            ExportColumn::make('nama')
                ->label('Nama'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('nomor_telepon')
                ->label('No. Telepon'),
            ExportColumn::make('prodi')
                ->label('Program Studi'),
            ExportColumn::make('semester')
                ->label('Semester'),
            ExportColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin'),
            ExportColumn::make('alamat')
                ->label('Alamat'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'Export data mahasiswa selesai. ' . number_format($export->successful_rows) . ' baris berhasil diexport.';
    }
}
