<?php

namespace App\Filament\Admin\Resources\Managers\Schemas;

use App\Models\ManagerType;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ManagerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->label('工号')
                    ->required()
                    ->exists(User::class, 'id')
                    ->validationMessages([
                        'exists' => '工号不存在'
                    ])
                    ->columnSpanFull(),
                Select::make('type_id')
                    ->label('类型')
                    ->options(ManagerType::query()->pluck('name', 'id'))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
