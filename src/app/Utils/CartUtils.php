<?php

namespace App\Utils;

use App\Models\Cart;

class CartUtils
{
    public static function getTotalCart($cartUuId)
    {
        $cart = Cart::where('uuid', $cartUuId)->first();
        $total = 0;
        foreach ($cart->productCarts as $productCart) {
            $total += $productCart->product->price;
        }
        return round($total, 2);
    }
}