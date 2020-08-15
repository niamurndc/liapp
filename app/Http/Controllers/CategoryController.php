<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $category = new Category();

        $category->name = $request->input('title');

        $category->save();
        return redirect('/category')->with('msg', 'Category added successfully.');
    }

    public function destroy($id){
        echo $id;
        $category = Category::findOrFail($id);

        $category->delete();
        return redirect('/category')->with('msg', 'Category Deleted');
    }
}
