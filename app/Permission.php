<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function permission_roles(){
        return $this->belongsToMany('App/Role','permission_roles')
            ->withTimestamps();
    }
}
