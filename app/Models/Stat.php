<?php

namespace App\Models;

use App\Enums\UserStats;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'user_id',
    ];

    protected $casts = [
        'type' => UserStats::class,
    ];
}
