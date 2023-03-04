<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class AppController extends Controller
{
    public function index()
    {
        $topic = Topic::appType()->latest()->first();

        return inertia('App/Index', [
            'topic' => $topic,
        ]);
    }
}
