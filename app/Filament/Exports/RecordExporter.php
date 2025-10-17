<?php

namespace App\Filament\Exports;

use App\Models\Record;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class RecordExporter extends Exporter
{
    protected static ?string $model = Record::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('term.name')->label('学期'),
            ExportColumn::make('degree_level')->label('学历层次'),
            ExportColumn::make('course_id')->label('课程ID'),
            ExportColumn::make('course_name')->label('课程名称'),
            ExportColumn::make('teacher.name')->label('教师姓名'),
            ExportColumn::make('teacher.id')->label('教师工号'),
            ExportColumn::make('dept_id')->label('开课学院'),
            ExportColumn::make('class_location')->label('教室'),
            ExportColumn::make('class_date')->label('开课日期'),
            ExportColumn::make('start_session')->label('开始节次'),
            ExportColumn::make('end_session')->label('结束节次'),
            ExportColumn::make('expert.user.name')->label('专家姓名'),
            ExportColumn::make('expert.user_id')->label('专家工号'),
            ExportColumn::make('expertType.name')->label('专家类型'),
            ExportColumn::make('teaching_record')->label('教学情况记录'),
            ExportColumn::make('teaching_record_attachments')->label('教学情况记录附件'),
            ExportColumn::make('suggestion')->label('教学评价及改进建议'),
            ExportColumn::make('score')->label('评分'),
            ExportColumn::make('deleted_at'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your record export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
