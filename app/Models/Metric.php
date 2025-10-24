<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 评价指标
 */
class Metric extends Model
{
    protected $fillable = ['item', 'point'];

    protected function casts(): array
    {
        return [
            'point' => 'integer'
        ];
    }
}
