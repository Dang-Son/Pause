<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistIdentifierResource extends JsonResource
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
            'id' => (string) $this->id,
            'type' => 'playlist',

            'attributes' => [
                'name' => $this->name,
                'bg_color' => $this->bg_color,
                'imageURL' => $this->imageURL,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
