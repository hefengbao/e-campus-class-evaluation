<?php

namespace App\Filament\Admin\Resources\Records\Tables;

use App\Models\ManagerType;
use App\Models\Term;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class RecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course_name')
                    ->label('课程名称')
                    ->searchable(),
                TextColumn::make('teacher.name')
                    ->label('教师')
                    ->description(fn($record) => $record->teacher_id)
                    ->searchable(),
                TextColumn::make('class_location')
                    ->label('教室')
                    ->searchable(),
                TextColumn::make('class_date')
                    ->label('开课日期')
                    ->description(fn($record) => $record->start_session . '-' . $record->end_session)
                    ->searchable(),
                TextColumn::make('expertType.name')
                    ->label('专家类型'),
                TextColumn::make('score')
                    ->label('评分')
                    ->sortable(),
            ])
            ->filters([
                //TrashedFilter::make(),
                SelectFilter::make('term_id')
                    ->label('学期')
                    ->options(Term::orderBy('created_at', 'desc')->pluck('name', 'id'))
                    ->preload(),
                SelectFilter::make('expert_type_id')
                    ->label('专家类型')
                    ->options(ManagerType::pluck('name', 'id'))
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                    //ForceDeleteBulkAction::make(),
                    //RestoreBulkAction::make(),
                ]),
            ]);
    }
}
