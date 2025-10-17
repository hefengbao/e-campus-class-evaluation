<?php

namespace App\Filament\Admin\Resources\Admins\Schemas;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdminForm
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
            ]);
    }
}
