<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class TestController extends Controller
{
    public function welcome()
    {   
        $products=Product::all();
        return view('welcome')->with(compact('products'));
       // return view('welcome');
    }
}
