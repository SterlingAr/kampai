<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bars()
    {
        return $this->belongsToMany('App\Bar', 'bars_attributes');
    }
}
