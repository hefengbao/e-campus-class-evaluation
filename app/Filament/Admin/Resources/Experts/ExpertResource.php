<?php

namespace App\Filament\Admin\Resources\Experts;

use App\Filament\Admin\Resources\Experts\Pages\CreateExpert;
use App\Filament\Admin\Resources\Experts\Pages\EditExpert;
use App\Filament\Admin\Resources\Experts\Pages\ListExperts;
use App\Filament\Admin\Resources\Experts\Pages\ViewExpert;
use App\Filament\Admin\Resources\Experts\Schemas\ExpertForm;
use App\Filament\Admin\Resources\Experts\Schemas\ExpertInfolist;
use App\Filament\Admin\Resources\Experts\Tables\ExpertsTable;
use App\Models\Expert;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ExpertResource extends Resource
{
    protected static ?string $model = Expert::class;
    protected static ?string $modelLabel = '专家';
    protected static ?string $pluralModelLabel = '专家';
    protected static string|UnitEnum|null $navigationGroup = '专家管理';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = '专家';

    public static function form(Schema $schema): Schema
    {
        return ExpertForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExpertInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExpertsTable::configure($table);
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
            'index' => ListExperts::route('/'),
            'create' => CreateExpert::route('/create'),
            'view' => ViewExpert::route('/{record}'),
            'edit' => EditExpert::route('/{record}/edit'),
        ];
    }
}
