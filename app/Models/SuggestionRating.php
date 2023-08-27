<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestionRating extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'suggestion_id',
        'is_positive',
    ];

    protected $casts = [
        'is_positive' => 'boolean',
    ];

    public function scopePositive($query)
    {
        return $query->where('is_positive', true);
    }

    public function scopeNegative($query)
    {
        return $query->where('is_positive', false);
    }

    public function suggestions()
    {
        return $this->belongsToMany(Suggestion::class);
    }
}
