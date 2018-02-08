<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    public function permission_roles(){
        return $this->belongsToMany('App/Role','permission_roles');
    }
}
