<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class ProfileController extends Controller
{
    public function index()
    {
        return inertia('App/Profile/Index');
    }

    public function sessions(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        $sessions = collect(
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                ->where('user_id', $request->user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) use ($request) {
            $agent = $this->createAgent($session);

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === $request->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });

        return inertia('App/Profile/Sessions', [
            'sessions' => $sessions,
        ]);
    }

    public function password()
    {
        return inertia('App/Profile/Password');
    }

    public function about($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return inertia('App/Profile/About', [
            'user' => new UserResource($user),
        ]);
    }

    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}
