<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\User;
use App\Order;

class AdminPageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function showDashboard(){
        return view('admin.index');
    }

    public function showProduct(){
        $products = Product::OrderBy('id', 'desc')->get();
        return view('admin.product', ['products' => $products]);
    }

    public function showOrder(){
        $orders = Order::OrderBy('id', 'desc')->get();
        return view('admin.order', ['orders' => $orders]);
    }

    public function viewOrder($id){
        $order = Order::findOrFail($id);
        return view('admin.vieworder', ['order' => $order]);
    }

    public function createProduct(){
        $cats = Category::OrderBy('id', 'desc')->get();
        $brands = Brand::OrderBy('id', 'desc')->get();
        return view('admin.createproduct', ['cats' => $cats, 'brands' => $brands]);
    }

    public function showCategory(){
        $cats = Category::OrderBy('id', 'desc')->get();
        return view('admin.category', ['cats' => $cats]);
    }

    public function showBrand(){
        $brands = Brand::OrderBy('id', 'desc')->get();
        return view('admin.brand', ['brands' => $brands]);
    }

    public function showUser(){
        $user = User::all();
        return view('admin.user', ['users' => $user]);
    }
}
