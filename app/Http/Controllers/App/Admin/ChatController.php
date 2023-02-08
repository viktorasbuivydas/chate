<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return inertia('App/Admin/Chat/Index');
    }
    public function clearChat()
    {
        return inertia('App/Chat/Index');
    }
}
