<?php

namespace App\Livewire;

use App\Models\CartItem as CartItemModel;
use Livewire\Component;

class CartItem extends Component
{
    public CartItemModel $cartItem;

    public function increment()
    {
        $this->cartItem->quantity++;
        $this->cartItem->save();
        $this->dispatch('changed');
    }
 
    public function decrement()
    {
        if ($this->cartItem->quantity > 1) {
            $this->cartItem->quantity--;
            $this->cartItem->save();
            $this->dispatch('changed');
        }
    }

    public function remove()
    {
        $this->cartItem->delete();
        $this->dispatch('deleted');
    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
