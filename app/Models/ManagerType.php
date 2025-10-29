<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 管理人员类型
 */
class ManagerType extends Model
{
    protected $fillable = ['name'];

    public function managers(): HasMany
    {
        return $this->hasMany(Manager::class, 'type_id');
    }
}
