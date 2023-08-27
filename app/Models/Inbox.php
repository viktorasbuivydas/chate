<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inbox extends Model
{
    use HasFactory;

    protected $table = 'inbox';

    protected $fillable = [
        'receiver_id',
        'sender_id',
        'message',
        'is_read',
    ];

    protected $with = [
        'sender',
        'receiver',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function lastReceivedSenderMessage()
    {
        return $this->hasOne(Inbox::class, 'sender_id')->latestOfMany();
    }

    public function sentMessages()
    {
        return $this->hasMany(Inbox::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Inbox::class, 'receiver_id');
    }
}
