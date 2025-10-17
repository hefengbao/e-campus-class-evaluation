<?php

namespace App\Filament\App\Resources\Teacher\Records;

use App\Filament\App\Resources\Teacher\Records\Pages\ListRecords;
use App\Filament\App\Resources\Teacher\Records\Pages\ViewRecord;
use App\Filament\App\Resources\Teacher\Records\Schemas\RecordForm;
use App\Filament\App\Resources\Teacher\Records\Schemas\RecordInfolist;
use App\Filament\App\Resources\Teacher\Records\Tables\RecordsTable;
use App\Models\Record;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class RecordResource extends Resource
{
    protected static ?string $model = Record::class;
    protected static ?string $modelLabel = '听评课记录';
    protected static ?string $pluralModelLabel = '听评课记录';
    protected static string|UnitEnum|null $navigationGroup = '教师';

    public static function form(Schema $schema): Schema
    {
        return RecordForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RecordInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecordsTable::configure($table);
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
            'index' => ListRecords::route('/'),
            //'create' => CreateRecord::route('/create'),
            'view' => ViewRecord::route('/{record}'),
            //'edit' => EditRecord::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('teacher_id', auth()->id())
            ->orderByDesc('id');
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
