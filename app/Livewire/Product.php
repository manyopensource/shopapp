<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product as ProductModel;
use Livewire\Component;

class Product extends Component
{
    public ProductModel $product;
    public int $quantity = 1;

    public function increment()
    {
        $this->quantity++;
    }
 
    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart()
    {
        $user = auth()->user();

        $cart = $user->cart ?? Cart::create(['user_id' => $user->id]);

        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $this->product->id,
        ]);
        $item->quantity = !empty($item->quantity) ? $item->quantity + $this->quantity : $this->quantity;
        $item->unit_price = $this->product->price;
        $item->save();
        
        $cart->items()->save($item);

        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.product');
    }
}
