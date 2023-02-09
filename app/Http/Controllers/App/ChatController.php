<?php

namespace App\Http\Controllers\App;

use App\Models\Chat;
use App\Models\User;
use App\Models\ChatMessage;
use App\Actions\Chat\CreateMessage;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\ChatMessageResource;

class ChatController extends Controller
{
    public function index()
    {
        $chatRooms = Chat::all();

        return inertia('App/Chat/Index', [
            'chatRooms' => $chatRooms,
        ]);
    }

    public function messages(Chat $chat)
    {
        if (request()->wantsJson()) {
            $messages = ChatMessage::with('user')
                ->latest('id')
                ->where('chat_id', $chat->id)
                ->paginate();
            return ChatMessageResource::collection($messages);
        }

        return inertia('App/Chat/Room', [
            'chatRoom' => $chat,
        ]);
    }

    public function store(Chat $chat)
    {
        $data = request()->validate([
            'message' => 'required',
        ]);

        $data['chat_id'] = $chat->id;
        app(CreateMessage::class)->handle($data);

        return redirect()->back();
    }

    public function users()
    {
        $users = User::select('id', 'name')->get();

        return UserResource::collection($users);
    }
}
