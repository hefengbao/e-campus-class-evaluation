<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Pages;

use App\Filament\Admin\Resources\ManagerTypes\ManagerTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateManagerType extends CreateRecord
{
    protected static string $resource = ManagerTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
