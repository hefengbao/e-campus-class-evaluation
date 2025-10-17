<?php

namespace App\Filament\Admin\Resources\Metrics\Pages;

use App\Filament\Admin\Resources\Metrics\MetricResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMetric extends ViewRecord
{
    protected static string $resource = MetricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
