<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Auth;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $carts = Cart::where('order_id', 0)->get();
        return view('admin.cart', ['carts' => $carts]);
    }

    public function store(Request $request){
        $pid = $request->pid;
        $cart = Cart::where('order_id', 0)->where('product_id', $pid)->get();

        if(count($cart) > 0){
            return redirect('/product')->with('msg', 'Product already added before in the cart. Add new product');
        }else{
            $cart = new Cart();

            $cart->product_id = $pid;
            $cart->quantity = $request->quantity;
            $cart->user_key = Auth::user()->id;

            $product = Product::where('id', $pid)->first();
            $product->amount = $product->amount - $cart->quantity;
            $product->update();

            $cart->save();
            return redirect('/product')->with('msg', 'Product add into cart successfully.');
        }
        

    }

    public function update(Request $request, $id){
        $cart = Cart::findOrFail($id);

        $cart->qantity = $request->qantity;

        $cart->update();
        return redirect('/cart')->with('msg', 'Cart Updated Successfuly');
    }

    public function destroy($id){
        $cart = Cart::findOrFail($id);

        $pid = $cart->product_id;

        $product = Product::where('id', $pid)->first();
        $product->amount = $product->amount + $cart->quantity;
        $product->update();

        $cart->delete();
        return redirect('/cart')->with('msg', 'Cart deleted Successfuly');
    }
}
