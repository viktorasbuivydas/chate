<?php

namespace App\Http\Controllers\App\Admin;

use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TopicController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $topics = TopicResource::collection(Topic::all());

        return inertia('App/Admin/Topic/Index', [
            'topics' => $topics,
        ]);
    }

    public function create()
    {
        return inertia('App/Admin/Topic/Create');
    }

    public function store()
    {
        $this->authorize('create', Topic::class);

        $topic = Topic::create($this->validateTopic());

        return redirect()->route('app.admin.topic.edit', $topic);
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);

        return inertia('App/Admin/Topic/Edit', [
            'topic' => new TopicResource($topic),
        ]);
    }

    public function update(Topic $topic)
    {
        $this->authorize('update', $topic);

        $topic->update($this->validateTopic());

        return redirect()->route('app.admin.topic.edit', $topic);
    }
}
