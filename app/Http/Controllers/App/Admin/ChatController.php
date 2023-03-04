<?php

namespace App\Http\Controllers\App\Admin;

use App\Models\ChatRoom;
use App\Events\ClearChat;
use App\Events\MessageSent;
use App\Events\ChatMessageSent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatRoomResource;
use App\Http\Requests\CreateChatRoomRequest;
use App\Http\Requests\UpdateChatRoomRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChatController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        return inertia('App/Admin/Chat/Index');
    }

    public function create()
    {
        return inertia('App/Admin/Chat/Create');
    }

    public function store(CreateChatRoomRequest $request)
    {
        ChatRoom::create($request->validated());

        return redirect()->route('app.admin.chat.rooms');
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

    public function clearChat(ChatRoom $room)
    {
        $room->load('messages');
        $room->messages()->delete();

        broadcast(new ClearChat($room));
        broadcast(new ChatMessageSent('Pokalbių kanalas išvalytas sėkmingai', auth()->user(), $room->id));

        return redirect()->route('app.admin.chat.rooms', $room);
    }

    public function editRoom(UpdateChatRoomRequest $request, ChatRoom $room)
    {
        $room->update($request->validated());

        return inertia('App/Admin/Chat/Room', [
            'room' => $room,
        ]);
    }

    public function deleteRoom(ChatRoom $room)
    {
        $room->load('messages');
        $room->messages()->delete();
        $room->delete();

        return redirect()->route('app.admin.chat.rooms');
    }
}
