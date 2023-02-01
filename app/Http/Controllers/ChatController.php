<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Actions\Chat\CreateMessage;

class ChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::with('user')->latest()->get();
        return inertia('App/Chat/Index', [
            'messages' => $messages,
        ]);
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
