<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }


    public function Branches()
    {
        return $this->hasMany('App\Branche');
    }
}