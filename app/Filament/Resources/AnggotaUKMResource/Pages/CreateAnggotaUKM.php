<?php

namespace App\Filament\Resources\AnggotaUKMResource\Pages;

use App\Filament\Resources\AnggotaUKMResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnggotaUKM extends CreateRecord
{
    protected static string $resource = AnggotaUKMResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
