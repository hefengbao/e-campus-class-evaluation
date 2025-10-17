<?php

namespace App\Filament\Admin\Resources\ExpertTypes\Pages;

use App\Filament\Admin\Resources\ExpertTypes\ExpertTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExpertType extends ViewRecord
{
    protected static string $resource = ExpertTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
