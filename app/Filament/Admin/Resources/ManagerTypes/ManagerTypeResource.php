<?php

namespace App\Filament\Admin\Resources\ManagerTypes;

use App\Filament\Admin\Resources\ManagerTypes\Pages\CreateManagerType;
use App\Filament\Admin\Resources\ManagerTypes\Pages\EditManagerType;
use App\Filament\Admin\Resources\ManagerTypes\Pages\ListManagerTypes;
use App\Filament\Admin\Resources\ManagerTypes\Pages\ViewManagerType;
use App\Filament\Admin\Resources\ManagerTypes\Schemas\ManagerTypeForm;
use App\Filament\Admin\Resources\ManagerTypes\Schemas\ManagerTypeInfolist;
use App\Filament\Admin\Resources\ManagerTypes\Tables\ManagerTypesTable;
use App\Models\ManagerType;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ManagerTypeResource extends Resource
{
    protected static ?string $model = ManagerType::class;
    protected static ?string $modelLabel = '管理人员类型';
    protected static ?string $pluralModelLabel = '管理人员类型';
    protected static string|UnitEnum|null $navigationGroup = '管理人员管理';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = '管理人员类型';

    public static function form(Schema $schema): Schema
    {
        return ManagerTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ManagerTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ManagerTypesTable::configure($table);
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
            'index' => ListManagerTypes::route('/'),
            'create' => CreateManagerType::route('/create'),
            'view' => ViewManagerType::route('/{record}'),
            'edit' => EditManagerType::route('/{record}/edit'),
        ];
    }
}
