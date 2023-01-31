<?php

namespace App\Actions\Chat;

use Arr;
use App\Models\ChatMessage;

class CreateMessage
{
    /**
     * Delete the given user.
     */
    public function handle(array $data): void
    {
        ChatMessage::create([
            'message' => $data['message'],
            'user_id' => Arr::get($data, 'user_id', auth()->id()),
        ]);
    }
}
