<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $products = Product::OrderBy('id', 'desc')->get();
        return view('admin.product', ['products' => $products]);
    }

    public function store(Request $request){
        $product = new Product();

        $product->name = $request->input('title');
        $product->price = $request->input('price');
        $product->amount = $request->input('amount');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');

        // add image
        $image = $request->file('cover');
        $ext = $image->getClientOriginalExtension();

        $cover = 'product'.time().'.'.$ext;

        $product->pimage = $cover;

        $path = 'uploads/product';

        $image->move($path, $cover);

        $product->save();
        return redirect('/product')->with('msg', 'Product Publiched successfully.');
    }

    public function edit($id){
        $cat = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        return view('admin.editproduct', ['product' => $product, 'brands' => $brands, 'cats' => $cat]);
    }

    public function update(Request $request, $id){
        $product = product::findOrFail($id);

        $product->name = $request->input('title');
        $product->price = $request->input('price');
        $product->amount = $request->input('amount');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');

        // add image
        $image = $request->file('cover');
        if($image){
            $ext = $image->getClientOriginalExtension();
            $cover = 'product'.time().'.'.$ext;
            $oldImg = public_path().'/uploads/product/'.$product->pimage;
            unlink($oldImg);
            $product->pimage = $cover;
            $path = 'uploads/product';
            $image->move($path, $cover);
        }else{
            $product->pimage = $product->pimage;
        }
        

        $product->update();
        return redirect('/product')->with('msg', 'Product Updated successfully.');
    }

    public function destroy($id){
        echo $id;
        $product = Product::findOrFail($id);

        $product->delete();

        $oldImg = public_path().'/uploads/product/'.$product->pimage;
        unlink($oldImg);
        return redirect('/product')->with('msg', 'Product Deleted');
    }
}
