<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
   protected $table = 'setting';
   protected $fillable = ['name', 'title', 'value',
   'type', 'options', 'sorting_number'

 


];

public function getoptionsattr(){
$array = [];
if($this->attributes['options']!=null){
    $array = explode(',',$this->attributes['options']);

}


}
public function gettitlesattr(){
    return trns('admin.'.$this->attributes['title']);
}


}

