<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'role',
        'commands'
    ];

    public function commands(): Attribute
    {
        return new Attribute(
            get: fn($commands) => json_decode($commands),
            set: fn($commands) => json_encode($commands)
        );
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }
}
