<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function showcart()
    {
        $carts = Auth::user()->carts->where('transaction_id', null);

        $totalPrice = 0;

        if (!$carts->isEmpty()) {
            foreach ($carts as $cart) {
                $cart->subTotal = $cart->quantity * $cart->product->price;
                $totalPrice += $cart->subTotal;
            }
        }
        return view('cart', compact('carts', 'totalPrice'));
    }
    public function delete($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Success deleted item from cart');
    }
    public function purchase(){
        $carts = Auth::user()->carts->all();
        foreach ($carts as $cart) {
            $cart->delete();
        }
        return view('checkout');
    }
}
