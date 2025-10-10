<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 学年学期
 */
class Term extends Model
{
    protected $fillable = ['id','name', 'start_date', 'end_date', 'enabled'];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'enabled' => 'boolean'
        ];
    }
}
