<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Database\Factories\UserEntryFactory;

// use Modules\User\Database\Factories\UserEntryFactory;

class UserEntry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'type',
        'entry',
        'verified_at',
    ];
    protected $casts = [
        'verified_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     protected static function newFactory(): UserEntryFactory
     {
          return UserEntryFactory::new();
     }
}
