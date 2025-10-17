<?php

namespace App\Filament\Admin\Resources\ExpertTypes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExpertTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')->label('ID'),
                TextEntry::make('name')->label('名称'),
            ]);
    }
}
