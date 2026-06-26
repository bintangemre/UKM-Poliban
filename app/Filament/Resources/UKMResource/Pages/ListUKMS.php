<?php

namespace App\Filament\Resources\UKMResource\Pages;

use App\Filament\Exports\UKMExporter;
use App\Filament\Resources\UKMResource;
use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;

class ListUKMS extends ListRecords
{
    protected static string $resource = UKMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('cetak')
                ->label('Cetak Data')
                ->icon('heroicon-o-printer')
                ->url(route('print.ukm'))
                ->openUrlInNewTab(),
            ExportAction::make()
                ->label('Export Excel')
                ->exporter(UKMExporter::class)
                ->fileName('Data_UKM_' . now()->format('Ymd_His')),
        ];
    }
}
