<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\CartUtils;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\User;
use App\Models\OrderProducts;
use Illuminate\Support\Facades\Cookie;


class Order extends Controller
{
    public function placeOrder(Request $request)
    {
        $cartUuId = $request->cookie('cart_id');
        // get all product from cart
        $cart = Cart::with('productCarts.product')
        ->where('uuid',  $cartUuId)
        ->first();
        // if does not exist redirect to product list page
        if(!$cartUuId || !$cart) return redirect('/');
        return view('order.form',['allCartProducts' => $cart->productCarts,'totalCart' => CartUtils::getTotalCart($cartUuId)]);
    }

    public function saveOrder(Request $request)
    {
        $order = new \App\Models\Order();
        $cartUuId = $request->cookie('cart_id');

        // get cart and products data for save in order table and order_product table too
        $cart = Cart::with('productCarts.product')
        ->where('uuid',  $cartUuId)
        ->first();
        if(!$cartUuId || !$cart) return redirect('/');

        // get toal cart for save in column price in order table
        $totalCart = CartUtils::getTotalCart($cartUuId);

        // get a User , here there isn't login I got a random user
        $user = User::find(3);

        $order->price = $totalCart;
        $order->cart_id = $cart->id;
        $order->customer_id = $user->id;
        $order->delivery_address = 'Rodhesia Road 22 L99BU (Liverpool)';
        $order->save();

        // create a loop as foreach for get all products belong to cart and insert in order_product table
        foreach($cart->productCarts as $products){
            $orderProduct = new OrderProducts();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $products['product']['id'];
            $orderProduct->save();
        }
        $response = view('order.thanks',["customer_name"=>$user->name,"order_reference"=>$cart->uuid]);
        
        // For any reason does not working this one I have to remove whit pure php
        //$response->withCookie(Cookie::forget('cart_id',null));
        setcookie('cart_id', '', time() - 3600, '/');

        return $response;
    }
}
