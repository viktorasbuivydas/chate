<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use App\Models\Inbox;
use App\Models\Online;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\InboxResource;
use App\Http\Resources\InboxUserResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InboxController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $users = User::withWhereHas('lastReceivedUserMessage')
            ->get();
        // $messages = InboxResource::collection($users);
        // dd($users);
        return inertia('App/Inbox/Index', [
            'users' => InboxUserResource::collection($users),
        ]);
    }
}
