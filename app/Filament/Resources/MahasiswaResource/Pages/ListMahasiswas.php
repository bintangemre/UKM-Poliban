<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Exports\MahasiswaExporter;
use App\Filament\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListMahasiswas extends ListRecords
{
    protected static string $resource = MahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak')
                ->label('Cetak Data')
                ->icon('heroicon-o-printer')
                ->url(route('print.mahasiswa'))
                ->openUrlInNewTab(),
            ExportAction::make()
                ->label('Export Excel')
                ->exporter(MahasiswaExporter::class)
                ->fileName('Data_Mahasiswa_' . now()->format('Ymd_His')),
        ];
    }
}
