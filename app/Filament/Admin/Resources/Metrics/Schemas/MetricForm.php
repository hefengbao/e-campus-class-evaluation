<?php

namespace App\Filament\Admin\Resources\Metrics\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MetricForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('名称')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('描述')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('point')
                    ->label('分值')
                    ->numeric()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
