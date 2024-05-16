<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Livewire\Component;

class Shopcart extends Component
{
    protected $listeners = [
        'changed' => '$refresh',
    ];

    public function checkout()
    {
        $user = auth()->user();

        $order = Order::create(['user_id' => $user->id]);
        
        $cart = $user->cart;
        $cartItems = $cart->items ?? collect([]);

        if ($cartItems->isNotEmpty()) {
            foreach ($cartItems as $cartItem) {
                $orderDetail = new OrderDetail([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->unit_price,
                ]);
                $orderDetail->save();
            }
    
            $cart->delete();
        }

        session()->flash('message', 'Заказ успешно создан!');

        return $this->redirect(route('orders'), navigate: true);
        
    }

    public function render()
    {
        return view('livewire.shopcart', [
            'cartItems' => auth()->user()->cart->items ?? collect([]),
        ]);
    }
}
