<?php

namespace App\Filament\Resources\UKMResource\Pages;

use App\Filament\Resources\UKMResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUKM extends CreateRecord
{
    protected static string $resource = UKMResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
