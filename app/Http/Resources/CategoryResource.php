<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent'=> $this->parent->name ?? null,
            'full_path' => $this->full_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}