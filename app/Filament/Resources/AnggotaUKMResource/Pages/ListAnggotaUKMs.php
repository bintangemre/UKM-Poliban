<?php

namespace App\Filament\Resources\AnggotaUKMResource\Pages;

use App\Filament\Exports\AnggotaUKMExporter;
use App\Filament\Resources\AnggotaUKMResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListAnggotaUKMs extends ListRecords
{
    protected static string $resource = AnggotaUKMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('cetak')
                ->label('Cetak Data')
                ->icon('heroicon-o-printer')
                ->url(route('print.anggota'))
                ->openUrlInNewTab(),
            ExportAction::make()
                ->label('Export Excel')
                ->exporter(AnggotaUKMExporter::class)
                ->fileName('Data_Anggota_UKM_' . now()->format('Ymd_His')),
        ];
    }
}
