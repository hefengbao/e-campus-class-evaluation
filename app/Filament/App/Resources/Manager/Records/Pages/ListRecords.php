<?php

namespace App\Filament\App\Resources\Manager\Records\Pages;

use App\Filament\App\Resources\Manager\Records\RecordResource;
use App\Filament\Exports\RecordExporter;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords as BaseListRecords;

class ListRecords extends BaseListRecords
{
    protected static string $resource = RecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
            ExportAction::make()
                ->label('导出')
                ->exporter(RecordExporter::class),
        ];
    }
}
