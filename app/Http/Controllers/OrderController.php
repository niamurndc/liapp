<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use Auth;
use Laravel\Ui\Presets\React;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(){
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.order', ['orders' => $orders]);
    }

    public function viewOrder($id){
        $order = Order::findOrFail($id);
        return view('admin.vieworder', ['order' => $order]);
    }

    public function store(Request $request){
        
            $order = new Order();

            $order->id = $request->id;
            $order->name = $request->name;
            $order->number = $request->number;
            $order->total = $request->total;
            $order->pay = $request->pay;
            $order->due = $order->total - $order->pay;

            
            if($order->save()){
                $uid = Auth::user()->id;

                $carts = Cart::where('order_id', 0)->get();
                
                foreach($carts as $cart){
                    $cart->user_key = $uid;
                    $cart->order_id = $request->id;

                    $cart->update();
            }
            }
            return redirect('/order');
        
    }

    public function update(Request $request, $id){
        $order = Order::findOrFail($id);

        $order->pay = $request->pay;
        $order->total = $request->total;
        $order->due = $order->total - $order->pay;

        $order->update();
        return redirect('/order')->with('msg', 'Order updated');
    }

    public function destroy($id){
        $order = Order::findOrFail($id);

        $order->delete();
        return redirect('/order')->with('msg', 'Order Deleted successfully.');
    }

    
}
