<?php

namespace App\Filament\Admin\Resources\Metrics;

use App\Filament\Admin\Resources\Metrics\Pages\CreateMetric;
use App\Filament\Admin\Resources\Metrics\Pages\EditMetric;
use App\Filament\Admin\Resources\Metrics\Pages\ListMetrics;
use App\Filament\Admin\Resources\Metrics\Pages\ViewMetric;
use App\Filament\Admin\Resources\Metrics\Schemas\MetricForm;
use App\Filament\Admin\Resources\Metrics\Schemas\MetricInfolist;
use App\Filament\Admin\Resources\Metrics\Tables\MetricsTable;
use App\Models\Metric;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class MetricResource extends Resource
{
    protected static ?string $model = Metric::class;
    protected static ?string $modelLabel = '指标';
    protected static ?string $pluralModelLabel = '指标';
    protected static string|UnitEnum|null $navigationGroup = '评课设置';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return MetricForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MetricInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MetricsTable::configure($table);
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
            'index' => ListMetrics::route('/'),
            'create' => CreateMetric::route('/create'),
            'view' => ViewMetric::route('/{record}'),
            'edit' => EditMetric::route('/{record}/edit'),
        ];
    }
}
