<?php

namespace App\Filament\Resources\UKMResource\Pages;

use App\Filament\Resources\UKMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUKM extends EditRecord
{
    protected static string $resource = UKMResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
