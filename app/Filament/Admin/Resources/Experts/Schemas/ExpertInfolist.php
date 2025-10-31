<?php

namespace App\Filament\Admin\Resources\Experts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExpertInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->label('工号'),
                TextEntry::make('user.name')
                    ->label('姓名'),
                TextEntry::make('user.dept.name')
                    ->label('部门'),
                TextEntry::make('type.name')
                    ->label('类型')
            ])
            ->columns(1);
    }
}
