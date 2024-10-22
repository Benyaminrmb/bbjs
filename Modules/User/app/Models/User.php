<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Database\Factories\UserFactory;
use Spatie\Permission\Traits\HasRoles;

// use Modules\User\Database\Factories\UserFactory;

class User extends Model
{
    use HasFactory,HasRoles;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'password',
    ];
    protected $guarded = 'web';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function entries(): HasMany
    {
        return $this->hasMany(UserEntry::class);
    }
}
