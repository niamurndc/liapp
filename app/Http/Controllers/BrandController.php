<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $brand = new Brand();

        $brand->name = $request->input('title');

        $brand->save();
        return redirect('/brand')->with('msg', 'Brand added successfully.');
    }

    public function destroy($id){
        echo $id;
        $brand = Brand::findOrFail($id);

        $brand->delete();
        return redirect('/brand')->with('msg', 'Brand Deleted');
    }
}
