<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'links' => $this->links,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
           
        ];
    }

}
