<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Traits\AuthorizeTrait;
use App\Actions\Chat\CreateMessage;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\ChatMessageResource;
use App\Http\Requests\CreateChatMessageRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChatController extends Controller
{
    use AuthorizesRequests;
    use AuthorizeTrait;

    public function index()
    {
        $chatRooms = ChatRoom::active()->get();

        return inertia('App/Chat/Index', [
            'chatRooms' => $chatRooms,
        ]);
    }

    public function messages(ChatRoom $chat)
    {
        abort_if(!$this->isSuperUser(auth()->user()) && $chat->private, 403);

        if (request()->wantsJson()) {
            $messages = ChatMessage::with('user')
                ->latest('id')
                ->where('chat_room_id', $chat->id)
                ->paginate();
            return ChatMessageResource::collection($messages);
        }

        return inertia('App/Chat/Room', [
            'chatRoom' => $chat,
        ]);
    }

    public function store(CreateChatMessageRequest $request, ChatRoom $chat)
    {
        app(CreateMessage::class)->handle([
            'message' => $request->input('message'),
            'chat_room_id' => $chat->id,
        ]);

        return redirect()->back();
    }

    public function users()
    {
        $users = User::select('id', 'name')->get();

        return UserResource::collection($users);
    }
}
