<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class ManagerTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextColumn::make('name')->label('名称'),
            ]);
    }
}
