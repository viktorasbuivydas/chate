<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Online extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $table = 'online';

    protected $with = [
        'user',
    ];

    protected $casts = [
        'is_mobile' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('updated_at', '>=', now()->subMinutes(10));
    }
}
