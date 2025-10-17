<?php

namespace App\Filament\App\Resources\Manager\Records\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RecordInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('专家信息')
                    ->schema([
                        TextEntry::make('expert.id')
                            ->label('姓名：'),
                        TextEntry::make('expert_id')
                            ->label('工号：'),
                        TextEntry::make('expertType.name')
                            ->label('专家类型：'),
                    ])
                    ->columns()
                    ->columnSpanFull(),
                Section::make('课程信息')
                    ->schema([
                        TextEntry::make('course_id')
                            ->label('课程ID：'),
                        TextEntry::make('course_name')
                            ->label('课程名称：'),
                        TextEntry::make('teacher.name')
                            ->label('教师姓名：'),
                        TextEntry::make('teacher_id')
                            ->label('教师工号：'),
                        TextEntry::make('class_location')
                            ->label('教室：'),
                        TextEntry::make('class_date')
                            ->label('开课日期：'),
                        TextEntry::make('start_session')
                            ->label('开始节次：'),
                        TextEntry::make('end_session')
                            ->label('结束节次：'),
                    ])
                    ->columns()
                    ->columnSpanFull(),
                Section::make('评课信息')
                    ->schema([
                        TextEntry::make('teaching_record')
                            ->label('教学情况记录：'),
                        ImageEntry::make('teaching_record_attachments')
                            ->label('教学情况记录附件：')
                            ->disk('public'),
                        TextEntry::make('suggestion')
                            ->label('教学评价及改进建议：'),
                        TextEntry::make('score')
                            ->label('评分：'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
