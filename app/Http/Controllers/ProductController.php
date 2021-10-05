<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    
    public function index()
    {   
        $products=Product::paginate(5);
        return view ('admin.products.index')->with(compact('products'));
    }

    
    public function create()
    {
        return view ('admin.products.create');  
    }

   
    public function store(Request $request)
    {
        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->long_description=$request->input('long_description');
        $product->save();//Insertamos productos a la db
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return"Mostrar aqui id a modificar =$id"; mensaje de prueba
       
        $product=Product::find($id);
        return view('admin.products.edit')->with(compact('product')); 
    }

    
    
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->name = $request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->long_description=$request->input('long_description');
        $product->save();
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
