<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
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
            'type' => 'history',
            'attributes' => [
                'listen' => $this->listen,
            ],

            'relationships' => [
                'user' => [
                    'links' => [],
                    'data' => [],
                ],
                'songs' => [
                    'links' => [],
                    'data' => SongResource::collection($this->whenLoaded('songs')),
                ],
            ],
            'create_at' => $this->create_at,
            'update_at' => $this->update_at
        ];
    }
}
