<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'is_third' => $this->is_third,
            'name' => $this->name,
            'message' => $this->message,
            'commented_at' => $this->created_at->diffForHumans()
        ];
    }
}
