<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'commands'
    ];

    public function commands(): Attribute
    {
        return new Attribute(
            get: fn($commands) => json_decode($commands),
            set: fn($commands) => json_encode($commands)
        );
    }
}
