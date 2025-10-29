<?php

namespace App\Filament\Admin\Resources\Managers;

use App\Filament\Admin\Resources\Managers\Pages\CreateManager;
use App\Filament\Admin\Resources\Managers\Pages\EditManager;
use App\Filament\Admin\Resources\Managers\Pages\ListManagers;
use App\Filament\Admin\Resources\Managers\Pages\ViewManager;
use App\Filament\Admin\Resources\Managers\Schemas\ManagerForm;
use App\Filament\Admin\Resources\Managers\Schemas\ManagerInfolist;
use App\Filament\Admin\Resources\Managers\Tables\ManagersTable;
use App\Models\Manager;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class ManagerResource extends Resource
{
    protected static ?string $model = Manager::class;
    protected static ?string $modelLabel = '管理人员';
    protected static ?string $pluralModelLabel = '管理人员';
    protected static string|UnitEnum|null $navigationGroup = '管理人员管理';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = '管理人员';

    public static function form(Schema $schema): Schema
    {
        return ManagerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ManagerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ManagersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user.dept','type']);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListManagers::route('/'),
            'create' => CreateManager::route('/create'),
            'view' => ViewManager::route('/{record}'),
            'edit' => EditManager::route('/{record}/edit'),
        ];
    }
}
