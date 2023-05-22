<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCart;
use App\Utils\CartUtils;




class CartController extends Controller
{
    public function addProducts(Request $request)
    {
        // check if exist the cookie
        $cartUuId = $request->cookie('cart_id');
        $cart = Cart::where('uuid', $cartUuId)->first();
        if (!$cart) {
            // if does not exist create a new cart
            $cart = new Cart();
            $cart->uuid = $cartUuId;
            $cart->save();
        }
        // insert new product related whit id cart
        $product = Product::where('id', $request->productId)->first();
        $newProductCart = new ProductCart();
        $newProductCart->cart_id = $cart->id;
        $newProductCart->product_id = $request->productId;
        $newProductCart->quantity = 1;
        $newProductCart->save();
        return response()->json(['message' => 'Product added in cart']);
    }

    public function deleteProductFromCart(Request $request){

        // check if exist the cookie
        $cartUuId = $request->cookie('cart_id');
        $cart = Cart::where('uuid', $cartUuId)->first();
        if ($cart) {
            // if exist cart, take the product whit cart id and if existe remove
            $productCart = ProductCart::where('cart_id', $cart->id)
            ->where('product_id',  $request->productId)
            ->first();
            if ($productCart) $productCart->delete();
        }
        return response()->json(['message' => 'Product removed']);
    }

    public function getAllProductsCart(Request $request)
    {
        // get all product cart via fecth js and show all of them in cart aside
        $cartUuId = $request->cookie('cart_id');
        if($cartUuId){
            $cart = Cart::with('productCarts.product')
            ->where('uuid',  $cartUuId)
            ->first();
            return response()->json(['message' => $cart,'totalCart' => CartUtils::getTotalCart($cartUuId)]);
        }
        return response()->json(['message' => [],'totalCart' => 0]);
    }
}
