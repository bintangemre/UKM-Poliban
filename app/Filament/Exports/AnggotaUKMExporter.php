<?php

namespace App\Filament\Exports;

use App\Models\AnggotaUKM;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class AnggotaUKMExporter extends Exporter
{
    protected static ?string $model = AnggotaUKM::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('mahasiswa.nama')
                ->label('Nama Mahasiswa'),
            ExportColumn::make('mahasiswa.nim')
                ->label('NIM'),
            ExportColumn::make('mahasiswa.prodi')
                ->label('Program Studi'),
            ExportColumn::make('ukm.nama')
                ->label('UKM'),
            ExportColumn::make('posisi')
                ->label('Posisi'),
            ExportColumn::make('tugas')
                ->label('Tugas'),
            ExportColumn::make('tanggal_bergabung')
                ->label('Tanggal Bergabung'),
            ExportColumn::make('status')
                ->label('Status'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'Export data anggota UKM selesai. ' . number_format($export->successful_rows) . ' baris berhasil diexport.';
    }
}
