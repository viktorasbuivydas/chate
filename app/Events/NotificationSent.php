<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationSent implements ShouldBroadcast
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
        return new PrivateChannel('notification.' . $this->receiver->id);
    }
}
