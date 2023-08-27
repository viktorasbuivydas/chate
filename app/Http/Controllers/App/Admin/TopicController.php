<?php

namespace App\Http\Controllers\App\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
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

    public function edit(Topic $topic)
    {
        return inertia('App/Admin/Topic/Edit', [
            'topic' => new TopicResource($topic),
        ]);
    }

    public function update(CreateTopicRequest $request, Topic $topic)
    {
        $topic->update([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'type' => $topic->type,
        ]);

        return redirect()->route('app.admin.topic.edit', $topic);
    }
}
