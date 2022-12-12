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
                'email' => $this->email
            ],
            'relationships' => [
                'artist' => [
                    'link' => [],
                    'data' => new ArtistResource($this->whenLoaded('artist'))
                ],
                'follow_artist' => [
                    'data' => ArtistResource::collection($this->whenLoaded('followed_artists'))
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
