<?php

namespace App\Observers;

use App\Models\ChatMessage;

class ChatMessageObserver
{
    /**
     * Handle the ChatMessage "created" event.
     *
     * @return void
     */
    public function created(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Handle the ChatMessage "updated" event.
     *
     * @return void
     */
    public function updated(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Handle the ChatMessage "deleted" event.
     *
     * @return void
     */
    public function deleted(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Handle the ChatMessage "restored" event.
     *
     * @return void
     */
    public function restored(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Handle the ChatMessage "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(ChatMessage $chatMessage)
    {
        //
    }
}
