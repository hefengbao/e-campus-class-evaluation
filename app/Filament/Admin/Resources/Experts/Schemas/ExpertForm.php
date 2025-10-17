<?php

namespace App\Filament\Admin\Resources\Experts\Schemas;

use App\Models\ExpertType;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExpertForm
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
                    ->options(ExpertType::query()->pluck('name', 'id'))
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
