<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;

class User extends Model implements
    AuthenticatableContract,
    AuthenticatableUserContract
{

    use Authenticatable, Notifiable;


    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();  // Eloquent model method
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->id,
             ]
        ];
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function subscription()
    {
        return $this->hasOne('App\SubscriptionList');
    }








}
