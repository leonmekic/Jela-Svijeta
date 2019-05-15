<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Meals extends JsonResource
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
        $timeStamp = $request->get('diff_time');
        $date = date("Y-m-d H:i:s", $timeStamp);
        if ($timeStamp && $this->deleted_at > $date) {
            $status = 'deleted';
        } elseif ($timeStamp && $this->updated_at >= $date) {
            $status = 'modified';
        } else {
            $status = 'created';
        }

        return [
            'id'          => $this->id,
            'title'       => $this->translate($request->get('language'))->title,
            'description' => new Descriptions($this->description),
            'ingredients' => Ingredients::collection($this->whenLoaded('ingredient')),
            'category'    => new Categories($this->whenLoaded('category')),
            'tag'         => Tags::collection($this->whenLoaded('tag')),
            'status'      => $status
        ];
    }
}
