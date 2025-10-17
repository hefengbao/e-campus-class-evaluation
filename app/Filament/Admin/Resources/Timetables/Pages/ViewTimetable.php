<?php

namespace App\Filament\Admin\Resources\Timetables\Pages;

use App\Filament\Admin\Resources\Timetables\TimetableResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTimetable extends ViewRecord
{
    protected static string $resource = TimetableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
