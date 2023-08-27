<?php

namespace App\Observers;

use App\Enums\UserStats;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @return void
     */
    public function created(User $user)
    {
        $stats = collect(UserStats::values());

        $stats->each(function ($stat) use ($user) {
            $data = [
                'type' => $stat,
            ];

            if ($stat === UserStats::Credits->value) {
                $data['value'] = 1000;
            }

            $user->stats()->create($data);
        });
    }

    /**
     * Handle the User "updated" event.
     *
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
