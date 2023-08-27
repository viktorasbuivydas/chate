<?php

namespace App\Http\Controllers\App;

use App\Models\Conversation;
use App\Http\Controllers\Controller;
use App\Http\Resources\InboxResource;
use App\Http\Resources\ConversationCollectionResource;
use App\Http\Requests\CreateConversationMessageRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InboxController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $conversations = Conversation::query()
            ->withWhereHas('latestMessage', function ($query) {
                $query->where('sender_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->get();

        return inertia('App/Inbox/Index', [
            'conversations' => ConversationCollectionResource::collection($conversations),
        ]);
    }

    public function show(Conversation $conversation)
    {
        $conversation = Conversation::query()
            ->with('messages', fn ($query) => $query->paginate())
            ->where('uuid', $conversation->uuid)
            ->first();

        return response()->json([
            'messages' => InboxResource::collection($conversation->messages),
        ]);
    }

    public function store(Conversation $conversation, CreateConversationMessageRequest $request)
    {
        $conversation->load('messages');

        $conversation->messages()->create([
            'sender_id' => auth()->id(),
            'receiver_id' => $conversation->receiver_id,
            'message' => $request->input('message'),
        ]);

        return response()->json([
            'message' => 'Message sent successfully.',
        ]);
    }
}
