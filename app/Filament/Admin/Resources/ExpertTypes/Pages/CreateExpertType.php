<?php

namespace App\Filament\Admin\Resources\ExpertTypes\Pages;

use App\Filament\Admin\Resources\ExpertTypes\ExpertTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExpertType extends CreateRecord
{
    protected static string $resource = ExpertTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
