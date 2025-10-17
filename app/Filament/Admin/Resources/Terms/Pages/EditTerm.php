<?php

namespace App\Filament\Admin\Resources\Terms\Pages;

use App\Filament\Admin\Resources\Terms\TermResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTerm extends EditRecord
{
    protected static string $resource = TermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
