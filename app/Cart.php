<?php

namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $description = null;
     
    public function __constract($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->description = $oldCart->description;
        }
    }
    public function add($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'description' =>$item->description , 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price']=$item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem; 
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->description = $item->description;
    }
}