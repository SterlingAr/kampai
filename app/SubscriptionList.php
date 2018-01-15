<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionList extends Model
{
    /**
     * Get the user that owns the SubscriptionList
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the bars that belong to this SubscriptionList
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function bars()
    {
        return $this->belongsToMany('App\Bar','subscription_lists_bars');
    }

}
