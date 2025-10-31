<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Pages;

use App\Filament\Admin\Resources\ManagerTypes\ManagerTypeResource;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditManagerType extends EditRecord
{
    protected static string $resource = ManagerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            //DeleteAction::make(),
        ];
    }
}
