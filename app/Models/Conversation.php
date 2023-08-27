<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
    ];

    public function messages()
    {
        return $this->hasMany(Inbox::class, 'conversation_id');
    }

    public function latestMessage()
    {
        return $this->hasOne(Inbox::class, 'conversation_id')->latestOfMany();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
