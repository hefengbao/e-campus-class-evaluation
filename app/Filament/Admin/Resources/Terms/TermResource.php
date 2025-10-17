<?php

namespace App\Filament\Admin\Resources\Terms;

use App\Filament\Admin\Resources\Terms\Pages\CreateTerm;
use App\Filament\Admin\Resources\Terms\Pages\EditTerm;
use App\Filament\Admin\Resources\Terms\Pages\ListTerms;
use App\Filament\Admin\Resources\Terms\Pages\ViewTerm;
use App\Filament\Admin\Resources\Terms\Schemas\TermForm;
use App\Filament\Admin\Resources\Terms\Schemas\TermInfolist;
use App\Filament\Admin\Resources\Terms\Tables\TermsTable;
use App\Models\Term;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class TermResource extends Resource
{
    protected static ?string $model = Term::class;
    protected static ?string $modelLabel = '学期';
    protected static ?string $pluralModelLabel = '学期';
    protected static string|UnitEnum|null $navigationGroup = '评课设置';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return TermForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TermInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TermsTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderByDesc('created_at');
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
            'index' => ListTerms::route('/'),
            'create' => CreateTerm::route('/create'),
            'view' => ViewTerm::route('/{record}'),
            'edit' => EditTerm::route('/{record}/edit'),
        ];
    }
}
