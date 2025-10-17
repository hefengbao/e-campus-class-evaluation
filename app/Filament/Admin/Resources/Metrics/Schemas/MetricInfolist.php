<?php

namespace App\Filament\Admin\Resources\Metrics\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class MetricInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextColumn::make('title')->label('名称'),
                TextColumn::make('description')->label('描述'),
                TextColumn::make('point')->label('分值'),
            ]);
    }
}
