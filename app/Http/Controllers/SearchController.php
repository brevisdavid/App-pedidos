<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query=$request->input('query'); 
        $products=Product::where('name','LIKE',"%$query%")->paginate(5);
        if ($products->count()==1) {
            $id=$products->first()->id;
            return redirect("/products/$id");// return view('products/'.$id); es lo mismo pero concatenado
        }
        return view('search.show')->with(compact('products','query'));
    }
    public function data()
    {   //metodo donde obtendremos solo los nombres de los productos  pluck
        $products=Product::pluck('name');
        return$products ;
    }
}
