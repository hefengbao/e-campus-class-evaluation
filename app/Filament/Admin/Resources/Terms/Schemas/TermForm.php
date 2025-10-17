<?php

namespace App\Filament\Admin\Resources\Terms\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TermForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label('ID')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('name')
                    ->label('名称')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->label('开始日期')
                    ->format('Y-m-d')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('end_date')
                    ->label('结束日期')
                    ->format('Y-m-d')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
