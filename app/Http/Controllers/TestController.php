<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class TestController extends Controller
{
    public function welcome()
    {   
       //es como hacer una consulta enjoi
        $categories=Category::has('products')->get();
        return view('welcome')->with(compact('categories'));

      /*   $products=Product::paginate(6);
        return view('welcome')->with(compact('products')); */
       // return view('welcome');
    }
}
