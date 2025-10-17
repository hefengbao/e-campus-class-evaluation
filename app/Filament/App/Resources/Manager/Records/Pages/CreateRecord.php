<?php

namespace App\Filament\App\Resources\Manager\Records\Pages;

use App\Filament\App\Resources\Manager\Records\RecordResource;
use Filament\Resources\Pages\CreateRecord as BaseCreateRecord;

class CreateRecord extends BaseCreateRecord
{
    protected static string $resource = RecordResource::class;
}
