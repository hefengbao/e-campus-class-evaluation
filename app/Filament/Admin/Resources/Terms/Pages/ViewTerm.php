<?php

namespace App\Filament\Admin\Resources\Terms\Pages;

use App\Filament\Admin\Resources\Terms\TermResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTerm extends ViewRecord
{
    protected static string $resource = TermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
