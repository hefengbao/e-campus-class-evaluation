<?php

namespace App\Filament\App\Resources\Teacher\Records\Pages;

use App\Filament\App\Resources\Teacher\Records\RecordResource;
use Filament\Resources\Pages\ListRecords as BaseListRecords;

class ListRecords extends BaseListRecords
{
    protected static string $resource = RecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
