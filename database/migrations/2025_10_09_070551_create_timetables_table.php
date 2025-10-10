<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('term_id')->comment('学年学期 ID');
            $table->string('degree_level')->comment('学历层次');
            $table->string('course_id')->comment('课程 ID');
            $table->string('course_name')->comment('课程名称');
            $table->string('teacher_id')->comment('教师 ID');
            $table->string('dept_id')->comment('开课学院 ID');
            $table->string('class_location')->comment('上课教室');
            $table->date('class_date')->comment('上课日期');
            $table->unsignedTinyInteger('start_session')->comment('开始节次');
            $table->unsignedTinyInteger('end_session')->comment('结束节次');
            $table->string('student_counts')->comment('学生人数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
