<?php

namespace App\Filament\Admin\Resources\Timetables\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TimetablesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('degree_level')
                    ->label('学历层次'),
                TextColumn::make('course_id')
                    ->label('课程ID')
                    ->searchable(),
                TextColumn::make('course_name')
                    ->label('课程名称')
                    ->searchable(),
                TextColumn::make('teacher_id')
                    ->label('教师ID')
                    ->searchable(),
                TextColumn::make('teacher.name')
                    ->label('教师姓名')
                    ->searchable(),
                TextColumn::make('dept_id')
                    ->label('开课学院'), //TODO
                TextColumn::make('class_date')
                    ->label('日期')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('class_location')
                    ->label('教室')
                    ->searchable(),
                TextColumn::make('start_session')
                    ->label('开始节次'),
                TextColumn::make('end_session')
                    ->label('结束节次'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //DeleteBulkAction::make(),
                ]),
            ]);
    }
}
