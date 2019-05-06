<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Meals extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        if ($request->get('language')) {
//            $language = $request->get('language');
//        } else {
//            $language = 'en';
//        }
        return [
            'id' => $this->id,
            'title' => $this->translate($request->get('language'))->title,
            'ingredients' => Ingredients::collection($this->whenLoaded('ingredient')),
            'category' => Categories::collection($this->whenLoaded('category')),
            'tag' => Tags::collection($this->whenLoaded('tag'))
        ];
    }
}
