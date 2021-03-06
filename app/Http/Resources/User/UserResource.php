<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        \Debugbar::info($this);

        return [
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
        ];
    }
}
