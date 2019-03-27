<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'slug'        => $this->slug,
            'purpose'     => $this->purpose,
            'address'     => $this->address,
            'address'     => $this->address,
            'latitude'    => $this->latitude,
            'longitude'   => $this->longitude,
            'description' => $this->description,
            'negotiable'  => $this->negoriable,
            'area'        => $this->area,
            'unit'        => $this->unit,
            'user'        => $this->whenLoaded('user'),
            'district'    => $this->whenLoaded('district'),
        ];
    }

    public function with($request){
        return [
            'author' => 'King Squallo',
            'version' => '1.0.1'
        ];
    }
}
