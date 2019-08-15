<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
 
   protected $fillable = [
      'post_id','detail_id'
  ];

  
  public function getfeatruedattribute($featrued){
   return asset($featrued);
}






}
