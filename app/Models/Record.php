<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kra8\Snowflake\HasSnowflakePrimary;

class Record extends Model
{
    use HasSnowflakePrimary, SoftDeletes;

    protected $fillable = [
        'term_id', 'degree_level', 'course_id', 'course_name', 'teacher_id', 'dept_id', 'class_location', 'class_date',
        'start_session', 'end_session', 'expert_id', 'expert_type_id', 'teaching_record', 'teaching_record_attachments',
        'suggestion', 'score'
    ];

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function expert(): BelongsTo
    {
        return $this->belongsTo(Expert::class, 'expert_id', 'user_id');
    }

    public function expertType(): BelongsTo
    {
        return $this->belongsTo(ExpertType::class, 'expert_type_id');
    }

    protected function casts()
    {
        return [
            'teaching_record_attachments' => 'array',
            'score' => 'decimal:1'
        ];
    }
}
