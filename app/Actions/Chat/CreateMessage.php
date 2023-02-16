<?php

namespace App\Actions\Chat;

use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Support\Arr;
use App\Events\ChatMessageSent;

class CreateMessage
{
    public function handle(array $data): ChatMessage
    {
        $userId = Arr::get($data, 'user_id', auth()->id());
        $message = Arr::get($data, 'message');
        $chatId = Arr::get($data, 'chat_id');
        $chatMessage = ChatMessage::create([
            'message' => $message,
            'user_id' => $userId,
            'chat_id' => $chatId,
        ]);

        $user = User::whereId($userId)->first();

        broadcast(new ChatMessageSent($message, $user, $chatId))->toOthers();

        return $chatMessage;
    }
}
