<?php

namespace App\Filament\App\Resources\Expert\Records\Schemas;

use App\Filament\Forms\Components\Description;
use App\Models\Expert;
use App\Models\ExpertType;
use App\Models\Metric;
use App\Models\Term;
use App\Models\Timetable;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class RecordForm
{
    public static function configure(Schema $schema): Schema
    {
        $term = Term::where('enabled', true)->orderBy('created_at', 'desc')->first();
        $metrics = Metric::get();
        $desc = '<ul style="list-style-type: square;">';
        foreach ($metrics as $item){
            $desc .= '<li><p>'.$item->item.'（'.$item->point.'分）</p></li>';
        }
        $desc .= '</ul>';
        return $schema
            ->components([
                Section::make('评价指南')
                    ->description(new HtmlString($desc))
                    ->schema([])
                    ->columnSpanFull(),
                Section::make('课表选择')
                    ->description('通过日期、教室、开始节次过滤查询课表')
                    ->schema([
                        DatePicker::make('date')
                            ->label('日期')
                            ->default(date('Y-m-d'))
                            ->maxDate(date('Y-m-d'))
                            ->format('Y-m-d')
                            ->live(),
                        TextInput::make('location')
                            ->label('教室')
                            ->live(),
                        Select::make('session')
                            ->label('开始节次')
                            ->options(function () {
                                $arr = [];
                                for ($i = 1; $i <= 9; $i++) {
                                    $arr[$i] = $i;
                                }

                                return $arr;
                            })
                            ->live(),
                        Select::make('timetable')
                            ->label('课表')
                            ->options(function (Get $get) use ($term): array {
                                $timetables = Timetable::when($term, function ($query) use ($term) {
                                    return $query->where('term_id', $term->id);
                                })
                                    ->where('class_date', $get('date') ?: date('Y-m-d'))
                                    ->when($get('location'), function (Builder $query) use ($get) {
                                        $query->where('class_location', 'like', '%' . $get('location') . '%');
                                    })
                                    ->when($get('session'), function (Builder $query) use ($get) {
                                        $query->where('start_session', $get('session'));
                                    })
                                    ->get();
                                $arr = [];
                                foreach ($timetables as $timetable) {
                                    $key = $timetable->course_id . '_' .
                                        $timetable->course_name . '_' .
                                        $timetable->teacher->id . '_' .
                                        $timetable->teacher->name . '_' .
                                        $timetable->class_date . '_' .
                                        $timetable->class_location . '_' .
                                        $timetable->start_session . '_' .
                                        $timetable->end_session . '_' .
                                        $timetable->degree_level . '_' .
                                        $timetable->dept_id;
                                    $value = $timetable->course_name . '-' .
                                        $timetable->teacher->name . '(' . $timetable->teacher->id . ')-' .
                                        $timetable->class_location . '-(' .
                                        $timetable->class_date . ')-(' .
                                        $timetable->start_session . '-' .
                                        $timetable->end_session . ')';
                                    $arr[$key] = $value;
                                }
                                return $arr;
                            })
                            ->live()
                            ->afterStateUpdated(function (?string $state, Set $set) {
                                if ($state) {
                                    $arr = explode('_', $state);
                                    $set('course_id', $arr[0]);
                                    $set('course_name', $arr[1]);
                                    $set('teacher_id', $arr[2]);
                                    $set('teacher_name', $arr[3]);
                                    $set('class_date', $arr[4]);
                                    $set('class_location', $arr[5]);
                                    $set('start_session', $arr[6]);
                                    $set('end_session', $arr[7]);
                                    $set('degree_level', $arr[8]);
                                    $set('dept_id', $arr[9]);
                                } else {
                                    $set('course_id', null);
                                    $set('course_name', null);
                                    $set('teacher_id', null);
                                    $set('teacher_name', null);
                                    $set('class_date', null);
                                    $set('class_location', null);
                                    $set('start_session', null);
                                    $set('end_session', null);
                                    $set('degree_level', null);
                                    $set('dept_id', null);
                                }
                            })
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
                    ->hiddenOn('edit'),
                Section::make('课程信息')
                    ->description('请确认课程信息')
                    ->collapsed()
                    ->schema([
                        Hidden::make('term_id')
                            ->default($term->id),
                        Hidden::make('dept_id'),
                        Hidden::make('degree_level'),
                        TextInput::make('course_id')
                            ->label('课程ID')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('course_name')
                            ->label('课程名称')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('teacher_name')
                            ->label('教师姓名')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('teacher_id')
                            ->label('教师工号')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('class_location')
                            ->label('教室')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('class_date')
                            ->label('日期')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('start_session')
                            ->label('开始节次')
                            ->disabled()
                            ->dehydrated(),
                        TextInput::make('end_session')
                            ->label('结束节次')
                            ->disabled()
                            ->dehydrated(),
                    ])
                    ->columns()
                    ->columnSpanFull()
                    ->hiddenOn('edit'),
                Section::make('评课信息')
                    ->description('')
                    ->schema([
                        Select::make('expert_type_id')
                            ->label('专家类型')
                            ->options(
                                ExpertType::whereIn('id', Expert::where('user_id', auth()->id())->pluck('id')->all())
                                    ->pluck('name', 'id')
                            )
                            ->required(),
                        Textarea::make('teaching_record')
                            ->label('教学情况记录')
                            ->rows(5)
                            ->required(),
                        FileUpload::make('teaching_record_attachments')
                            ->multiple()
                            ->panelLayout('grid')
                            ->disk('public')
                            ->directory(date('Ym'))
                            ->visibility('public')
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080')
                            ->label('教学情况记录附件'),
                        Textarea::make('suggestion')
                            ->label('教学评价及改进建议')
                            ->rows(5)
                            ->required(),
                        TextInput::make('score')
                            ->label('评分')
                            ->numeric()
                            ->inputMode('decimal')
                            ->step(0.1)
                            ->required()
                    ])
                    ->columnSpanFull()
            ]);
    }
}
