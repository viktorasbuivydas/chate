<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use App\Models\Online;
use App\Http\Controllers\Controller;
use App\Http\Resources\InboxResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InboxController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = User::with('receivedMessages')->find(auth()->id());

        $messages = InboxResource::collection($user->receivedMessages);

        return inertia('App/Inbox/Index', [
            'messages' => $messages
        ]);
    }
}
