<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuggestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'user' => $this->whenLoaded('user', fn () => new UserResource($this->user)),
            'created_at' => $this->created_at?->diffForHumans(),
            'positive_rating' => $this->positive_ratings_count,
            'negative_rating' => $this->negative_ratings_count,
            'comments_count' => $this->comments_count,
            'user_rating' => $this->whenLoaded('userRating', fn () => (bool) $this->userRating?->is_positive),
            'comments' => $this->whenLoaded('comments', fn () => CommentResource::collection($this->comments)),
        ];
    }
}
