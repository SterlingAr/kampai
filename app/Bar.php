<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Bar extends Model
{
    //
    use Notifiable;

    //

    use Searchable;

    protected $fillable = ['node'];



    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }


    /**
     * Get node data
     *
     * @return array
     */



    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {

        return $this->belongsTo('App\User');

    }


    /**
     * Get the SubscriptionList to which this bar belongs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscription()
    {
        return $this->belongsToMany('App\SubscriptionList','subscription_lists_bars');
    }



}
