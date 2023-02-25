<?php

namespace Tests\Support\Traits;

use App\Models\ChatRoom;

trait ChatTrait
{
    public function createChatRoom($data = [])
    {
        return ChatRoom::factory()->create($data);
    }
}
