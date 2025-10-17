<?php

namespace App\Filament\Admin\Resources\Experts\Pages;

use App\Filament\Admin\Resources\Experts\ExpertResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExpert extends CreateRecord
{
    protected static string $resource = ExpertResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
