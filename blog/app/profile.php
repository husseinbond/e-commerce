<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = [
        'avatar', 'user_id', 'facebook','twitter','about' 
    ];
    public function user(){

$this->beloongto('app\profile');

        }

        public function getFeatruedAttribute($avatar)
         {
            return asset($avatar);
}
}
