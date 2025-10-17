<?php

namespace App\Filament\App\Resources\Expert\Records\Tables;

use App\Models\Term;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class RecordsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course_name')
                    ->label('课程名称'),
                TextColumn::make('teacher.name')
                    ->label('教师姓名')
                    ->description(fn($record) => $record->teacher_id),
                TextColumn::make('class_location')
                    ->label('教室'),
                TextColumn::make('class_date')
                    ->label('开课日期')->description(fn($record) => $record->start_session . '-' . $record->end_session),
                TextColumn::make('expertType.name')
                    ->label('专家类型'),
                TextColumn::make('score')
                    ->label('评分'),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('term_id')
                    ->label('学期')
                    ->options(Term::orderBy('created_at', 'desc')->pluck('name','id'))
                    ->preload()
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                    //ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
