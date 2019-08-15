<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public function User(){
        return $this->belongsToMany('App\User');
     }
     public function Role(){
     $this->beloongto('app\Role');
     }
}
