<?php

namespace App\Filament\Admin\Resources\Terms\Pages;

use App\Filament\Admin\Resources\Terms\TermResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTerm extends CreateRecord
{
    protected static string $resource = TermResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
