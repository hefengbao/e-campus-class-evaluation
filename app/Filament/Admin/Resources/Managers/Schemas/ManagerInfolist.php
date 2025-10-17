<?php

namespace App\Filament\Admin\Resources\Managers\Schemas;

use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;

class ManagerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextColumn::make('user.id')->label('工号'),
                TextColumn::make('user.name')->label('姓名'),
                TextColumn::make('type.name')->label('类型'),
            ]);
    }
}
