<?php

namespace Database\Seeders;

use App\Models\Timetable;
use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'id' => 10000,
                'name' => '高等数学',
                'teacher_id' => 10000,
            ],
            [
                'id' => 10001,
                'name' => '线性代数',
                'teacher_id' => 10001,
            ],
            [
                'id' => 10002,
                'name' => '高级英语',
                'teacher_id' => 10002,
            ],
            [
                'id' => 10003,
                'name' => '物理学',
                'teacher_id' => 10003,
            ],
            [
                'id' => 10004,
                'name' => '化学',
                'teacher_id' => 10004,
            ],
            [
                'id' => 10005,
                'name' => '中国近代史',
                'teacher_id' => 10005,
            ],
        ];

        for ($i = 0; $i < count($courses); $i++) {
            Timetable::create([
                'term_id' => '2025-2026-01',
                'degree_level' => 'B',
                'course_id' => $courses[$i]['id'],
                'course_name' => $courses[$i]['name'],
                'teacher_id' => $courses[$i]['teacher_id'],
                'dept_id' => 1,
                'class_location' => 'A' . 100 + $i,
                'class_date' => date('Y-m-d'),
                'start_session' => random_int(1, 4),
                'end_session' => random_int(5, 8),
                'student_counts' => 20
            ]);
        }
    }
}
