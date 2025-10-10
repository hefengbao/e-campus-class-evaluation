<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 管理人员
 */
class Manager extends Model
{
    protected $fillable = ['user_id', 'type_id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ManagerType::class, 'type_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
