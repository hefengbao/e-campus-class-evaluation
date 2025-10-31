<?php

namespace App\Filament\App\Resources\Manager\Records;

use App\Filament\App\Resources\Manager\Records\Pages\ListRecords;
use App\Filament\App\Resources\Manager\Records\Pages\ViewRecord;
use App\Filament\App\Resources\Manager\Records\Schemas\RecordForm;
use App\Filament\App\Resources\Manager\Records\Schemas\RecordInfolist;
use App\Filament\App\Resources\Manager\Records\Tables\RecordsTable;
use App\Models\Manager;
use App\Models\Record;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class RecordResource extends Resource
{
    protected static ?string $model = Record::class;
    protected static ?string $modelLabel = '听评课记录';
    protected static ?string $pluralModelLabel = '听评课记录';
    protected static string|UnitEnum|null $navigationGroup = '管理人员';
    protected static ?string $recordTitleAttribute = '听评课记录';

    public static function isShouldRegisterNavigation(): bool
    {
        return Manager::where('user_id', auth()->id())->exists();
    }

    public static function canAccess(): bool
    {
        return Manager::where('user_id', auth()->id())->exists();
    }

    public static function form(Schema $schema): Schema
    {
        return RecordForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RecordInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecordsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $manager = Manager::where('user_id', auth()->id())->first();

        return parent::getEloquentQuery()
            ->when($manager->type->scope, function (Builder $query) use ($manager) {
                $scope = $manager->type->scope;

                $scopeArr = explode(',', $scope);

                if (count($scopeArr) > 1) {
                    $query->where(function ($query) use ($scopeArr, $manager) {
                        $temp = [
                            'dept_id' => $manager->user->dept_id,
                            'user_id' => auth()->id(),
                        ];

                        $data = [];

                        foreach ($scopeArr as $key => $value) {
                            if ($key != 0) {
                                $data[$value] = $temp[$value] ?? '';
                            }
                        }

                        $query->whereRaw($scopeArr[0], $data);
                    });
                }
            })
            ->orderByDesc('id');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecords::route('/'),
            //'create' => CreateRecord::route('/create'),
            'view' => ViewRecord::route('/{record}'),
            //'edit' => EditRecord::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
