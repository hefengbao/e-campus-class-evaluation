<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 专家类型
 */
class ExpertType extends Model
{
    protected $fillable = ['name'];

    public function experts(): HasMany
    {
        return $this->hasMany(Expert::class, 'type_id', 'id');
    }
}
