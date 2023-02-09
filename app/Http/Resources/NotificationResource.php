<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'type' => 'notification',
            'attributes' => [
                'content' => $this->content,
                'user_id' => $this->user_id,
                'song_id' => $this->song_id,
                'bg_url' => $this->bg_url
            ],

            'relationships' => [
                'user' => [
                    'links' => [],
                    'data' => new UserResource(($this->whenLoaded('user'))),
                ],
                'comment' => [
                    'links' => [],
                    'data' => new CommentResource($this->whenLoaded('comment')),
                ],
                'song' => new SongResource($this->song)
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
