<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 评价指标
 */
class Metric extends Model
{
    protected $fillable = ['title','description','point'];

    protected function casts(): array
    {
        return [
            'point' => 'integer'
        ];
    }
}
