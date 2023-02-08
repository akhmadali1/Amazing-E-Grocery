<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->paginate(10);
        return view('welcome', compact('products'));
    }
    public function productDetail($id)
    {
        $product = Product::find($id);

        return view('product_detail', compact('product'));
    }
    public function addToCart($id, Request $request)
    {
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $id;
        $cart->quantity = 1;
        try {
            $cart->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert' => 'Failed to add to cart']);
        }
        return redirect()->back()->with('alert', 'Added to cart');
    }
}
