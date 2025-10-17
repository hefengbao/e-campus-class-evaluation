<?php

namespace App\Filament\Admin\Resources\Metrics\Pages;

use App\Filament\Admin\Resources\Metrics\MetricResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMetric extends EditRecord
{
    protected static string $resource = MetricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
