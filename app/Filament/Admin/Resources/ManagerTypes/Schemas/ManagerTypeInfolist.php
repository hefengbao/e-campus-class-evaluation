<?php

namespace App\Filament\Admin\Resources\ManagerTypes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ManagerTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('名称'),
                TextEntry::make('scope')
                    ->label('查询范围'),
                TextEntry::make('scope_desc')
                    ->label('查询范围描述'),
            ])
            ->columns(1);
    }
}
