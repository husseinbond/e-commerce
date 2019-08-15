<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
 public function Permission(){
$this->belongsTo('App\Permisson');

 }
 public function User(){
    return $this->hasMany('App\User');
 }
    
}

