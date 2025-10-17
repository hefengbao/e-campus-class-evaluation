<?php

namespace App\Filament\App\Resources\Expert\Records\Pages;

use App\Filament\App\Resources\Expert\Records\RecordResource;
use Filament\Resources\Pages\CreateRecord as BaseCreateRecord;

class CreateRecord extends BaseCreateRecord
{
    protected static string $resource = RecordResource::class;

    protected static bool $canCreateAnother = false;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['expert_id'] = auth()->id();
        return $data;
    }
}
