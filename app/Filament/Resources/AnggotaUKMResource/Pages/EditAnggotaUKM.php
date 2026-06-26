<?php

namespace App\Filament\Resources\AnggotaUKMResource\Pages;

use App\Filament\Resources\AnggotaUKMResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAnggotaUKM extends EditRecord
{
    protected static string $resource = AnggotaUKMResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
