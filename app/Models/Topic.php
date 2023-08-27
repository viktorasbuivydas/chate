<?php

namespace App\Models;

use App\Enums\TopicTypes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Topic extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'type',
        'content',
        'user_id',
    ];

    protected $casts = [
        'type' => TopicTypes::class,
    ];

    protected $with = [
        'user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAppType(Builder $query): Builder
    {
        return $query->whereType(TopicTypes::App);
    }
}
