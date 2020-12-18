<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function products() {
        $products = DB::table('products')->get();

        if (isset($products)) {
            for ($i = 0; $i < count($products); $i++) {
                if (count(DB::table('carts')->where('owner_id', auth()->id())->where('product_id', $products[$i]->id)->get()) == 1) {
                    $products[$i]->canAddToCart = false;
                }else {
                    $products[$i]->canAddToCart = true;
                }
            }
        }

        return $products;
    }

    public function product($id) {
        $product = Product::findOrFail($id);
        if (count(DB::table('carts')->where('owner_id', auth()->id())->where('product_id', $product->id)->get()) == 1) {
            $product->canAddToCart = false;
        }else {
            $product->canAddToCart = true;
        }
        return $product;
    }

    public function cart() {
        $products = [];
        $cart = DB::table('carts')->where('owner_id',auth()->id())->get();

        if (isset($cart)) {
            for ($i = 0; $i < count($cart); $i++) {
                $products[$i] = DB::table('products')->where('id', $cart[$i]->product_id)->get()[0];
                if (null !== DB::table('carts')->where(['product_id' => $cart[$i]->product_id, 'owner_id' => auth()->id()])) {
                    $products[$i]->canAddToCart = true;
                }else {
                    $products[$i]->canAddToCart = false;
                }
            }
        }

        if (count($cart) > 0) {
            for ($i = 0; $i < count($cart); $i++) {
                if (count(DB::table('carts')->where('owner_id', auth()->id())->where('product_id', $cart[$i]->product_id)->get()) == 1) {
                    $products[$i]->canAddToCart = false;
                }else {
                    $products[$i]->canAddToCart = true;
                }
            }
        }

        return $products;
    }

    public function addCartItem(Cart $cart) {
        request()->validate([
            'id' => 'required',
        ]);

        $cart->addCartItem(request('id'));
        return true;
    }

    public function removeCartItem(Cart $cart) {
        request()->validate([
            'id' => 'required',
        ]);

        $cart->removeCartItem(request('id'));
        return true;
    }
}
