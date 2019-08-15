<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    public function category(){
        return $this->belongsTo('App\category');
     }


     protected $fillable = [
        'Branch','category_id'
    ];
  
}
