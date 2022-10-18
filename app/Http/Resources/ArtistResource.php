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
                'followed' => $this->followed
            ],

            'relationships' => [
                'user' => [
                    'links' => [],
                    'data' => [],
                ]
            ],
            'create_at' => $this->create_at,
            'update_at' => $this->update_at
        ];
    }
}
