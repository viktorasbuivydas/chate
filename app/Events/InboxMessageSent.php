<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class InboxMessageSent implements ShouldBroadcast
{
    use SerializesModels;

    public function __construct(
        public string $message,
        public User $sender,
        public User $receiver,
    ) {
    }

    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('inbox.'.$this->receiver->id);
    }
}
