<?php

namespace App\Filament\Exports;

use App\Models\UKM;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class UKMExporter extends Exporter
{
    protected static ?string $model = UKM::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nama')
                ->label('Nama UKM'),
            ExportColumn::make('deskripsi')
                ->label('Deskripsi'),
            ExportColumn::make('ketua_nama')
                ->label('Nama Ketua'),
            ExportColumn::make('ketua_nim')
                ->label('NIM Ketua'),
            ExportColumn::make('sekretaris_nama')
                ->label('Nama Sekretaris'),
            ExportColumn::make('sekretaris_nim')
                ->label('NIM Sekretaris'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('nomor_telepon')
                ->label('No. Telepon'),
            ExportColumn::make('lokasi')
                ->label('Lokasi'),
            ExportColumn::make('status')
                ->label('Status'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'Export data UKM selesai. ' . number_format($export->successful_rows) . ' baris berhasil diexport.';
    }
}
