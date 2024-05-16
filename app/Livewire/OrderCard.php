<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderCard extends Component
{
    public Order $order;

    public function remove()
    {
        $this->order->delete();

        return $this->redirect(route('orders'), navigate: true);
    }

    public function render()
    {
        return view('livewire.order-card');
    }
}
