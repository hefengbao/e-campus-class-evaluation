<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Pages;

use App\Filament\Admin\Resources\ManagerTypes\ManagerTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewManagerType extends ViewRecord
{
    protected static string $resource = ManagerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
