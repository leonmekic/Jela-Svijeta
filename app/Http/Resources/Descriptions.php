<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Descriptions extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            $this->translate($request->get('language'))->description,
        ];
    }
}
