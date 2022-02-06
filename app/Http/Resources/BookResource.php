<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'book_id'           => $this->id,
            'book_name'         => $this->name,
            'num_of_pages'      => $this->pages_num,
            'num_of_read_pages' => $this->read_pages_num,
        ];
    }
}
