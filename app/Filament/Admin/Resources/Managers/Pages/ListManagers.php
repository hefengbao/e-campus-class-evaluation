<?php

namespace App\Filament\Admin\Resources\Managers\Pages;

use App\Filament\Admin\Resources\Managers\ManagerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListManagers extends ListRecords
{
    protected static string $resource = ManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('添加管理人员'),
        ];
    }
}
