<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BarResource extends Resource
{
    /**
     * Transform the resource into an array.
     * I add the existing tags dynamically to the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
          'id' => $this->id,
          'node' => $this->node,
            'data' =>$this->data
        ];

    }
}
