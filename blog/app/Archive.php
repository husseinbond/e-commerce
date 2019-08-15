<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public function users(){
        return $this->HasMany('App\User','user_id');
     
     }
}
