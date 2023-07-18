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
                    'data' => new UserIdentifierResource($this->user),
                ],
                'song' => [
                    'links' => [],
                    'data' => new SongResource($this->whenLoaded('song')),
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
