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
     * Get the bar or bars that belongs to this User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bars()
    {
        return $this->hasMany('App\Bar');
    }


    /**
     * Get the SubscriptionList resource associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscriptions()
    {
        return $this->hasOne('App\SubscriptionList');
    }








}
