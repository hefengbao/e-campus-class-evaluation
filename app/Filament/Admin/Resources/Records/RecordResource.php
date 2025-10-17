<?php

namespace App\Filament\Admin\Resources\Records;

use App\Filament\Admin\Resources\Records\Pages\CreateRecord;
use App\Filament\Admin\Resources\Records\Pages\EditRecord;
use App\Filament\Admin\Resources\Records\Pages\ListRecords;
use App\Filament\Admin\Resources\Records\Pages\ViewRecord;
use App\Filament\Admin\Resources\Records\Schemas\RecordForm;
use App\Filament\Admin\Resources\Records\Schemas\RecordInfolist;
use App\Filament\Admin\Resources\Records\Tables\RecordsTable;
use App\Models\Record;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecordResource extends Resource
{
    protected static ?string $model = Record::class;
    protected static ?string $modelLabel = '评课记录';
    protected static ?string $pluralModelLabel = '评课记录';
    protected static string|BackedEnum|null $navigationIcon = 'codicon-record';

    protected static ?string $recordTitleAttribute = '评课记录';

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
            'create' => CreateRecord::route('/create'),
            'view' => ViewRecord::route('/{record}'),
            'edit' => EditRecord::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
