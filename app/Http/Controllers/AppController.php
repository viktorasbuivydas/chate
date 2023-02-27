<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class AppController extends Controller
{
    public function index()
    {
        $topic = Topic::find(1);

        return inertia('App/Index', [
            'topic' => $topic,
        ]);
    }
}
