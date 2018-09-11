<?php

namespace App;



class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $id =  null;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($item,$id){
        $storedItem = [ 'qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price']= $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice+=$item->price;
    }
    public function sub($item,$id){
       
        $storedItem = [ 'qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']--;
        $storedItem['price']= $item->price * $storedItem['qty'];

        $this->items[$id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice-=$item->price;

        if($this->items){
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
                if($this->items[$id]['qty'] == 0){
                    unset($this->items[$id]);
                };
            }
    }
}
public function del($item,$id){
        if(array_key_exists($id,$this->items)){
            $storedItem = $this->items[$id];
            $this->totalQty-= $this->items[$id]['qty'];
            $this->totalPrice-=$item->price * $this->items[$id]['qty'] ;
                unset($this->items[$id]);

        }
      
}
}