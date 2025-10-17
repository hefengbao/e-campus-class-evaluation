<?php

namespace App\Filament\Admin\Resources\ExpertTypes;

use App\Filament\Admin\Resources\ExpertTypes\Pages\CreateExpertType;
use App\Filament\Admin\Resources\ExpertTypes\Pages\EditExpertType;
use App\Filament\Admin\Resources\ExpertTypes\Pages\ListExpertTypes;
use App\Filament\Admin\Resources\ExpertTypes\Pages\ViewExpertType;
use App\Filament\Admin\Resources\ExpertTypes\Schemas\ExpertTypeForm;
use App\Filament\Admin\Resources\ExpertTypes\Schemas\ExpertTypeInfolist;
use App\Filament\Admin\Resources\ExpertTypes\Tables\ExpertTypesTable;
use App\Models\ExpertType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ExpertTypeResource extends Resource
{
    protected static ?string $model = ExpertType::class;
    protected static ?string $modelLabel = '专家类型';
    protected static ?string $pluralModelLabel = '专家类型';
    protected static string|UnitEnum|null $navigationGroup = '专家管理';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = '专家类型';

    public static function form(Schema $schema): Schema
    {
        return ExpertTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExpertTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExpertTypesTable::configure($table);
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
            'index' => ListExpertTypes::route('/'),
            'create' => CreateExpertType::route('/create'),
            'view' => ViewExpertType::route('/{record}'),
            'edit' => EditExpertType::route('/{record}/edit'),
        ];
    }
}
