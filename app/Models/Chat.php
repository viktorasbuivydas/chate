<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Chat extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'uuid',
        'online',
        'is_private',
        'password'
    ];

    public function messages()
    {
        return $this->belongsToMany(ChatMessage::class);
    }
}
