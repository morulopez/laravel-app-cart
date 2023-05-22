<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProductCart;
use App\Models\Cart;



class Product extends Controller
{
    public function index(Request $request)
    {
        // check cookie sesion
        $cartId = $request->cookie('cart_id');
        $cart = Cart::where('uuid', $cartId)->first();
        $cartProductIds = [];
        if (!$cartId) {
            // if does not exist cookie sesion, create cookie whit uuid whit one week for handle the cart
            $cartId = Str::uuid()->toString();
            $response = response()
                ->view('catalogue.index', ['products' => \App\Models\Product::all(), 'cartProductIds' => $cartProductIds])
                ->cookie('cart_id', $cartId, 60 * 24 * 7);
            return $response;
        }
        // if there is already a cart there ara products, here get all products in the carts for compare in the view and add or remove them
        if($cart)$cartProductIds = ProductCart::where('cart_id',$cart->id)->pluck('product_id')->toArray();
        return view('catalogue.index', ['products' => \App\Models\Product::all(), 'cartProductIds' => $cartProductIds]);
    }


}
