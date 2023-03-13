<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
    ];

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

    public function ratings(): HasMany
    {
        return $this->hasMany(SuggestionRating::class);
    }

    public function userRating(): HasOne
    {
        return $this->hasOne(SuggestionRating::class)
            ->where('user_id', auth()->id());
    }

    public function comments(): HasMany
    {
        return $this->hasMany(SuggestionComment::class);
    }
}
