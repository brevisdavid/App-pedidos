<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    
    public function index()
    {   
        $products=Product::paginate(5);
        return view ('admin.products.index')->with(compact('products'));
    }

    
    public function create()
    {
        $categories=Category::orderBy('name')->get();
        return view ('admin.products.create')->with(compact('categories'));  
    }

   
    public function store(Request $request)
   {   
    $messages=[
        'name.required'=> 'Debes ingresar nombre del producto',
        'name.min'=> 'El numero de caracteres debe tener minimo 3',
        'description.max'=> 'AH sobreepasado numero de caracteres',
        'description.required'=> 'Debes ingresar descripcion del producto',
        'price.required'=> 'Debes ingresar precio del producto',
        'price.numeric'=> 'Ingrese precio valido ',
        'price.min'=> 'No se admiten valores negativos ',
        'stock.required'=> 'Ingrese stock del los productos',
        'stock.numeric'=> 'Ingrese valor númerico ',
        'stock.min'=> 'No se admiten valores negativos ',
        'long_description.required'=> 'Ingrese una descripcion detallada'
     ];
        $rules=[//reglas de validacion
        "name"=> 'required|min:3',
        "description"=> 'required|max:200',
        "price"=> 'required|numeric|min:0',
        "stock"=> 'required|numeric|min:0',
        "long_description"=>'required' 
        ]; 
        $this->validate($request,$rules,$messages);
        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->long_description=$request->input('long_description');
        $product->category_id=$request->category_id;
        $product->save();//Insertamos productos a la db
        return redirect('/admin/products');
    }

  
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
        $messages=[
            'name.required'=> 'Debes ingresar nombre del producto',
            'name.min'=> 'El numero de caracteres debe terner minio 3',
            'description.max'=> 'AH sobrepasado numero de caracteres',
            'description.required'=> 'Debes ingresar descripcion del producto',
            'price.required'=> 'Debes ingresar precio del producto',
            'price.numeric'=> 'Ingrese precio valido ',
            'price.min'=> 'No se admiten valores negativos ',
            'stock.required'=> 'Debes ingresar stock del producto',
            'stock.numeric'=> ' Se adminten solo números ',
            'stock.min'=> 'No se admiten valores negativos ',
            'long_description.required'=> 'Ingrese una descripcion detallada'
         ];

        //validar que los campos sean llenados y restricciones
        $rules=[  
          "name"=> 'required|min:3',
          "description"=> 'required|max:200',
          "price"=> 'required|numeric|min:0',
          "stock"=> 'required|numeric|min:0',
          "long_description"=>'required' 
        ];
        $this->validate($request,$rules,$messages);
        $product=Product::find($id);
        $product->name = $request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->long_description=$request->input('long_description');
        $product->save();
        return redirect('/admin/products');
    }

    
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return back();   
    }
}
