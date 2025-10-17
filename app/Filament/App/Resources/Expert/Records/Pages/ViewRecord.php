<?php

namespace App\Filament\App\Resources\Expert\Records\Pages;

use App\Filament\App\Resources\Expert\Records\RecordResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord as BaseViewRecord;

class ViewRecord extends BaseViewRecord
{
    protected static string $resource = RecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
