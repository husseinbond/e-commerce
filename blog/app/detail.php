<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{

    protected $fillable = [
        'post_id'
    ];


    public function colors(){
      return $this->HasMany('App\color','detail_id');
   
   }


   public function getfeatruedattribute($img,$img2,$img3,$img4,$materials){
    return asset($img,$img2,$img3,$img4,$materials);
 }




 

     public function tags(){
        return $this->hasMany('App\tag');
     }
}
