<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => 'user',
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
            ],

            'relationships' => [
                'liked_songs' => [
                    'data' =>  SongResource::collection($this->whenLoaded('songs'))
                ],
                'liked_playlists' => [
                    'data' =>  PlaylistResource::collection($this->whenLoaded('playlists'))
                ],

                'artist' => [
                    'data' =>  PlaylistIdentifierResource::collection($this->whenLoaded('playlists'))
                ]
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
