<?php

namespace App\Filament\Admin\Resources\Timetables;

use App\Filament\Admin\Resources\Timetables\Pages\CreateTimetable;
use App\Filament\Admin\Resources\Timetables\Pages\EditTimetable;
use App\Filament\Admin\Resources\Timetables\Pages\ListTimetables;
use App\Filament\Admin\Resources\Timetables\Pages\ViewTimetable;
use App\Filament\Admin\Resources\Timetables\Schemas\TimetableForm;
use App\Filament\Admin\Resources\Timetables\Schemas\TimetableInfolist;
use App\Filament\Admin\Resources\Timetables\Tables\TimetablesTable;
use App\Models\Timetable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;
    protected static ?string $modelLabel = '课表';
    protected static ?string $pluralModelLabel = '课表';
    protected static string|UnitEnum|null $navigationGroup = '评课设置';
    protected static ?int $navigationSort = 2;


    public static function form(Schema $schema): Schema
    {
        return TimetableForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TimetableInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TimetablesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTimetables::route('/'),
            'create' => CreateTimetable::route('/create'),
            'view' => ViewTimetable::route('/{record}'),
            'edit' => EditTimetable::route('/{record}/edit'),
        ];
    }
}
