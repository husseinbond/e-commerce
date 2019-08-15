<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
   public $items= null;
   public $totalqty = 0;
   public $totalprice = 0;

   public function __construct($oldcart){
       if($oldcart){
 $this->items = $oldcart->items;
$this->totalqty = $oldcart->totalqty;
$this->totalprice = $oldcart->totalprice;
       }
   }

   public function add($item, $id){
       $storedItem = ['qty'=>0, 'price', 'Item'=>$item];

    if($this->item){
        if(array_key_exists($id,$this->items[$id])){
            $storedItem = $this->items[$id];


        }

    }
    $storedItem ['qty']++;
    $storedItem['price'] = $item->price * $storedItem['qty'];
    $this->totalqty++;
    
   }
}
