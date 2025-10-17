<?php

namespace App\Filament\Admin\Resources\Experts\Pages;

use App\Filament\Admin\Resources\Experts\ExpertResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExperts extends ListRecords
{
    protected static string $resource = ExpertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('添加专家'),
        ];
    }
}
