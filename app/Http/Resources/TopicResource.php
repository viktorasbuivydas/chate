<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
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
            'type' => $this->type,
            'content' => $this->content,
            'user' => $this->whenLoaded('user', fn () => new UserResource($this->user)),
            'created_at' => $this->created_at?->diffForHumans(),
        ];
    }
}
