<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'chat_room_id',
        'answered_message_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
