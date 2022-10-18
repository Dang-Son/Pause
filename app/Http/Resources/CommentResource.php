<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'type' => 'comment',
            'attributes' => [
                'content' => $this->content,
            ],

            'relationships' => [
                'user' => [
                    'links' => [],
                    'data' => [],
                ],
                'song' => [
                    'links' => [],
                    'data' => SongResource::collection($this->whenLoaded('songs')),
                ],
            ],
            'create_at' => $this->create_at,
            'update_at' => $this->update_at
        ];
    }
}
