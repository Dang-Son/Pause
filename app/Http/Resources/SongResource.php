<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
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
            'type' => 'song',
            'attributes' => [
                'name' => $this->name,
                'artist' => $this->artist,
                'liked' => $this->liked,
                'views' => $this->views,
                'category' => $this->category,
            ],

            'relationships' => [
                'playlist' => [
                    'links' => [
                        'self' => route('song.relationships.playlist', ['song' => $this->id]),
                        'related' => route('song.playlist', ['song' => $this->id])
                    ],
                    'data' => PlaylistResource::collection($this->whenLoaded('playlists'))
                ],
                'artist' => [
                    'links' => [],
                    'data' => ArtistResource::collection($this->whenLoaded('artists'))
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
