<?php

namespace App\Traits;

use App\Models\User;
use App\Models\ChatRoom;

trait ChatTrait
{
    public function isRoomActive(ChatRoom $chatRoom)
    {
        if (!$chatRoom->active) {
            return redirect()->route('app.chat.index')->with([
                'error' => 'Pokalbių kambarys šiuo metu yra išjungtas'
            ]);
        }
    }
}
