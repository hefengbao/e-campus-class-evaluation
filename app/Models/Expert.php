<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 专家
 */
class Expert extends Model
{
    protected $fillable = ['user_id', 'type_id'];

    protected $with = ['user', 'type'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ExpertType::class, 'type_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
