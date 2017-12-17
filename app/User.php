<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * Get the SubscriptionList resource associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscriptionList()
    {
        return $this->hasOne('App\SubscriptionList','subscription_id');
    }

    /**
     * Get the bar that belongs to this User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bar()
    {
        return $this->hasOne('App\Bar');
    }
}
