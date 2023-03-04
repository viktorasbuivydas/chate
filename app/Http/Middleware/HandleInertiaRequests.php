<?php

namespace App\Http\Middleware;

use App\Models\Topic;
use Inertia\Middleware;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TopicResource;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        if ($topic = Topic::appType()->latest()->first()) {
            $topic = new TopicResource($topic);
        };

        return array_merge(parent::share($request), [
            'auth.user' => fn () => $request->user()
                ? $request->user()->only('id', 'name')
                : null,
            'roles' => fn () => $request->user()
                ? $request->user()->getRoleNames()
                : null,
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
            ],
            'topic' => $topic,
        ]);
    }
}
