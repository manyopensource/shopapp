<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders ?? collect([]);
        $totalSum = 0;
        
        foreach ($orders as $order) {
            $totalSum += $order->details->sum(fn($v) => $v->unit_price * $v->quantity);
        }

        return view('orders', [
            'orders' => $orders,
            'totalSum' => $totalSum,
        ]);
    }
}
