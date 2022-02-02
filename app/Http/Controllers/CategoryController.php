<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    function categories(){
        $categories=Category::get();
        return view('categories/categories',[
            'categories'=>$categories
        ]);
    }
function save(Request $request)
{
    $category=new Category();
    $category->name=$request->name;
    $category->save();
    
    return redirect('categories');
}

}
