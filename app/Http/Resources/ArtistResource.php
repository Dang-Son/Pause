<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            'type' => 'artist',
            'attributes' => [
                'name' => $this->name,
                'followed' => $this->followed,
                'user_id' => $this->user_id,
                'avtURL' => $this->user->avtURL,
                'songCount' => $this->songCount()
            ],

            'relationships' => [
                'user' => [
                    'links' => [],
                    'data' => new UserResource($this->whenLoaded('user')),
                ],
                'songs' => [
                    'links' => [],
                    'data' => SongResource::collection($this->whenLoaded('songs')),
                ]
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
