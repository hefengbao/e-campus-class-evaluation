<?php

namespace App\Filament\Admin\Resources\ExpertTypes\Pages;

use App\Filament\Admin\Resources\ExpertTypes\ExpertTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditExpertType extends EditRecord
{
    protected static string $resource = ExpertTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
