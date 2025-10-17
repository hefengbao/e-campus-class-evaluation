<?php

namespace App\Filament\App\Resources\Teacher\Records\Pages;

use App\Filament\App\Resources\Teacher\Records\RecordResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord as BaseEditRecord;

class EditRecord extends BaseEditRecord
{
    protected static string $resource = RecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
