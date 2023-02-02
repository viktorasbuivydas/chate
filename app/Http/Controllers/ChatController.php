<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Actions\Chat\CreateMessage;
use App\Http\Resources\ChatMessageResource;

class ChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::with('user')
            ->latest()
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
}
