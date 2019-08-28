<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Order extends Controller
{
    public function placeOrder(Request $request)
    {
        $order = new \App\Models\Order();
        return view('order.form')
            ->with('order', $order);
    }

    public function saveOrder(Request $request)
    {
        $order = new \App\Models\Order();
        return view('order.thanks')
            ->with('order', $order);
    }
}
