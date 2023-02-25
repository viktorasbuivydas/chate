<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class ChatRoom extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'uuid',
        'online',
        'private',
        'active',
        'password',
        'parameters'
    ];

    protected $casts = [
        'private' => 'boolean',
        'active' => 'boolean',
        'parameters' => 'array'
    ];

    public function messages()
    {
        return $this->belongsToMany(ChatMessage::class);
    }
}
