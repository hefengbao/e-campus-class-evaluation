<?php

namespace App\Filament\Admin\Resources\Timetables\Pages;

use App\Filament\Admin\Resources\Timetables\TimetableResource;
use Filament\Resources\Pages\ListRecords;

class ListTimetables extends ListRecords
{
    protected static string $resource = TimetableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //CreateAction::make(),
        ];
    }
}
