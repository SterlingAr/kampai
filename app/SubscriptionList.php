<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionList extends Model
{


    /**
     * Get the user that owns the SubscriptionList
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
