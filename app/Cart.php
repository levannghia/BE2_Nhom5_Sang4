<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

    public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

    public function add($item, $id){ 
		$itemCart = ['quantity'=> 0, 'price' => $item->product_price, 'item' => $item]; 
		if($this->items){ 
			if(array_key_exists($id, $this->items)){ 
				$itemCart = $this->items[$id]; 
			} 
		} 
		$itemCart['quantity']++; 
		$itemCart['price'] = $item->product_price * $itemCart['quantity']; 
		$this->items[$id] = $itemCart; 
		$this->totalQty++; 
		$this->totalPrice += $item->product_price; 
	}

	public function addByQuantity($item, $id, $quantity)
	{
		$itemCart = ['quantity'=> 0, 'price' => 0, 'item' => $item]; 
		if($this->items){ 
			if(array_key_exists($id, $this->items)){ 
				$itemCart = $this->items[$id]; 
			} 
		} 
		$itemCart['quantity'] += $quantity; 
		$itemCart['price'] += $item->product_price * $quantity; 
		$this->items[$id] = $itemCart; 
		$this->totalQty += $quantity; 
		$this->totalPrice += $item->product_price * $quantity; 
	}

	public function removeCart($id)
	{
		$this->totalQty -= $this->items[$id]['quantity'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
