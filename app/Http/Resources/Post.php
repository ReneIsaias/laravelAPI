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
            'id'         => $this->id,
            'title'      => strtoupper($this->title),
            'body'       => strtoupper(substr($this->body, 0, 100)) . '...',
            'created'    => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->created_at->format('d-m-Y'),
        ];
    }
}
