<?php

namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $description = null;
     
    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->description = $oldCart->description;
        }
    }
    // funtion that add item to cart
    public function add($item, $id){
        $storedItem = [
            'qty' => 0, 
            'price' => $item->price, 
            'description' =>$item->description , 
            'item' => $item
        ];
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
    // funtion that reduce the item by one
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }
    //remove all items in shopping cart
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
    
}
 