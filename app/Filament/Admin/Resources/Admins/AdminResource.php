<?php

namespace App\Filament\Admin\Resources\Admins;

use App\Filament\Admin\Resources\Admins\Pages\CreateAdmin;
use App\Filament\Admin\Resources\Admins\Pages\EditAdmin;
use App\Filament\Admin\Resources\Admins\Pages\ListAdmins;
use App\Filament\Admin\Resources\Admins\Pages\ViewAdmin;
use App\Filament\Admin\Resources\Admins\Schemas\AdminForm;
use App\Filament\Admin\Resources\Admins\Schemas\AdminInfolist;
use App\Filament\Admin\Resources\Admins\Tables\AdminsTable;
use App\Models\Admin;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;
    protected static ?string $modelLabel = '系统管理员';
    protected static ?string $pluralModelLabel = '系统管理员';
    protected static string | UnitEnum | null $navigationGroup = '系统设置';

    public static function form(Schema $schema): Schema
    {
        return AdminForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AdminInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdminsTable::configure($table);
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
            'index' => ListAdmins::route('/'),
            'create' => CreateAdmin::route('/create'),
            'view' => ViewAdmin::route('/{record}'),
            'edit' => EditAdmin::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with(['user']);
    }
}
