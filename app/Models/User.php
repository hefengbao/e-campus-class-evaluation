<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $hidden = [
        'password',
    ];

    public function dept(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {

            $admin = Admin::where('user_id', $this->id)->first();

            return $admin != null;
        }

        return true;
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
