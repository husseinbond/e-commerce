<?php

namespace App;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdeletes;



class post extends Model
{


   use softdeletes;
   public function category(){
      return $this->belongsTo('App\category');
   }

   
   public function Branch(){
      return $this->belongsTo('App\Branch');
   }


   protected $fillable = [
      'title','content','branchs_id','slug','price','img1','img2','img3','img4'
  ];

  protected $dates = [
   'deleted_at'
];


public function getFeatruedAttribute($featrued)
{
return asset($featrued);
}

public function details(){
   return $this->hasMany('App\detail','post_id');
}


public function colors(){ 
   return $this->hasMany('App\color','post_id');
}

public function scopeMightAlsoLike($query)
{
    return $query->inRandomOrder()->take(4);
}






}
