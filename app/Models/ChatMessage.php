<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'chat_id',
        'answered_message_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
