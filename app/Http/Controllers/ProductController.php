<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
  
    public function show($id)
    { 
        /* $product=Product::all($id);
        return view('products.show')->with(compact('product')); */ 
        $product=Product::find($id);
        $images=$product->images;
        $imagesLeft=collect();
        $imagesRight=collect();
        foreach ($images as $key => $image) {
            if ($key%2==0) {
                $imagesLeft->push($image);
            }else {
                $imagesRight->push($image); 
            }
        }
        return view('products.show')->with(compact('product','imagesLeft','imagesRight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    
    public function update(Request $request, $id)
    {
        //
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
