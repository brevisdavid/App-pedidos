<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product=Product::find($id);
        $images=$product->images()->orderBy('featured','desc')->get();
        return view('admin.products.images.index')->with(compact('product','images'));
    }
    


  
    public function store(Request $request,$id)
    {
       //Guardaremos al imagen al proyecto
       $file=$request->file('photo');
       $path=public_path().'/images/products';
       $fileName=uniqid().$file->getClientOriginalName();
       $moved=$file->move($path,$fileName);
       //Crearemos registro a la base de datos tabla product_images
       if ($moved) {
       $productImage=new ProductImage();
       $productImage->image=$fileName;
      // $productImage->featured=('false');
       $productImage->product_id=$id;
       $productImage->save();//Insert
      //$table->string('image'); tabla migraciones
       }
       return back();

    }
   
   
    
    public function destroy(Request $request,$id)
    {
       //Eliminamos el archivo o imagen del proyecto
       $productImage=ProductImage::find($request->image_id);
       // $productImage=ProductImage::find($request->input('image_id'));
        if (substr( $productImage->image, 0, 4)==="http") {
            $deleted=true;
          
        } else{
            $fullPath=public_path().'/images/products/'.$productImage->image;
            $deleted= File::delete($fullPath);
        }
        //Eliminamos los archivos de la base de datos
        if ($deleted) {
           $productImage->delete();   
        }
        return back();
    }
    public function select($id,$image)
    {
        ProductImage::where('product_id',$id)->update([
            'featured'=>false
        ]);
        $productImage=ProductImage::find($image);
        $productImage->featured=true;
        $productImage-> save();
        return back();
    }
}
