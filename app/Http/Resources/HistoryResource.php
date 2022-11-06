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
                    'data' => new SongResource($this->whenLoaded('song')),
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
