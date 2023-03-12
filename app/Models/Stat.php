<?php

namespace App\Models;

use App\Enums\UserStats;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'user_id'
    ];

    protected $casts = [
        'type' => UserStats::class,
    ];
}
