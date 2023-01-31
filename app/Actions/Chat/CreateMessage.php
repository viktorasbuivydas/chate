<?php

namespace App\Actions\Chat;

use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Support\Arr;
use App\Events\ChatMessageSent;

class CreateMessage
{
    /**
     * Delete the given user.
     */
    public function handle(array $data): ChatMessage
    {
        $userId = Arr::get($data, 'user_id', auth()->id());
        $message = Arr::get($data, 'message');

        $chatMessage = ChatMessage::create([
            'message' => $message,
            'user_id' => $userId,
        ]);

        $user = User::whereId($userId)->first();

        broadcast(new ChatMessageSent($message, $user))->toOthers();

        return $chatMessage;
    }
}
