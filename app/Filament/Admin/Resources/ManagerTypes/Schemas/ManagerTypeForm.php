<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ManagerTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('名称')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
