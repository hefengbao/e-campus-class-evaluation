<?php

namespace App\Filament\Admin\Resources\Managers\Pages;

use App\Filament\Admin\Resources\Managers\ManagerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateManager extends CreateRecord
{
    protected static string $resource = ManagerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
