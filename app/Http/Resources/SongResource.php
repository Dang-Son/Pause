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
                'author_name' => $this->artist->name,
                'imageURL' => $this->imageURL,
                'audioURL' => $this->audioURL,
                'category' => $this->playlist->category,
                'description' => $this->description,
                'playlist_id' => $this->playlist->id,
            ],

            'relationships' => [
                'playlists' => [
                    'links' => [],
                    'data' => new PlaylistResource($this->whenLoaded('playlist'))
                ],
                'artist' => [
                    'links' => [],
                    'data' => new ArtistResource($this->whenLoaded('artist'))
                ],

                'comments' => [
                    'links' => [],
                    'data' => CommentResource::collection($this->comments)
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
