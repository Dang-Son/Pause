<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
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
            'type' => 'playlist',
            'attributes' => [
                'name' => $this->name,
                'user_id' => $this->user_id
            ],
            'relationships' => [
                'songs' => [
                    'links' => [
                        'self' => route('playlist.relationships.songs', ['playlist' => $this->id]),
                        'related' => route('playlist.songs', ['playlist' => $this->id])
                    ],
                    'data' => [
                        SongIdentifierResource::collection($this->whenLoaded('songs'))
                    ]
                ]
            ]
        ];
    }
}
