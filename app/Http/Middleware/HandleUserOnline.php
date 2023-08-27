<?php

namespace App\Http\Middleware;

use App\Models\Online;
use Closure;
use Illuminate\Http\Request;

class HandleUserOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (! $user) {
            return $next($request);
        }

        $agent = new \Jenssegers\Agent\Agent;
        $device = $agent->isMobile();

        $online = Online::firstOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'user_id' => $user->id,
                'is_mobile' => $device,
            ]
        );

        if ($online) {
            $online->is_mobile = $device;
            $online->updated_at = now();
            $online->save();
        }

        return $next($request);
    }
}
