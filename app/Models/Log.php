<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'computer_id',
        'logs'
    ];

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class);
    }
}
