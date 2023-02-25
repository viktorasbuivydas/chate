<?php

namespace App\Http\Controllers\App\Admin;

use App\Models\ChatRoom;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatRoomResource;

class ChatController extends Controller
{
    public function index()
    {
        return inertia('App/Admin/Chat/Index');
    }

    public function rooms()
    {
        $rooms = ChatRoomResource::collection(ChatRoom::all());

        return inertia('App/Admin/Chat/Rooms', [
            'rooms' => $rooms,
        ]);
    }

    public function room(ChatRoom $room)
    {
        return inertia('App/Admin/Chat/Room', [
            'room' => $room,
        ]);
    }

    public function clearChat()
    {
        return inertia('App/Chat/Index');
    }
}
