<?php

namespace App\Filament\Admin\Resources\ExpertTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExpertTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->label('名称')->required()
            ]);
    }
}
