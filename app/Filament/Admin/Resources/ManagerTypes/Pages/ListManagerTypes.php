<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Pages;

use App\Filament\Admin\Resources\ManagerTypes\ManagerTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListManagerTypes extends ListRecords
{
    protected static string $resource = ManagerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
