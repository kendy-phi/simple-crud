<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResources extends JsonResource
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
            'user_id'       => $this->user->id,
            'id'            => $this->id,
            'title'         => $this->title,
            'isbn'          => $this->isbn,
            'status'        => $this->status == 1 ? 'available' : 'unavailable',
            'created_at'    => $this->created_at,
            'last_update'   => $this->updated_at
        ];
    }
}
