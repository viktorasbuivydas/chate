<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SuggestionResource;
use App\Http\Requests\CreateSuggestionRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SuggestionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $query = Suggestion::with(['ratings', 'userRating'])
            ->withCount([
                'ratings as positive_ratings_count' => function ($query) {
                    $query->positive();
                },
                'ratings as negative_ratings_count' => function ($query) {
                    $query->negative();
                },
                'comments',
            ]);

        $suggestions = SuggestionResource::collection(
            $query
                ->latest()
                ->paginate()
        );

        if (request()->wantsJson()) {
            return $suggestions;
        }

        return inertia('App/Suggestion/Index', [
            'suggestions' => $suggestions,
        ]);
    }

    public function create()
    {
        return inertia('App/Suggestion/Create');
    }

    public function store(CreateSuggestionRequest $request)
    {
        Suggestion::create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('app.suggestions.index');
    }

    public function show(Suggestion $suggestion)
    {
        $suggestion->load([
            'userRating',
            'comments' => fn ($q) => $q->latest(),
        ]);

        $suggestion->loadCount([
            'ratings as positive_ratings_count' => function ($query) {
                $query->positive();
            },
            'ratings as negative_ratings_count' => function ($query) {
                $query->negative();
            },
            'comments',
        ]);

        return inertia('App/Suggestion/Show', [
            'suggestion' => new SuggestionResource($suggestion),
        ]);
    }

    public function updateRating(Request $request, Suggestion $suggestion)
    {
        $isPositive = $request->input('is_positive');

        $user = User::query()
            ->withWhereHas(
                'ratings',
                fn ($q) => $q->where('suggestion_id', $suggestion->id)
            )
            ->where('id', auth()->id())
            ->first();

        if ($user?->ratings()->exists()) {
            $user->ratings()
                ->where('suggestion_id', $suggestion->id)
                ->update([
                    'is_positive' => $isPositive,
                ]);
        } else {
            $suggestion->ratings()->create([
                'is_positive' => $isPositive,
                'user_id' => auth()->id(),
            ]);
        }

        return redirect()->back();
    }

    public function storeComment(Request $request, Suggestion $suggestion)
    {
        $suggestion->comments()->create([
            'comment' => $request->input('comment'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('app.suggestions.show', $suggestion);
    }
}
