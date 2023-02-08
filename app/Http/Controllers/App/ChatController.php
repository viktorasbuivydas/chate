<?php

namespace App\Http\Controllers\App;

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
        $messages = ChatMessage::with('user')
            ->latest('id')
            ->paginate();

        if (request()->wantsJson()) {
            return ChatMessageResource::collection($messages);
        }

        return inertia('App/Chat/Index');
    }

    public function store()
    {
        $data = request()->validate([
            'message' => 'required',
        ]);

        app(CreateMessage::class)->handle($data);

        return redirect()->back();
    }

    public function users()
    {
        $users = User::select('id', 'name')->get();

        return UserResource::collection($users);
    }
}
