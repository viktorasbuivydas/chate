<?php

namespace App\Http\Controllers\App\Admin;

use App\Models\Chat;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResource;

class ChatController extends Controller
{
    public function index()
    {
        return inertia('App/Admin/Chat/Index');
    }

    public function rooms()
    {
        $rooms = ChatResource::collection(Chat::all());

        return inertia('App/Admin/Chat/Rooms', [
            'rooms' => $rooms,
        ]);
    }

    public function room(Chat $room)
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
