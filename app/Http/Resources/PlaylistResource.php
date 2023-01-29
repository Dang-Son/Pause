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
                'bg_color' => $this->bg_color,
                'user_created_id' => $this->user->id,
                'user_created_name' => $this->user->name,
                'user_created_avtURL' => $this->user->avtURL,
                'imageURL' => $this->imageURL,
                'views' => $this->views

            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,


            'relationships' => [
                'songs' => [
                    'links' => [],
                    'data' => SongResource::collection($this->whenLoaded('songs'))
                ]
            ],
        ];
    }
}
