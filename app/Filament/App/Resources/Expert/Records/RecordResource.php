<?php

namespace App\Filament\App\Resources\Expert\Records;

use App\Filament\App\Resources\Expert\Records\Pages\CreateRecord;
use App\Filament\App\Resources\Expert\Records\Pages\EditRecord;
use App\Filament\App\Resources\Expert\Records\Pages\ListRecords;
use App\Filament\App\Resources\Expert\Records\Pages\ViewRecord;
use App\Filament\App\Resources\Expert\Records\Schemas\RecordForm;
use App\Filament\App\Resources\Expert\Records\Schemas\RecordInfolist;
use App\Filament\App\Resources\Expert\Records\Tables\RecordsTable;
use App\Models\Expert;
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
    protected static string|UnitEnum|null $navigationGroup = '专家';

    public static function isShouldRegisterNavigation(): bool
    {
        return Expert::where('user_id', auth()->id())->exists();
    }

    public static function canAccess(): bool
    {
        return Expert::where('user_id', auth()->id())->exists();
    }


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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('expert_id', auth()->id());
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
