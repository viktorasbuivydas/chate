<?php

namespace App\Observers;

use App\Models\Suggestion;

class SuggestionObserver
{
    public function created(Suggestion $review)
    {
        // $review->user->increment('suggestions_count');
    }
}
