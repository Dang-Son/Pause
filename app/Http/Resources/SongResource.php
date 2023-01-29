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
                'liked' => $this->liked,
                'views' => $this->views,
                'category' => $this->category,
                'author_name' => $this->artist->name,
                'imageURL' => $this->imageURL,
                'audioURL' => $this->audioURL
            ],

            'relationships' => [
                'playlists' => [
                    'links' => [],
                    'data' => PlaylistResource::collection($this->whenLoaded('playlists'))
                ],
                'artist' => [
                    'links' => [],
                    'data' => new ArtistResource($this->whenLoaded('artist'))
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
